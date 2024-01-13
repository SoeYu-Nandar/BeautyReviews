<!-- Log In -->
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

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if(isset($_POST['submit'])){
    $search = $_POST["search"];
    $result =mysqli_query($conn,"SELECT * FROM users where username='$search'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Admin Panel</title>

</head>

<body>
    <!-- side navbar -->
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-light pe-3">
                <h1 class="h4 py-3 text-center text-primary">
                    <img src="icons/user-solid.svg" alt="Colums" width="30px" height="30px">
                    <span class="d-none d-lg-inline">
                        ADMIN
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-home"></i>
                        <span class="d-none d-lg-inline">Dashboard</span>
                    </a>
                    <a href="register.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-user"></i>
                        <span class="d-none d-lg-inline">Add New User</span>
                    </a>

                    <a href="reportinfo.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-edit"></i>
                        <span class="d-none d-lg-inline">Report Information</span>
                    </a>

                    <!-- <a href="adminprofile.php" class="list-group-item list-group-item-action">
                        <i class="fas fa-user-circle"></i>
                        <span class="d-none d-lg-inline">Admin Profile</span>
                    </a> -->

                    <a href="logout.php" class="list-group-item list-group-item-action">
                    <img src="icons/log-out.svg" alt="Logout">
                        <span class="d-none d-lg-inline">Logout</span>
                    </a>


                </div>

            </nav>
            <!-- upper navbar -->
            <main class="col-10 bg-secondary-subtle">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill">
                        
                    </div>
                    <div class="navbar nav">
                    <form method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Username" name="search">
                                <button class="btn btn-outline-secondary" type="submit" name="submit"><img src="icons/searching.jpg" alt="Colums" width="30px" height="30px"></button>
                            </div>
                        </form>
                        <!-- <li class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="adminprofile.php" class="dropdown-item">Admin Profile</a>
                                </li>
                                <li>
                                    <a href="adminlogin.php" class="dropdown-item">Logout</a>
                                </li>
                            </ul>
                        </li> -->
                         <!-- <li class="nav-item">
                            <a href="adminedit.php" class="nav-link"><i class="fas fa-cog"></i></a>
                        </li>  -->


                    </div>
                </nav>

                <!-- Table section -->
                <div class="mt-1 flex-column flex-lg-row text-center">
                    <div class="col">
                        <h2 class=" h3 text-info">User Management Table</h2>
                        <?php
                        if ($result->num_rows > 0) {
                            $activeuser = 0;
                            $inactiveuser = 0;
                            $blockuser = 0;


                            echo '<table class = "table">';
                            echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Action</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";

                                echo '<td>';
                                //suspended user
                                if ($row["suspended"] == 0) {

                                    echo '<a class="btn btn-sm btn-success m-2" href="status.php?id=' . $row['id'] . '&suspended=1">Active</a>';
                                    $activeuser++;
                                } else {
                                    $inactiveuser++;
                                    echo '<a class="btn btn-sm btn-warning m-2" href="status.php?id=' . $row['id'] . '&suspended=0">Suspend</a>';
                                }
                                //block user
                                if ($row["status"] == 0) {

                                    echo '<a class="btn btn-sm btn-info m-2" href="blockuser.php?id=' . $row['id'] . '&status=1">Unblock</a>';
                                } else {
                                    $blockuser++;
                                    echo '<a class="btn btn-sm btn-danger m-2" href="blockuser.php?id=' . $row['id'] . '&status=0">Block</a>';
                                }


                                echo '</td>';

                                echo '</tr>';
                            }
                            echo "</table>";
                        } else {
                            echo "No records found";
                        }
                        ?>




                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- card item -->
    <div class="container-fluid mt-3 p-4">
        <div class="row flex-column flex-lg-row">
            <div class="col">
                <div class="card mb-3 bg-success text-white">
                    <div class="card-body">
                        <h3 class="card-title h2"><?php echo $activeuser; ?></h3>
                        <img src="icons/users-arrow-down-profile-avatar-user.svg" alt="Colums" width="30px" height="30px">
                        <span class="text-white">Active Users</span>

                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card mb-3 bg-warning text-white">
                    <div class="card-body">
                        <h3 class="card-title h2"><?php echo $inactiveuser; ?></h3>
                        <img src="icons/suspendedicon.png" alt="Colums" width="30px" height="30px">
                        <span class="text-white">Suspended Users</span>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-3 bg-danger text-white">
                    <div class="card-body">
                        <h3 class="card-title h2"><?php echo $blockuser; ?></h3>
                        <img src="icons/blockicon.png" alt="Colums" width="30px" height="30px">
                        <span class="text-white">Blocked Users</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <footer class="text-center py-4 text-muted bg-light">
        &copy; Copyright 2023
    </footer>

</body>

</html>