<?php 

class Database
{
    private $host = "localhost";
    private  $username = "root";
    private $password = "";
    private $db = "beauty_reviews";



function connect() {

    $connection = mysqli_connect($this->host,$this->username,$this->password,$this->db);
    return $connection;
}

function read($query) {

    $conn = $this->connect();
    $result = mysqli_query($conn,$query);

    if(!$result) {
        return false;
    }else{
        $data = false;
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        return $data;
    }
    

}
function delete($query){
    $conn = $this->connect();
    $result = mysqli_query($conn,$query);
    if(!$result) {
        return false;
    }else{
        header('Location: profile.php');
}
}
function edit($query){
    $conn = $this->connect();
    $result = mysqli_query($conn,$query);
    if(!$result) {
        return false;
    }else{
        header('Location: profile.php');
}
}


function save($query) {

    $conn = $this->connect();
    $result = mysqli_query($conn,$query);

    if(!$result) {
        return false;
    }else{
        return true;
    }

    }
}

$DB = new Database();

















?>