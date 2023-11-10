<?php 
   
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "beauty_reviews";
   
  //  User Registion  to the database
   if(isset($_POST['submit'])){
     $username = $_POST["username"];
     $gender = $_POST["gender"];
     $email = $_POST["email"];
     $password = $_POST["password"];
     $password2 = $_POST["password2"];
    
    // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
    
   $sql = "INSERT INTO admins (name,gender,email,password)
   VALUES ('$username','$gender','$email','$password')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Registration Successfully');</script>";
      header('Location: adminlogin.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
    $conn->close();
  }
  if (isset($_POST['cancel'])) {
   header('Location: adminregister.php');
   die;
   } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Register</title>
    <style>
        body {
            background-color: #cfcfcf;
        }
    </style>
</head>
<body>
<form  method="post" action ="" autocomplete="off" enctype="multipart/form-data">
  
  <p class="title">ADMIN REGISTER</p>

  <input name = "username" type="text" class="form-control mb-3" placeholder="Name" required>
  <select  name = "gender" class="form-select mb-3" required>
      <option >Gender</option>
      <option>Male</option>
      <option>Female</option>
    </select>
    
  

<input name = "email" type="text" class="form-control mb-3" placeholder="Email" required> 
  
<input name = "password" type="password" class="form-control mb-3" placeholder="Password" required>
  
<input name = "password2" type="password" class="form-control mb-3" placeholder="Retype Password" required>


  

    

  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
  <button class="btn btn-secondary">Cancel</button>
  
</form>







</body>
</html>