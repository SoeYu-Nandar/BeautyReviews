<?php 
 if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = striplslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['uname']);
    $pass = validate($_POST['password']);
 }else{
    header("Location: ../index.php");
    exit();
 }