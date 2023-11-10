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
    //Check  User logIn
 if(isset($_POST["submit"])){
 
 $nameemail = $_POST["nameemail"];
 $password = $_POST["password"];
 $result =mysqli_query($conn,"SELECT * FROM admins where name = '$nameemail' OR email = '$nameemail'");
 $row = mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result)>0){
    if($password ==$row["password"]){
        $_SESSION["login"] =true;
        $_SESSION["id"] = $row["id"];

        header("Location: adminpanel.php");
    }else{
        echo "<script>alert ('Psssword does not match');</script>";
 }
    }
    else{
        echo "<script>alert ('Account does not exit');</script>";
            }
     
    }
    if (isset($_POST['cancel'])) {
        header('Location: adminlogin.php');
        die;
    }
    
 
    $conn->close();

    



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Admin Login</title>
</head>
<style>
    body {
        background-color: #cfcfcf;
    }
</style>

<body>

        <form action="" method="post" autocomplete="off">
            <p class="title">ADMIN LOGIN</p>
            <div class="mb-2">
                
                <label>Name or Email</label>
                <input name= "nameemail" type="text" class="form-control" placeholder="Enter Your Name or Email">
            </div>
            <div class="mb-2">
                <label>Password</label>
                <input name ="password" type="password" class="form-control" placeholder="Enter Your Password">
            </div>

            <button class="btn btn-primary" name="submit">Login</button>
            <button class="btn btn-secondary">Cancel</button>
            <p class="forget">Don't have an account?<a href="adminregister.php">Sign Up</a></p>

        </form>
    
</body>

</html>