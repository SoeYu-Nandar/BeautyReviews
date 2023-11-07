<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_reviews";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Selected the users from the database
if (!empty($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE userid ='$userid'");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");

}
// posting
include("post.php");
include("user.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $post = new Post();
        $userid = $_SESSION["userid"];
        $result= $post->create_post($userid, $_POST);
    
    if($result == "") {
        header("Location: profile.php");
        die;
    }else {
        echo "<div class='alert alert-danger d-inline' role='alert'>
                This is a danger alert—check it out!
            </div>";
        // echo "<br>The following errors occured :<br><br>";
        // echo $result;
        // echo"</div>";
    }
}
// collect posts
$post = new Post();
$id = $_SESSION["userid"];
$posts= $post->get_posts($id);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body {
            background-color: #f9fafb;
            margin-top: 20px;
        }

        .profile-page .profile-header {
            box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
            border: 1px solid #f2f4f9;
        }

        .profile-page .profile-header .cover {
            position: relative;
            border-radius: .25rem .25rem 0 0;
        }


        .profile-page .profile-header .cover figure {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            .profile-page .profile-header .cover figure {
                height: 110px;
                overflow: hidden;
            }
        }

        @media (min-width: 2400px) {
            .profile-page .profile-header .cover figure {
                height: 280px;
                overflow: hidden;
            }
        }

        .profile-page .profile-header .cover figure img {
            border-radius: .25rem .25rem 0 0;
            width: 100%;
        }

        @media (max-width: 767px) {
            .profile-page .profile-header .cover figure img {
                -webkit-transform: scale(2);
                transform: scale(2);
                margin-top: 15px;
            }
        }

        @media (min-width: 2400px) {
            .profile-page .profile-header .cover figure img {
                margin-top: -55px;
            }
        }

        .profile-page .profile-header .cover .gray-shade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: linear-gradient(rgba(255, 255, 255, 0.1), #fff 99%);
        }

        .profile-page .profile-header .cover .cover-body {
            position: absolute;
            bottom: -20px;
            left: 0;
            z-index: 2;
            width: 100%;
            padding: 0 20px;
        }

        .profile-page .profile-header .cover .cover-body .profile-pic {
            border-radius: 50%;
            width: 100px;
        }

        @media (max-width: 767px) {
            .profile-page .profile-header .cover .cover-body .profile-pic {
                width: 70px;
            }
        }

        .profile-page .profile-header .cover .cover-body .profile-name {
            font-size: 20px;
            font-weight: 600;
            margin-left: 17px;
        }

        .profile-page .profile-header .header-links {
            padding: 15px;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            background: #fff;
            border-radius: 0 0 .25rem .25rem;
        }

        .profile-page .profile-header .header-links ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .profile-page .profile-header .header-links ul li a {
            color: #000;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
            text-decoration: none;
        }

        .profile-page .profile-header .header-links ul li:hover,
        .profile-page .profile-header .header-links ul li.active {
            color: #727cf5;
        }

        .profile-page .profile-header .header-links ul li:hover a,
        .profile-page .profile-header .header-links ul li.active a {
            color: #727cf5;
        }

        .profile-page .profile-body .left-wrapper .social-links a {
            width: 30px;
            height: 30px;
        }

        .profile-page .profile-body .right-wrapper .latest-photos>.row {
            margin-right: 0;
            margin-left: 0;
        }

        .profile-page .profile-body .right-wrapper .latest-photos>.row>div {
            padding-left: 3px;
            padding-right: 3px;
        }

        .profile-page .profile-body .right-wrapper .latest-photos>.row>div figure {
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            margin-bottom: 6px;
        }

        .profile-page .profile-body .right-wrapper .latest-photos>.row>div figure:hover {
            -webkit-transform: scale(1.06);
            transform: scale(1.06);
        }

        .profile-page .profile-body .right-wrapper .latest-photos>.row>div figure img {
            border-radius: .25rem;
        }

        .rtl .profile-page .profile-header .cover .cover-body .profile-name {
            margin-left: 0;
            margin-right: 17px;
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
</head>

<body>
    <div class="container">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header">
                        <div class="cover">
                            <div class="gray-shade"></div>
                            <figure>
                                <img src="img/<?php echo $row['cimage']; ?>" class="img-fluid" alt="profile cover">
                            </figure>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    <img class="profile-pic" src="img/<?php echo $row['image']; ?>" alt="profile">
                                    <span class="profile-name"><?php echo $row["username"]; ?></span>
                                </div>
                                <div class="d-none d-md-block">
                                    <a href="editprofile.php">
                                        <button class="btn btn-primary btn-icon-text btn-edit-profile">
                                            <img src="icons/edit.svg" class="me-2">Edit profile

                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Header Links -->
                        <div class="header-links">
                            <ul class="links d-flex align-items-center mt-3 mt-md-0">

                                <img src="icons/columns.svg" alt="Colums" class="me-2">
                                <li class="header-link-item  d-flex align-items-center">
                                    <a class="pt-1px d-none d-md-block" href="timeline.php">Timeline</a>
                                </li>

                                <li class="header-link-item ms-3 ps-3 border-start d-flex align-items-center">
                                    <img src="icons/users.svg" alt="Users" class="ms-2">
                                    <a class="pt-1px d-none d-md-block" href="#">Users</a>
                                </li>


                                <li class="header-link-item ms-3 ps-3 border-start d-flex align-items-center">
                                    <img src="icons/image.svg" alt="Image" class="me-2">
                                    <a class="pt-1px d-none d-md-block" href="#">Photos</a>
                                </li>

                                <li class="header-link-item ms-3 ps-3 border-start d-flex align-items-center">
                                    <img src="icons/user.svg" alt="User" class="me-2">
                                    <a class="pt-1px d-none d-md-block" href="#">About</a>
                                </li>

                                <li class="header-link-item ms-3 ps-3 border-start d-flex align-items-center">

                                    <img src="icons/settings.svg" alt="Settings" class="me-2">
                                    <a class="pt-1px d-none d-md-block" href="#">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Profile Body -->

            <div class="row profile-body">

                <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="card-title mb-0">Your Favoruriate</h6>
                                <!-- About Dropdown Menu -->
                                <div class="dropdown">
                                    <button class="btn" data-bs-toggle="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="icons/more-horizontal.svg" alt="">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <img src="icons/edit-2.svg" alt="Edit" class="me-2">
                                            <span class>Edit</span></a>

                                        <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                            <img src="icons/log-out.svg" alt="Logout" class="me-2">
                                            <span class>Logout</span></a>
                                    </div>
                                </div>
                            </div>

                            <!-- About Card Body -->

                            <div class="mt-3">
                                <img src="icons/makeup.svg" alt="" style="width:24px;">
                                <a href="#makeup" class="tx-11 font-weight-bold mb-0 text-uppercase text-decoration-none">MakeUp</a>
                            </div>

                            <div class="mt-3">
                                <img src="icons/hair.svg" alt="" style="width:24px;">
                                <a href="#hair" class="tx-11 font-weight-bold mb-0 text-uppercase text-decoration-none">Hair</a>
                            </div>

                            <div class="mt-3">
                                <img src="icons/body.svg" alt="" style="width:24px;">
                                <a href="#body" class="tx-11 font-weight-bold mb-0 text-uppercase text-decoration-none">Body</a>
                            </div>

                            <div class="mt-3">
                                <img src="icons/face.svg" alt="" style="width:24px;">
                                <a href="#face" class="tx-11 font-weight-bold mb-0 text-uppercase text-decoration-none">Face</a>
                            </div>

                        </div>
                    </div>
                </div>




                <!-- Posting Card One -->
 <div class="col-md-8 col-xl-9 middle-wrapper">
    <div class="row">
        <!-- Posting Area -->
            <div class="col-md-12 grid-margin">
                <div class="card rounded">
                    <div class="card-header">
                        <form action="" method="post" onsubmit="return validateForm()">
                            <div class="d-flex align-items-center justify-content-between">
                                                                                
                                <input type="text" class="form-control me-2" placeholder="Write your review..." name="post">
                                
                                <select  name = "reviews"  id = "reviews" class="form-select me-2" required>
                                    <option value= "">Reviews For ....</option>
                                    <option value = "makeup">Makeup</option>
                                    <option value = "hair">Hair</option>
                                    <option value = "body">Body</option>
                                    <option value = "face">Face</option>
                                </select>
                                <button class="btn btn-primary ps-2 pe-2 rounded" type="submit" value="post">
                                    Post
                                </button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Postin Area -->

        <!-- Posting Card-->
            <?php 
            
                if($posts)
                {
                    foreach($posts as $ROW) {

                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['userid']);
                        include("posting.php");
                    }
                }
            
            ?>
        <!-- Posting Card -->
                    </div>
                </div>


            </div>

        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
         function validateForm() {
            var selectBox = document.getElementById("reviews");
            var selectedValue = selectBox.value;

            if (selectedValue === "") {
                alert("Please select an item from the dropdown.");
                return false; // Prevent form submission
            }
        }
    </script>


</body>

</html>