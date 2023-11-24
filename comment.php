<?php
session_start();
include("post.php");



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_reviews";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Selected the posts from the database
if (!empty($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];

    $result = mysqli_query($conn, "SELECT * FROM posts WHERE userid ='$userid'");
    $ROW = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
}



$Post = new Post();
$ERROR = "";
if (isset($_GET['id'])) {
   
    
    $ROW = $Post->get_one_posts($_GET['id']);


    if (!$ROW) {
        $ERROR = "Post does not has found!";
    }
} else {
    $ERROR = "Post does not has found!";
}


$posts = $Post->get_user_posts();

// Create a new array for storing usernames and images with the same userid
$userInfo = array();

// Iterate through each post
if(is_array($posts)){
    
    foreach ($posts as $post) {

        $userid = $post['userid'];
    
        // Check if the userid is already in the $userInfo array
        if (!isset($userInfo[$userid])) {
            // If not, add the username and image to the array
            $userInfo[$userid] = array(
                'username' => $post['username'],
                'image' => $post['image'],
            );
        }
    }
    
}else {
    echo "It is error";
}

// Print or use the $userInfo array as needed
echo"<pre>";
print_r($userInfo);
echo"</pre>";

// $result = $Post->get_user_posts();
//     echo "<pre>";
//     print_r($result);
//     echo "</pre>";





 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>Comment</title>
    <style>
        body {
            background-color: #f9fafb;
            margin-top: 20px;

        }

        .img-xs {
            width: 37px;
            height: 37px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        .card-header:first-child {
            border-radius: 0 0 0 0;
        }

        .card-header {
            padding: 0.875rem 1.5rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 1px solid #f2f4f9;
        }

        .card-footer:last-child {
            border-radius: 0 0 0 0;
        }

        .card-footer {
            padding: 0.875rem 1.5rem;
            background-color: rgba(0, 0, 0, 0);
            border-top: 1px solid #f2f4f9;
        }

        .grid-margin {
            margin-bottom: 1rem;
        }

        .card {
            box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
            -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
            -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
            -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
        }

        .rounded {
            border-radius: 0.25rem !important;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #f2f4f9;
            border-radius: 0.25rem;
        }

        .likeIcon:hover,
        .likeIcon:focus {
            filter: invert(27%) sepia(91%) saturate(1898%) hue-rotate(330deg);
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <!-- Posting Area -->
            <div class="col-md-12 grid-margin">
                <div class="card rounded">
                    <div class="card-header">
                        <form action="" method="post">
                            <div class="d-flex align-items-center justify-content-between">

                                <textarea class="form-control me-2" placeholder="Write Your Comment..." name="post" ></textarea>
                                <button class="btn btn-primary ps-2 pe-2 rounded" type="submit" name="update">
                                    Comment
                                </button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex">
                                <img class="img-xs rounded-circle my-1" src="img/<?php echo $ROW["image"]; ?>" />
                                <div>
                                    <p class="ms-2"><?php echo  $userInfo[$userid]["username"]; ?></p>
                                    <p class="text-muted"><?php echo $ROW["date"]; ?></p>
                                    <p class="text-muted"><?php echo "#" . $ROW["reviews_for"]; ?></p>
                                </div>
                                
                            </div>
                            
                           
                        </div>
                    </div>

                    <!-- Card Two Body -->
                    <div class="card-body">
                        <p class="mb-3 tx-14">
                            <?php echo $ROW['post'];
                            ?> <br><br>
                            <?php
                            if (file_exists($ROW['post_image'])) {
                                echo "<div class='text-center'>";
                                echo "<img src='{$ROW['post_image']}' style='width:300px;height:300px;'/>";
                                echo "</div>";
                            }


                            ?>
                        </p>
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex post-actions justify-content-around">
                            <?php
                            $likes = "";

                            $likes = ($ROW['likes'] > 0) ? "(" . $ROW['likes'] . ")" : "";

                            ?>
                            <a href="like.php?type=post&id=<?php echo $ROW['postid'] ?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                                <img src="icons/heart-fill.svg" alt="Like" class="likeIcon" style="width:25px" ;>
                                <p class="d-none d-md-block ms-2 ">Like<?php echo $likes ?></p>
                            </a>

                            <a href="comment.php?type=post&id=<?php echo $ROW['postid'] ?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                                <img src="icons/chat-heart.svg" alt="Comment" class="likeIcon" style="width:25px" ;>
                                <p class="d-none d-md-block ms-2">Comment</p>
                            </a>
                        </div>
                    </div>
                    <!-- Card Footer -->
                </div>
            </div>

             <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

        
    </script>








</body>

</html>