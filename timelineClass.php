

<!-- Posting Card-->
<div class="col-md-12">
    <div class="card rounded">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <img class="img-xs rounded-circle my-1" src="img/<?php echo $userData["users"]["image"]; ?>">
                    <div>
                        <p class="ms-2"><?php echo $userData["users"]["username"]; ?></p>
                        <p class="text-muted"><?php  echo $row["date"]; ?></p>
                        <p class="text-muted"><?php  echo "#".$posts["reviews_for"]; ?></p>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="icons/more-horizontal.svg" alt="More Button">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <img src="icons/edit-3.svg" alt="Edit" class="me-2">
                            <span class>Edit</span></a>

                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <img src="icons/trash-2.svg" alt="Delete" class="me-2">
                            <span class>Delete</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Two Body -->
        <div class="card-body">
            <p class="mb-3 tx-14">
                <?php echo $posts["post"];
                ?>
            </p>
            <img class="img-fluid" src="../../../assets/images/sample2.jpg" alt>
        </div>
        <div class="card-footer">
            <div class="d-flex post-actions">
                <a href="javascript:;" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/heart.svg" alt="Like">
                    <p class="d-none d-md-block ms-2 ">Like</p>
                </a>

                <a href="javascript:;" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/message-circle.svg" alt="Comment">
                    <p class="d-none d-md-block ms-2">Comment</p>
                </a>
                <a href="javascript:;" class="d-flex align-items-center text-muted ms-4 text-decoration-none">
                    <img src="icons/share.svg" alt="Share">
                    <p class="d-none d-md-block ms-2 ">Share</p>
                </a>
            </div>
        </div>
        <!-- Card Footer -->
    </div>
</div>

    <!-- Posting Card -->