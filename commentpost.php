<?php



function editComments($conn)
{
    if (isset($_POST['editSubmit'])) {
        $cid = $_POST['cid'];
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        echo "<script>alert('Comment Update Successfully');</script>";
        header('Location: timeline.php');
    }
}

function deleteComments($conn)
{
    if (isset($_POST['deleteSubmit'])) {
        $cid = $_POST['cid'];
        $userid = $_POST['userid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        echo "<script>alert('Comment Delete Successfully');</script>";
        header('Location: timeline.php');
    }
}

