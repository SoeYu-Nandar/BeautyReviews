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
if(isset($_REQUEST['submit']))
    {
      $name =$_REQUEST['name'];
      $gender =$_REQUEST['gender'];
      $email =$_REQUEST['email'];
      
      

      if((!empty($name)) && (!empty($email)))
      {
        $id =$_SESSION["id"];
        $upquery = mysqli_query($conn,"UPDATE users SET username='$name',email ='$email' WHERE id=31");
          if(!empty($password))
          {
            $upquery = mysqli_query($conn,"UPDATE users SET password='$password' WHERE id=31");
          }
          if(!empty($gender))
          {
            $upquery = mysqli_query($conn,"UPDATE users SET gender='$gender' WHERE id=31");
          }
          
        }
        header('Location: adminprofile.php');
        exit;
    }

          $id =$_SESSION["id"];
          $result = mysqli_query($conn,"SELECT * FROM users WHERE id ='31'");
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

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Admin Edit</title>
</head>
<style>
    body {
        background-color: #cfcfcf;
    }
</style>

<body>



    <form action="" method="post" autocomplete="off">
        <p class="title">ADMIN EDIT</p>
    

            
            <input name="name" type="text" value ="<?php echo $row['username']; ?>"class="form-control mb-3" placeholder="Enter Your Name">
        
        
            <select name="gender" class="form-select mb-3" required>
                <option disabled selected>Gender</option>
                <option <?php if($row['gender']=="Male"){echo "selected";}?>>Male</option>
                <option <?php if($row['gender']=="Female"){echo "selected";}?>>Female</option>
                
                
            </select>
            <input name="email" type="text" value ="<?php echo $row['email']; ?>" class="form-control mb-3" placeholder="Enter Your Email">
            <input name="password" type="password" value ="<?php echo $row['password']; ?>" class="form-control mb-3" placeholder="Enter Your Password">
            <button class="btn btn-primary" name="submit">Update</button>
            <button class="btn btn-secondary">Cancel</button>
            <a href="adminprofile.php">Admin Profile</a>
    </form>




</body>

</html>