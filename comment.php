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
  </style>

<body>




  <!-- Posting Card-->
  <div class="container text-center">
    <div class="row justify-content-md-center">
      <div class="card rounded">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
              
              <div>
                <p><?php echo $ROW_USER['username']; ?></p>
                
              </div>
            </div>
            <form method="post">


              <!-- Delete Post-->
              <!-- <input type="hidden" name="postid" value=""> -->
              <!-- <input id="post_button" type="submit" value="Delete"> -->
              <button type="submit" name="delete" class="btn btn-primary">Comment</button>

              
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
        
      
      </div>
    </div>

  </div>
  </div>

</body>