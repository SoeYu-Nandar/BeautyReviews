<?php
session_start();
// post delete
include('config.php');
include('post.php');
include('user.php');
//include('commentPosting.php');



// //date for posting
// date_default_timezone_set('Asia/Myanmar');

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
//getting post from the database
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
//gtting username and profile image from the database
$user = new User();
$ROW_USER = $user->get_user($ROW['userid']);


//inserting comment into the database
if(isset($_POST['commentSubmit'])){
    $userid = $_SESSION["userid"];
    
    $date = $_POST['date'];
    $message = $_POST['message'];

    $sql = "INSERT INTO comments (userid,date,message)
    VALUES ('$userid','$date','$message')";
    $result = $conn->query($sql);
    
   
}
//getting comment from the database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Comment Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
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
        .comment-section{
            
            padding:10px;
            margin-bottom:4px;
            background-color:#efefef;
            border-radius:4px;
            position:relative; 
            
        }
        .comment-section p {
            font-family:arial;
            font-size:14px;
            line-height:16px;
            color:#282828;
            font-weight:100;
            
            
        }
        .edit-btn {
            position:absolute;
            top:0px;
            right:0px;
        }
        .edit-btn button{
            width:50px;
            height:30px;
            color:#282828;
            background-color:#efefef;
            opacity:0.7;
            border:none;
        }
        .edit-btn button:hover{
            
            opacity:1;
        }
        
    </style>

<body>




    <!-- Posting Card-->
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="card rounded">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex">
                            <img class="img-xs rounded-circle my-1" src="img/<?php echo $ROW_USER['image']; ?>">
                            <div>
                                <p><?php echo $ROW_USER['username']; ?></p>
                                <p class="text-muted"><?php echo $ROW["date"]; ?></p>
                                <p class="text-muted"><?php echo "#" . $ROW["reviews_for"]; ?></p>
                            </div>
                        </div>

                    </div>
                </div>



                <!-- Card Two Body -->
                <div class="card-body">
                    <p class="mb-3 tx-14">
                        <?php
                        echo $ROW['post'];
                        ?> <br><br>

                        <?php if (file_exists($ROW['post_image'])) {
                            echo "<div class='text-center'>";
                            echo "<img src='{$ROW['post_image']}' style='width:300px;height:300px;'/>";
                            echo "</div>";
                        }
                        ?>
                    </p>
                    <img class="img-fluid" src="../../../assets/images/sample2.jpg" alt>
                </div>
                <div class="card-footer">
                    <div class="d-block post-actions">





                        <?php
                        echo "<form method='post'> 
                            <input type='hidden' name='userid' value='Anonymous'>
                            <input type='hidden' name='date' value='" . date('Y-m-d H:i') . "'>
                            <div class='form-floating'>
                            <textarea class='form-control' placeholder='Write your Comment...' id='floatingTextarea' name='message' cols='200'></textarea>
                                <label for='floatingTextarea'>Write your Comment...
                                
                                </label>
                                <p class='text-end'><button type='submit' name='commentSubmit' class='btn btn-secondary mt-2'>Comment
                                </button></p>

                        </div>
                        </form>";
                        while($row = $result->fetch_assoc()){
                            echo "<div class='comment-section'><p>";
                            echo $row['userid'].'<br><br>';
                            echo $row['date'].'<br><br>';
                            echo $row['message'].'<br>';
                            
                            echo "</p>
                            <form class='edit-btn' method='post' action='editcomment.php'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <input type='hidden' name='userid' value='".$row['userid']."'>
                            <input type='hidden' name='date' value='".$row['date']."'>
                            <input type='hidden' name='message' value='".$row['message']."'>
                            <button>Edit</button>
                            </form>";
                            
                            
                            
                            echo "</div>";
                        }
                            
                        

                        ?>

                    </div>
                </div>
                <!-- Card Footer -->
            </div>
        </div>

    </div>
    </div>

</body>

</html>