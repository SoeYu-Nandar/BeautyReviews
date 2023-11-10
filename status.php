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
$suspended = $_GET['suspended'];
$query = "UPDATE users SET suspended = $suspended WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location:adminpanel.php');
} else {
    header('location:adminpanel.php');
}
?>