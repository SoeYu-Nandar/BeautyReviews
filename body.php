<?php 
include("post.php");
include("user.php");

session_start();
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
// create posts
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $post = new Post();
    $userid = $_SESSION["userid"];
     //Check if the user is suspended
    if ($row["suspended"] == 1) {
        echo "<script> alert('Your account is suspended by admin.');</script>";
    } else {
        // User is not suspended, proceed with post creation
        $result = $post->create_post($userid, $_POST,$_FILES);

if($result == "" && $reviewResult =="") {
    header("Location: timeline.php");
    die;
}else {
    echo "<div class='alert alert-danger d-inline' role='alert'>
            This is a danger alert—check it out!
        </div>";
    // echo "<br>The following errors occured :<br><br>";
    // echo $result;
    // echo"</div>";
}
}
}

if (!empty($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE userid ='$userid'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
}

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];

    // Assuming $conn is database connection
    $result = mysqli_query($conn, "SELECT users.*, posts.* FROM users
                                    LEFT JOIN posts ON users.userid = posts.userid
                                    ORDER BY posts.id DESC
                                    LIMIT 10");
    
    
     // Fetch all rows using a loop
     $users = array();
     while ($row_result = mysqli_fetch_assoc($result)) {
         $user_id = $row_result['userid'];
       
    // Create an associative array for the user if it doesn't exist
        if(!isset($users[$user_id])) {
            $users[$user_id] = array(
                'users' =>array(
                    'userid' => $row_result['userid'],
                    'username' => $row_result['username'],
                    'image' =>$row_result['image'],

                ),
                'posts'=>array(),
            );
        }
// Add post information
if($row_result['reviews_for']=='body')
{
    $users[$user_id]['posts'][] = array(
        'post' => $row_result['post'],
        'date' => $row_result['date'],
        'reviews_for'=>$row_result['reviews_for'],
        'post_image' =>$row_result['post_image'],
        'postid' =>$row_result['postid'],
        'likes' =>$row_result['likes'],
    );
    
    }
     }
    
  
} else {
    header("Location: index.php");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Body</title>
  
    <?php include("filterPost.php"); ?>

</body>

</html>