<?php

// post delete
include("connect.php");

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
      display: flex;
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
  </style>

<body>




  <!-- Posting Card-->
  <div class="container text-center">
    <div class="row justify-content-md-center">
      <div class="card rounded">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
              <img class="img-xs rounded-circle my-1" src="img/<?php echo $userData["users"]["image"]; ?>">
              <div>
                <p class="ms-2">username</p>
                <p class="text-muted">date</p>
                <p class="text-muted">#body</p>
              </div>
            </div>
            <form action="" method="post">


              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
              </button>

              <!-- Modal -->
              
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Do you want to delete this post?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <button type="button" class="btn btn-primary">Yes</button>
                    </div>
                  </div>
                </div>
              </div>
          
    </form>
  </div>
  </div>



  <!-- Card Two Body -->
  <div class="card-body">
    <p class="mb-3 tx-14">

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

  </div>
  </div>

</body>