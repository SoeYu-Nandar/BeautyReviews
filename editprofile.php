<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_reviews";

if(isset($_POST['submit'])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>

<body class="bgcolor">

    <form method="post" action="" autocomplete="off">

    <p class="title">EDIT PROFILE</p>
        <input name="username" type="text" class="form-control mb-4" placeholder="User Name" required>
        <input name="email" type="text" class="form-control mb-4" placeholder=" Email" required>
        <input name="password" type="password" class="form-control mb-4" placeholder="Password" required>
        <input name="file" type="file" class="form-control mb-4" placeholder="Change Profile" required>
        <button class="btn btn-primary" type="submit" name="submit">Edit Form</button>
        <button class="btn btn-secondary">Cancel</button>


    </form>





</body>

</body>

</html>