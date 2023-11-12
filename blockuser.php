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
$id = $_GET['id'];
$status = $_GET['status'];
$query = "UPDATE users SET status = $status WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location:adminpanel.php');
} else {
    header('location:adminpanel.php');
}
?>