

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-md-12">
    <div class="card rounded">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <img class="img-xs rounded-circle my-1" src="img/<?php echo $row["image"]; ?>">
                    <div>
                        <p class="ms-2"><?php echo $row["username"]; ?></p>
                        <p class="text-muted"><?php  echo "#".$ROW["reviews_for"]; ?></p>
                        
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="icons/more-horizontal.svg" alt="More Button">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        

                        <a class="dropdown-item d-flex align-items-center" href="postedit.php?id=<?php echo $ROW['postid']?>"  name ="edit">
                            <img src="icons/edit-3.svg" alt="Edit" class="me-2">
                            <span class>Edit</span></a>
                            

                        <a class="dropdown-item d-flex align-items-center" href="postdelete.php?id=<?php echo $ROW['postid']?>"  name ="delete">
                            <img src="icons/trash-2.svg" alt="Delete" class="me-2">
                            <span class>Delete</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Two Body -->
        <div class="card-body">
            <p class="mb-3 tx-14">
                <?php echo $ROW['post'];
                ?> <br><br>
                <?php 
                if(file_exists($ROW['post_image'])) 
                {
                    echo"<div class='text-center'>";
                      echo "<img src='{$ROW['post_image']}' style='width:300px;height:300px;'/>";
                      echo"</div>";
                }

                
                ?>
            </p>
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
<!-- Posting Card -->













    
</body>
</html>
