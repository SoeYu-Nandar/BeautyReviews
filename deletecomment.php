<?php
session_start();
include('config.php');
include('commentpost.php');
      
          if(isset($_POST['cancel']))
          {
            header('Location: profile.php');
          }
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Delete Comment</title>
    <style>
        body {
            background-color: #f9fafb;
            margin-top: 20px;

        }
        
        
    </style>
</head>

<body>

    <div class="card-footer">
        <div class="d-block post-actions">
        <h3><p class="text-center text-body-tertiary">Do you want to delete this comment?</p></h3>

            <?php

                $cid = $_POST['cid'];
                $userid = $_POST['userid'];
                $date = $_POST['date'];
                $message = $_POST['message'];
            echo "<form method='post' action ='".deleteComments($conn)."'> 
                            <input type='hidden' name='cid' value='".$cid."'>
                            <input type='hidden' name='userid' value='".$userid."'>
                            <input type='hidden' name='date' value='".$date."'>
                            <div class='form-floating me-5 ms-5'>
                            <textarea class='form-control' name='message' cols='200' row='80'>" .$message . "</textarea>
                                
                                <p class='text-end'><button type='submit' name='deleteSubmit' class='btn btn-primary mt-2 me-2'>Delete
                                </button><button type='cancel' name='cancel' class='btn btn-secondary mt-2 '>Cancel
                                </button></p>

                        </div>
                        </form>";
            ?>

        </div>
    </div>


</body>

</html>