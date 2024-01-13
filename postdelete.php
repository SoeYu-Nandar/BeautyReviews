<?php
session_start();
// post delete
include("config.php");
include('post.php');
include('user.php');


// Check if the user is logged in
if (!isset($_SESSION['id'])) {
  header("Location: index.php");
  exit();
}

$Post = new Post();
$ERROR = "";
if (isset($_GET['id'])) {
  
        $ROW = $Post->get_one_posts($_GET['id']);
        

        if (!$ROW) {
          $ERROR = "Post does not has found!";
        }
} else {
  $ERROR = "Post does not has found!";
}

$user = new User();
$ROW_USER = $user->get_user($ROW['userid']);

//post deleting
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $deleteResult = $Post->delete_post($ROW['postid']);
  //header("Location: profile.php");
  //die;
  if ($deleteResult) {
    header("Location: profile.php");
    exit();
  } else {
    echo "Failed to delete the post.";
  }
  
  
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Delete Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
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

    .card-header:first-child {
      border-radius: 0 0 0 0;
    }

    .card-header {
      padding: 0.875rem 1.5rem;
      margin-bottom: 0;
      background-color: rgba(0, 0, 0, 0);
      border-bottom: 1px solid #f2f4f9;
    }

    .card-footer:last-child {
      border-radius: 0 0 0 0;
    }

    .card-footer {
      padding: 0.875rem 1.5rem;
      background-color: rgba(0, 0, 0, 0);
      border-top: 1px solid #f2f4f9;
    }

    .grid-margin {
      margin-bottom: 1rem;
    }

    .card {
      box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
      -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
      -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
      -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    }

    .rounded {
      border-radius: 0.25rem !important;
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid #f2f4f9;
      border-radius: 0.25rem;
    }
    .likeIcon:hover,
        .likeIcon:focus{
            filter: invert(27%) sepia(91%) saturate(1898%) hue-rotate(330deg);
        }
  </style>

<body>




  <!-- Posting Card-->
  <div class="container text-center">
    <div class="row justify-content-md-center">
      <div class="card rounded">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
              <img class="img-xs rounded-circle my-1" src="img/<?php echo $ROW_USER['image']; ?>">
              <div>
                <p><?php echo $ROW_USER['username']; ?></p>
                <p class="text-muted"><?php echo $ROW["date"]; ?></p>
                <p class="text-muted"><?php echo "#" . $ROW["reviews_for"]; ?></p>
              </div>
            </div>
            <form method="post">

              
              <button type="submit" name="delete" class="btn btn-primary">Delete</button>

              
            </form>
          </div>
        </div>



        <!-- Card Two Body -->
        <div class="card-body">
          <p class="mb-3 tx-14">
            <?php
             echo $ROW['post'];
            ?> <br><br>
           
           <?php if(file_exists($ROW['post_image'])) 
            {
                echo"<div class='text-center'>";
                  echo "<img src='{$ROW['post_image']}' style='width:300px;height:300px;'/>";
                  echo"</div>";
            }
             ?>
          </p>
          <img class="img-fluid" src="../../../assets/images/sample2.jpg" alt>
        </div>
        <div class="card-footer">
            <div class="d-flex post-actions justify-content-around">
                <?php 
                    $likes = "";

                    $likes = ($ROW['likes'] > 0) ? "(" .$ROW['likes'] . ")": "";
                
                ?>
                <a href="like.php?type=post&id=<?php echo $ROW['postid']?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/heart-fill.svg" alt="Like" class="likeIcon" style="width:25px";>
                    <p class="d-none d-md-block ms-2 ">Like<?php echo $likes?></p>
                </a>

                <a href="comment.php?type=post&id=<?php echo $ROW['postid']?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/chat-heart.svg" alt="Comment" class="likeIcon" style="width:25px";>
                    <p class="d-none d-md-block ms-2">Comment</p>
                </a>
            </div>
        </div>
        <!-- Card Footer -->
      </div>
    </div>

  </div>
  </div>

</body>
</html>