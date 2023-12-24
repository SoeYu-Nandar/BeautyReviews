   <!-- Singnup -->
   <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beauty_reviews";

    //  User Registion  to the database
    if (isset($_POST['submit'])) {
      $username = $_POST["username"];
      $gender = $_POST["gender"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $password2 = $_POST["password2"];
      $img = $_FILES['img']['name'];
      $img1 = $_FILES['img1']['name'];


      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // Random User Id 
      class User
      {
        public function create_userid()
        {
          $length = rand(4, 19);
          $number = "";
          for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);

            $number = $number . $new_rand;
          }
          return $number;
        }
      }
      $user = new User();
      $userid = $user->create_userid();
      if($password == $password2){
      $sql = "INSERT INTO users (username,gender,email,password,image,cimage,date,userid)
   VALUES ('$username','$gender','$email','$password','$img','$img1',Now(),'$userid')";



      $uploadDir = "img/";
      move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $img);
      move_uploaded_file($_FILES['img1']['tmp_name'], $uploadDir . $img1);



      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successfully');</script>";
        header('Location: login.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    
  }else{
    echo "<script>alert('Retype password does not match your current password');</script>";
  }
}
    if (isset($_POST['cancel'])) {
      header('Location: register.php');
      die;
    }






    ?>








   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <link rel="stylesheet" href="style.css">  
     <script src="js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="css/bootstrap.min.css">     
     <title>Registration Form</title>
     <style>
      .profile-pic {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        
      }
      .cover-pic {
        width: 115px;
        height: 115px;
        border-radius: 15px;
        
        
      }
      .title {
    
    margin-bottom: 2px;
    
}
      
        .fa-eye {
            position: absolute;
            top: 38%;
            right: 8%;
            cursor: pointer;
            color: lightgray;
        }
    </style>
     

   </head>


   <body class="bgcolor">
      <!-- <header> -->
       <!-- <img src="img/beautyicon.png" alt="Beautyicon" width="80px" height="80px">
        <h1 class="fw-bold my-8">Beauty Reviews</h1>
     </header>  -->

     <form method="post" action="" autocomplete="off" enctype="multipart/form-data">

       <p class="title">REGISTER FORM</p>

       <label for="img"><img class="profile-pic" src="img/" alt="profile" style="margin: 15px;">Profile Picture</label>
       <input name="img" type="file" id="img" class="form-control mb-2" placeholder="Change Profile" required style="display:none;visibility:hidden;">

       <input name="username" type="text" class="form-control mb-3" placeholder="User Name" required>
       <select name="gender" class="form-select mb-3" required id="gender">
         <option>Gender</option>
         <option>Male</option>
         <option>Female</option>
       </select>



       <input name="email" type="text" class="form-control mb-3" placeholder="Email" required>

       <input name="password" type="password" class="form-control mb-3" placeholder="Password" required id="passwordInput"><i class="far fa-eye" id="eye"></i>

       <input name="password2" type="password" class="form-control mb-3" placeholder="Retype Password" required>

       

       <label for="img1"><img class="cover-pic" src="img/ "alt="cover" style="margin: 10px;">Cover Picture</label>
       <input name="img1" type="file" id="img1" class="form-control mb-2" placeholder="Change Cover" required>


        <div class="form-check">
      <input name = "agree" class="form-check-input-lg" type="checkbox" value="" id="invalidCheck" required>


        <label class="form-check-label" for="invalidCheck">
        Agree to <a href="policy.php">Terms and Conditions</a>
      </label><br>  



        </div>
   
   

   
      <button class="btn btn-primary" type="submit" name="submit">Submit Form</button> 

        <button class="btn btn-secondary">Cancel</button>

       <a href="login.php">
         <p class="text-end">Login</p>
       </a>


       

     </form>
     <script type="text/javascript">



  // select form validation
  function validateForm() {
            var selectBox = document.getElementById("gender");
            var selectedValue = selectBox.value;

            if (selectedValue === "") {
                alert("Please select an item from the dropdown.");
                return false; // Prevent form submission
            }
        }
      //toggle eye
        var passwordInput = document.getElementById('passwordInput');
        var eye = document.getElementById('eye');
        showHidePassword = () => {
            if (passwordInput.type == 'password') {
                passwordInput.setAttribute('type', 'text');
                eye.classList.add('fa-eye-slash');
            } else {
                eye.classList.remove('fa-eye-slash');
                passwordInput.setAttribute('type', 'password');
            }
        };
        eye.addEventListener('click', showHidePassword);


        
   

    </script>

    


   </body>

   </html>