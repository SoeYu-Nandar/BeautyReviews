

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
 <div class="commentContainer">
                        <?php
                    
                        if ($SHOW_USER) {
                           
                            foreach ($SHOW_USER as $ROW) 
                            {

                                echo "<div class='comment-section'><p>";
                                echo '<img class="profile-pic me-2" src="img/' . $ROW["image"] . '" alt="profile" width="30px" height="30px">';
                                echo $ROW['username'] . '<br><br>';
                                echo $ROW['message'] . '<br>';

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