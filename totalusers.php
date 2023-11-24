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

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
    $search = $_POST["search"];
    $result = mysqli_query($conn, "SELECT * FROM users where username='$search'");
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
    <title>Users</title>
    <style>
        .img-xs {
            width: 37px;
            height: 37px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }
    </style>

</head>

<body> <!-- Table section -->
    <div class="mt-1 flex-column flex-lg-row text-center">
        <div class="col">

            <h2 class=" h3 text-info">Total Users</h2>
            <form method="post">
                <div class="input-group">
                    <input type="text" class="ms-3" placeholder="Search Username..." name="search" style="border-radius: 30px; border:none;">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" style="border:none;"><img src="icons/search.png" alt="Colums" width="30px" height="30px"></button>
                </div>
            </form>
            <?php
            if ($result->num_rows > 0) {


                echo '<table class = "table">';
                echo "<tr><th>UserName</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>";
                    echo '<a class="btn btn-sm btn-danger m-2" href="reportuser.php">Report</a>';
                    echo "</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } else {
                echo "No records found";
            }
            ?>