<?php 
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

// if(!isset($_SESSION['login'])){
//   header('Location: index.php');
// }

    if(isset($_REQUEST['submit']))
    {
      $username =$_REQUEST['username'];
      $email =$_REQUEST['email'];
      $password =$_REQUEST['password'];
      $img = $_FILES['img']['name'];
      $img1 = $_FILES['img1']['name'];

      if((!empty($username)) && (!empty($email)))
      {
        $id =$_SESSION["id"];
        $upquery = mysqli_query($conn,"UPDATE users SET username='$username',email ='$email' WHERE id='$id'");
          if(!empty($password))
          {
            $upquery = mysqli_query($conn,"UPDATE users SET password='$password' WHERE id='$id'");
          }
          if(!empty($img))
          {
            $tmpName = $_FILES['img']['tmp_name'];
            $uploadDir = "img/";
            move_uploaded_file($tmpName,$uploadDir.$img);
            $upquery = mysqli_query($conn,"UPDATE users SET image='$img' WHERE id='$id'");
          }
          if(!empty($img1))
          {
            $tmpName = $_FILES['img1']['tmp_name'];
            $uploadDir = "img/";
            move_uploaded_file($tmpName,$uploadDir.$img1);
            $upquery = mysqli_query($conn,"UPDATE users SET cimage='$img1' WHERE id='$id'");
          }
          
        header('Location: profile.php');
        exit;
      }else{
        echo "<script>alert ('Username and Email are required');</script>";
        header('Location: editprofile.php');
        exit;
      }
      
    }

    $id =$_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id ='$id'");
    $row=mysqli_fetch_assoc($result);

    if(isset($_POST['cancel']))
    {
      header('Location: profile.php');
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

    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

    <p class="title">EDIT PROFILE</p>
        <label for="username">Username</label>
        <input name="username" id ="username" value ="<?php echo $row['username']; ?>" type="text" class="form-control mb-2" placeholder="Change Your User Name" required>

        <label for="email">Email</label>
        <input name="email" id ="email" value ="<?php echo $row['email']; ?>" type="text" class="form-control mb-2" placeholder="Change Your Email" required>

        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control mb-2" placeholder="Change Your Password" required>

        <label for="img">Profile Picture</label>
        <input name="img" type="file" id ="img" class="form-control mb-2" placeholder="Change Profile">

        <label for="img1">Cover Picture</label>
        <input name="img1" type="file" id ="img1" class="form-control mb-2" placeholder="Change Cover">

        <button class="btn btn-primary" type="submit" name="submit">Edit Form</button>
        <button class="btn btn-secondary" name="cancel">Cancel</button>
        <a href="profile.php">Your Profile</a>


    </form>





</body>

</body>

</html>