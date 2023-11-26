<?php
session_start();
include("config.php");
//getting userid from the post
$userid = $_SESSION["userid"];
//getting type and comments from the form
if (isset($_POST['sent'])) {
    $type = $_POST["type"];
    $comments = $_POST["comments"];
    $username = $_POST["username"];
    //insert into the database
    $sql = "INSERT INTO reports (senter_userid,type,comments,username)
   VALUES ('$userid','$type','$comments','$username')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Your Report sent successfully to admin');</script>";
        //header('Location: adminlogin.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
    $conn->close();
}
//Cancel the reports
if (isset($_POST['cancel'])) {
    header('Location: profile.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Report User</title>
</head>
<style>
    body {
        background-color: #cfcfcf;
    }
</style>

<body>



    <form action="" method="post" autocomplete="off">
        <p class="title">Report User</p>



        <input name="username" type="text" class="form-control mb-3" placeholder="Enter Report Username">

        <select name="type" class="form-select mb-3" required>
            <option disabled selected>Choose type...</option>
            <option>False Information</option>
            <option>Violate Privacy and Rules</option>


        </select>
        
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comments"></textarea>
            <label for="floatingTextarea">Comments</label>
        </div>

        <button class="btn btn-primary" name="sent">Sent</button>
        <button class="btn btn-secondary">Cancel</button>

    </form>




</body>

</html>