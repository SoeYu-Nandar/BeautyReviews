   <?php 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "beauty_reviews";
   
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
   
   $sql = "INSERT INTO users (username,gender,email,password,date)
   VALUES ('$username','$gender','$email','$password',Now())";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script>alert('Registration Successfully');</script>";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
   }
   if (isset($_POST['cancel'])) {
    header('Location: register.php');
    die;
}
  
    


 

?>


        

  



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Registration Form</title>
  

</head>


<body class="bgcolor">
<header>
  <img src="img/beautyicon.png" alt="Beautyicon" width="80px" height="80px">
  <h1 class="fw-bold my-8">Beauty Reviews</h1>
</header>

  <form  method="post" action ="" autocomplete="off">
  
    <p class="title">REGISTER FORM</p>

    <input name = "username" type="text" class="form-control mb-4" placeholder="User Name" required>
    <select  name = "gender" class="form-select mb-4"required>
        <option >Gender</option>
        <option>Male</option>
        <option>Female</option>
      </select>
      
    
  <input name = "email" type="text" class="form-control mb-4" placeholder="Email" required>
   
    
  <input name = "password" type="password" class="form-control mb-4" placeholder="Password" required>
    
  <input name = "password2" type="password" class="form-control mb-4" placeholder="Retype Password" required>
    

    <div class="form-check">
      <input name = "agree" class="form-check-input-lg" type="checkbox" value="" id="invalidCheck" required>
      
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and policy
      </label><br>  
    </div>
  

      

    <button class="btn btn-primary" type="submit" name="submit">Submit Form</button>
    <button class="btn btn-secondary">Cancel</button>
    <a href="index.php"><p class="text-end">Login</p></a>
  </form>
  




</body>

</html>