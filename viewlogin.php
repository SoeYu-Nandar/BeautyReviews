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


$result = mysqli_query($conn, "SELECT * FROM users");
$row = mysqli_fetch_assoc($result);

if (isset($_REQUEST['submit'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    header('Location: profile.php');
}


//$userid = $_SESSION["userid"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="style.css"> 
    <title>AdminView Login</title>
</head>
<body>
<style>
        body {
            background-color: #cfcfcf;
        }
        .fa-eye {
            position: absolute;
            top: 45%;
            right: 8%;
            cursor: pointer;
            color: lightgray;
        }
    </style>

</head>

<body>

   
     <section>

        <form action="" method="post" autocomplete="off">
            <p class="title">LOGIN FORM</p>
            <div class="mb-3">

                
                <input name="username" type="text" class="form-control" placeholder="UserName" id="username" value="<?php echo $row['username']; ?>">
            </div>
            <div class="mb-3 pwd-container">
                
                <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password" value="<?php echo $row['password']; ?>"><i class="far fa-eye" id="eye"></i>

            </div>

            <button class="btn btn-primary" name="submit" type="submit">Login</button>
            <button class="btn btn-secondary">Cancel</button>

            
        </form>
    </section> 
    
    <script>
        var passwordInput = document.getElementById('passwordInput');
        var eye = document.getElementById('eye');
        showHidePassword = () => {
            if (passwordInput.type == 'password') {
                passwordInput.setAttribute('type', 'text');
                eye.classList.add('fa-eye-slash');
            } else {
                eye.classList.remove('fa-eye-slash');
                passwordInput.setAttribute('type', 'password');
            }
        };
        eye.addEventListener('click', showHidePassword);
    </script>
</body>
</html>