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

$postid = $_GET['id'];
//getting username and profile image from the database
$user = new User();
$ROW_USER = $user->get_user($ROW['userid']);
$SHOW_USER = $user->get_all_user($ROW['userid'], $postid);




//inserting comment into the database
if (isset($_POST['commentSubmit'])) {
    $postid = $_GET['id'];
    $userid = $_SESSION["userid"];
    $date = $_POST['date'];
    $message = $_POST['message'];


    $sql = "INSERT INTO comments (userid,postid,date,message)
    VALUES ('$userid','$postid','$date','$message')";
    $result = $conn->query($sql);
}


//getting comment from the database
$sql = "SELECT * FROM comments WHERE postid = '$postid'";
$result = $conn->query($sql);

//getting users form the database
$userid = $_SESSION["userid"];
$sql1 = "SELECT * FROM users WHERE userid='$username'";
$result1 = $conn->query($sql1);
$row1 = mysqli_fetch_assoc($result1);


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

        .profile-pic {
            border-radius: 50%;
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

        .comment-section {

            padding: 10px;
            margin-bottom: 4px;
            background-color: #efefef;
            border-radius: 4px;
            position: relative;

        }

        .comment-section p {
            font-family: arial;
            font-size: 14px;
            line-height: 16px;
            color: #282828;
            font-weight: 100;


        }

        .edit-btn {
            position: absolute;
            top: 0px;
            right: 50px;
        }

        .edit-btn button {
            width: 60px;
            height: 30px;
            color: #282828;
            background-color: #efefef;
            opacity: 0.7;
            border: none;
        }

        .edit-btn button:hover {

            opacity: 1;
        }

        .reply-btn {
            position: absolute;
            bottom: 0px;
            right: 0px;
        }

        .reply-btn button {
            width: 60px;
            height: 30px;
            color: #282828;
            background-color: #efefef;
            opacity: 0.7;
            border: none;
        }

        .reply-btn button:hover {

            opacity: 1;
        }


        .delete-btn {
            position: absolute;
            top: 0px;
            right: 0px;
        }

        .delete-btn button {
            width: 60px;
            height: 30px;
            color: #282828;
            background-color: #efefef;
            opacity: 0.7;
            border: none;
        }

        .delete-btn button:hover {

            opacity: 1;
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

                </div>
                <div class="card-footer">
                    <div class="d-block post-actions">





                        <?php
                        echo "<form method='post'> 
                            <input type='hidden' name='cid' value='Anonymous'>
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

                        if ($SHOW_USER) {
                            // echo "<div class='comment-section'><p>";
                            // echo '<img class="profile-pic me-2" src="img/' . $row1["image"] . '" alt="profile" width="30px" height="30px">';
                            // echo $row1['username'] . '<br><br>';
                            //echo $row['date'] . '<br><br>';
                            //  echo $ROW['message'] . '<br>';

                            foreach ($SHOW_USER as $ROW) 
                            {

                                echo "<div class='comment-section'><p>";
                                echo '<img class="profile-pic me-2" src="img/' . $ROW["image"] . '" alt="profile" width="30px" height="30px">';
                                echo $ROW['username'] . '<br><br>';
                                //echo $row['date'] . '<br><br>';
                                echo $ROW['message'] . '<br>';

                                // echo "</p>";
                                if($_SESSION['userid']==$ROW['userid'])
                                {
                                echo "<form class='edit-btn' method='post' action='editcomment.php'>
                            <input type='hidden' name='postid' value='" . $ROW['postid'] . "'>
                            <input type='hidden' name='cid' value='" . $ROW['cid'] . "'>
                            <input type='hidden' name='userid' value='" . $ROW['userid'] . "'>
                            <input type='hidden' name='date' value='" . $ROW['date'] . "'>
                            <input type='hidden' name='message' value='" . $ROW['message'] . "'>
                            <button>Edit</button>
                            </form>";


                                echo "</p>
                            <form class='delete-btn' method='post' action='deletecomment.php'>
                            <input type='hidden' name='cid' value='" . $ROW['cid'] . "'>
                            <input type='hidden' name='userid' value='" . $ROW['userid'] . "'>
                            <input type='hidden' name='date' value='" .$ROW['date'] . "'>
                            <input type='hidden' name='message' value='" . $ROW['message'] . "'>
                            <button>Delete</button>
                            </form>";
                        }

                            echo "
                            <form class='reply-btn' method='post' action='reply.php'>
                            <input type='hidden' name='cid' value='" . $ROW['cid'] . "'>
                            <input type='hidden' name='userid' value='" . $ROW['userid'] . "'>
                            <input type='hidden' name='message' value='" . $ROW['message'] . "'>
                            <button>Reply</button>
                            </form>";



                                echo "</div>";
                            }
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