<?php 
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beauty_reviews";
    
    
    if(isset($_POST['submit'])) {
        $email = $_POST["email"];
        $inputPassword = $_POST["password"]; 
       
        
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $stmt = $conn->prepare("select * from users where email =?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
            
                if ($data['password'] === $inputPassword) {
                    echo "<script> alert ('Login Successfully');</script>";
                    header("Location: profile.php");
                } else {
                    echo "<script> alert ('Invalid Email or Password');</script>";
                }
            } else {
                echo "<script> alert ('Invalid Email or Password');</script>";
            }
        }
                    
        

        

        if (isset($_POST['cancel'])) {
            header('Location: index.php');
            die;
        }
        
       
            
           
           
        $conn->close();
    }
        
    
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Login Form</title>
</head>

<body class ="bgcolor">
    
    <header>
        <img src="img/beautyicon.png" alt="Beautyicon" width="80px" height="80px">
        <h1 class="fw-bold">Beauty Reviews</h1>
    </header>
    <section>

        <form action="" method="post" autocomplete="off">
            <p class="title">LOGIN FORM</p>
            <div class="mb-2">
                
                <label><i class="fas fa-envelope me-2"></i> Email</label>
                <input name= "email" type="text" class="form-control" placeholder="Enter Your Email">
            </div>
            <div class="mb-2">
                <label><i class="fas fa-key me-2"></i> Password</label>
                <input name ="password" type="password" class="form-control" placeholder="Enter Your Password">
            </div>

            <button class="btn btn-primary" name="submit">Login</button>
            <button class="btn btn-secondary">Cancel</button>

            <p class="forget">Don't have an account?<a href="register.php">Sign Up</a></p>

        </form>
    </section>
</body>

</html>