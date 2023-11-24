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

$sql = "SELECT * FROM reports";
$result = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Report Users</title>
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
            <h2 class=" h3 text-info">Report Information</h2>
            <?php
            if ($result->num_rows > 0) {
                

                echo '<table class = "table">';
                echo "<tr><th>Senter_UserID</th><th>Type</th><th>Comments</th><th>Username</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["senter_userid"] . "</td>";  
                    echo "<td>". $row["type"] . "</td>";
                    echo  "<td>". $row["comments"] . "</td>";
                    echo "<td>". $row["username"] . "</td>";
                    echo "<td>";
                    echo '<a class="btn btn-sm btn-success m-2" href="adminpanel.php">Search User</a>';
                    echo "</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } else {
                echo "No records found";
            }
            ?>