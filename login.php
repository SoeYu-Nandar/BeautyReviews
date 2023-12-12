<!-- Log In -->
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
if (isset($_POST["submit"])) {

    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users where username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($row["username"] == 'admin' && $row["email"] == 'admin@gmail.com' && $row["password"] == 'password') {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["userid"] = $row["userid"];

            echo "<script>alert('Admin login Successfully');</script>";
            header("Location: adminpanel.php");
            exit;
        }
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["userid"] = $row["userid"];

            if ($row["status"] == 1) {
                echo "<script>alert ('Your account is blocked by admin');</script>";
            } else {

                header("Location: profile.php");
                exit;
            }
        } else {
            echo "<script>alert ('Psssword does not match');</script>";
        }
    } else {
        echo "<script>alert ('User Not Found');</script>";
    }
}


if (isset($_POST['cancel'])) {
    header('Location: index.php');
    die;
}


$conn->close();





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
    <style>
        .fa-eye {
            position: absolute;
            top: 53%;
            right: 8%;
            cursor: pointer;
            color: lightgray;
        }
    </style>

</head>

<body class="bgcolor">

    <!-- <header>
        <img src="img/beautyicon.png" alt="Beautyicon" width="80px" height="80px">
        <h1 class="fw-bold">Beauty Reviews</h1>
    </header> -->
    <section>

        <form action="" method="post" autocomplete="off" style="margin: 10px auto;">
            <p class="title">LOGIN FORM</p>
            <div class="mb-2">

                <label><i class="fas fa-envelope me-2"></i>UserName or Email</label>
                <input name="usernameemail" type="text" class="form-control" placeholder="hello@gmail.com">
            </div>
            <div class="mb-2 pwd-container">
                <label><i class="fas fa-key me-2"></i> Password</label>
                <input name="password" type="password" class="form-control" id="passwordInput"><i class="far fa-eye" id="eye"></i>

            </div>

            <button class="btn btn-primary" name="submit">Login</button>
            <button class="btn btn-secondary">Cancel</button>

            <p class="forget">Don't have an account?<a href="register.php">Sign Up</a></p>

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