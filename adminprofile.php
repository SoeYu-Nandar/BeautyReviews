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
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];

    $result = mysqli_query($conn, "SELECT * FROM users  WHERE username='admin' and password='password'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Admin Profile</title>
    
</head>

<body class="bg-light">
    <!-- side navbar -->
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-light pe-3">
                <h1 class="h4 py-3 text-center text-primary">
                    <img src="icons/user-solid.svg" alt="Colums" width="30px" height="30px">
                    <span class="d-none d-lg-inline">
                        <a href="adminpanel.php" style="text-decoration: none";>ADMIN</a>
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-user-circle"></i>
                        <span class="d-none d-lg-inline">Admin Profile</span>
                    </a>
                    <a href="adminedit.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-cog"></i>
                        <span class="d-none d-lg-inline">Edit</span>
                    </a>

                    <a href="adminlogin.php" class="list-group-item list-group-item-action">
                    <img src="icons/log-out.svg" alt="Logout">
                        <span class="d-none d-lg-inline">Logout</span>
                    </a>

                </div>

            </nav>
            
            <!-- table section -->
            <div class="table-responsive col-10">
                <h1 class="h2 text-center mb-4 mt-3 text-info">ADMIN DETAILS</h1>
                <table class="table table-striped table-info text-center">
                    <tr>
                        <th>Name</th>
                        <td><?php echo $row["username"]; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $row["gender"]; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><?php echo md5($row["password"]); ?></td>
                    </tr>
                </table>
            </div>
            </main>
</body>

</html>