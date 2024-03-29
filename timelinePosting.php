

<!-- Posting Card-->
<div class="col-md-12">
    <div class="card rounded">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <img class="img-xs rounded-circle my-1" src="img/<?php echo $userData["users"]["image"]; ?>">
                    <div>
                        <p class="ms-2"><?php echo $userData["users"]["username"]; ?></p>
                        <p class="text-muted"><?php  echo $posts["date"]; ?></p>
                        <p class="text-muted"><?php  echo "#".$posts["reviews_for"]; ?></p>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="icons/more-horizontal.svg" alt="More Button">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        <a class="dropdown-item d-flex align-items-center" href="reportuser.php">
                            <img src="icons/daily-report.png" alt="Edit" class="me-2" width="30px" height="30px">
                            <span class>Report User</span></a>

                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Two Body -->
        <div class="card-body">
            <p class="mb-3 tx-14">
                <?php echo $posts["post"];
                ?>
                <br><br>
                <?php 
                if(isset($posts["post_image"]) && file_exists($posts["post_image"])) {
                    echo "<div class='text-center'>";
                    echo "<img src='{$posts['post_image']}' style='width:500px;height:500px;'/>";
                    echo "</div>";
                }
                
                ?>
            </p>
        </div>
        <div class="card-footer">
            <div class="d-flex post-actions justify-content-around">
            <?php 
                    $likes = "";

                    $likes = ($posts['likes'] > 0) ? "(" .$posts['likes'] . ")": "";
                
                ?>
            <a href="like.php?type=post&id=<?php echo $posts['postid']?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/heart-fill.svg" alt="Like" class="likeIcon" style="width:25px";>
                    <p class="d-none d-md-block ms-2 ">Like<?php echo $likes?></p>
                </a>

                <a href="comment.php?type=post&id=<?php echo $posts['postid']?>" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/chat-heart.svg" alt="Comment" class="likeIcon" style="width:25px";>
                    <p class="d-none d-md-block ms-2">Comment</p>
                </a>
               
            </div>
        </div>
        <!-- Card Footer -->
    </div>
</div>

    <!-- Posting Card -->