<?php
session_start();
include('config.php');
include('user.php');




if (isset($_POST['cancel'])) {
    header('Location: profile.php');
}
// inserting reply to the database
if (isset($_POST['replySubmit'])) {
    $cid = $_POST['cid'];
    $userid = $_SESSION["userid"];
    $replyMessage = $_POST['replymessage'];
    

    $sql = "INSERT INTO replies (cid, userid, reply_message) VALUES ('$cid', '$userid', '$replyMessage')";
    $result = $conn->query($sql);
}
$userid = $_SESSION["userid"];
$cid = $_POST['cid'];
$query = "SELECT replies.*, users.username, users.image
             FROM replies
             INNER JOIN users ON replies.userid = users.userid
             where replies.cid='$cid'";
$res = $conn->query($query);
//$ROW = mysqli_fetch_assoc($res);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Reply Comment</title>
    <style>
        body {
            background-color: #f9fafb;
            margin-top: 20px;

        }
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

        .profile-pic {
            border-radius: 50%;
        }

        .comment-section {

            padding: 10px;
            margin-bottom: 4px;
            background-color: #efefef;
            border-radius: 4px;
            position: relative;
            

        }

        .comment-section p {
            font-family: arial;
            font-size: 14px;
            line-height: 16px;
            color: #282828;
            font-weight: 100;
            justify-content: center;
            text-align:center;

        }
    </style>
</head>

<body>

    <div class="card-footer">
        <div class="d-block post-actions">
            <h3>
                <p class="text-center text-body-tertiary">Replying Comment</p>
            </h3>

            <?php
             

            

            echo "<form method='post'>";
            
            $cid = $_POST['cid'];
            $userid = $_POST['userid'];
            $message = $_POST['message'];

                            echo "<input type='hidden' name='cid' value='" . $cid . "'>
                            <input type='hidden' name='userid' value='" . $userid . "'>
                            <div class='form-floating me-5 ms-5'>
                            <textarea class='form-control' name='message' cols='200' row='80' readonly>" . $message . "</textarea><br><br>
                                
                            <textarea class='form-control' name='replymessage' cols='200' row='80' placeholder='Reply this comment'></textarea>
                                <p class='text-end'><button type='submit' name='replySubmit' class='btn btn-primary mt-2 me-2'>Reply
                                </button><button type='cancel' name='cancel' class='btn btn-secondary mt-2 '>Cancel
                                </button></p>

                        </div>
                        </form>";
            
             
             ?>

        </div>
    </div>
    <!-- replay messages -->
    <div class="card-footer">
        <div class="d-block post-actions">
        
            <?php
            while ($ROW = $res->fetch_assoc()) {
            
            echo "<div class='comment-section'><p>";
            echo '<img class="profile-pic me-2" src="img/' . $ROW["image"] . '" alt="profile" width="30px" height="30px">';
            echo $ROW['username'] . '<br><br>';
            echo $ROW['reply_message'] . '<br>';
            echo "</p>";
            echo "</div>";
            
            }
            ?>
             

        </div>
    </div>


</body>

</html>