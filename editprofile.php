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
      $gender =$_REQUEST['gender'];
      $email =$_REQUEST['email'];
      $password =$_REQUEST['password'];
      $img = $_FILES['img']['name'];
      $img1 = $_FILES['img1']['name'];

      if((!empty($username)) && (!empty($email)))
      {
        $userid =$_SESSION["userid"];
        $upquery = mysqli_query($conn,"UPDATE users SET username='$username',email ='$email' WHERE userid='$userid'");
          if(!empty($password))//check password
          {
            $upquery = mysqli_query($conn,"UPDATE users SET password='$password' WHERE userid='$userid'");
          }
          if(!empty($gender))//check gender
          {
            $upquery = mysqli_query($conn,"UPDATE users SET gender='$gender' WHERE userid='$userid'");
          }
          if(!empty($img))//check profile image
          {
            $tmpName = $_FILES['img']['tmp_name'];
            $uploadDir = "img/";
              move_uploaded_file($tmpName,$uploadDir.$img);
              $upquery = mysqli_query($conn,"UPDATE users SET image='$img' WHERE userid='$userid'");
           
          }
          if(!empty($img1))//check cover image
          {
            $tmpName = $_FILES['img1']['tmp_name'];
            $uploadDir = "img/";
            move_uploaded_file($tmpName,$uploadDir.$img1);
            $upquery = mysqli_query($conn,"UPDATE users SET cimage='$img1' WHERE userid='$userid'");
          }
          
        header('Location: profile.php');
        exit;
      }else{
        echo "<script>alert ('Username and Email are required');</script>";
        header('Location: editprofile.php');
        exit;
      }
      
    }

    $userid =$_SESSION["userid"];
    $result = mysqli_query($conn,"SELECT * FROM users WHERE userid ='$userid'");
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
    <style>
      body.bgcolor{
        overflow:visible;
      }
      .profile-pic {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        
      }
      .cover-pic {
        width: 115px;
        height: 115px;
        border-radius: 15px;
        
        
      }
      .title {
    
    margin-bottom: 2px;
    
}
      
            

    </style>
</head>

<body class="bgcolor">

    <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

    <p class="title">EDIT PROFILE</p>


    

    <label for="img"><img class="profile-pic" src="img/<?php echo $row['image']; ?>" alt="profile" style="margin: 15px;">Change profile</label>
        <input name="img" type="file" id ="img" class="form-control" placeholder="Change Profile" style="display:none;visibility:hidden;"><br>

        


        <label for="username">Username</label>
        <input name="username" id ="username" value ="<?php echo $row['username']; ?>" type="text" class="form-control mb-1" placeholder="Change Your User Name" required>
        <label>Gender</label>
        <select name="gender" class="form-select" required>
                <option disabled selected>Gender</option>
                <option <?php if($row['gender']=="Male"){echo "selected";}?>>Male</option>
                <option <?php if($row['gender']=="Female"){echo "selected";}?>>Female</option>
                
                
            </select>

        <label for="email">Email</label>
        <input name="email" id ="email" value ="<?php echo $row['email']; ?>" type="text" class="form-control mb-1" placeholder="Change Your Email" required>

        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" placeholder="Change Your Password" required>

        <label for="img1"><img class="cover-pic" src="img/<?php echo $row['cimage']; ?>" alt="cover" style="margin: 10px;">Change Cover</label>
        <input name="img1" type="file" id ="img1" class="form-control" placeholder="Change Cover" style="display:none;visibility:hidden;">

        
        <button class="btn btn-primary" type="submit" name="submit">Edit Form</button>
        <button class="btn btn-secondary" name="cancel">Cancel</button>
        <a href="profile.php">Your Profile</a>


    </form>





</body>

</body>

</html>