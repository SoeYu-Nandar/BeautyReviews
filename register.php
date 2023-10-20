<?php 
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Registration Form</title>

</head>


<body class="bgcolor">
<header>
  <img src="img/beautyicon.png" alt="Beautyicon" width="80px" height="80px">
  <h1 class="fw-bold my-8">Beauty Reviews</h1>
</header>

  <form class="needs-validation" novalidate method="post">
    <p class="title">REGISTER FORM</p>
    
    <input name = "first_name" type="text" class="form-control mb-4" placeholder="First Name" required>
  
      <input name = "last_name" type="text" class="form-control mb-4" id="validationCustom02" placeholder="Last Name" required>
  
      <select  name = "gender" class="form-select mb-4"required>
        <option selected disabled value="">Gender</option>
        <option>Male</option>
        <option>Female</option>
      </select>
      <div class="invalid-feedback">
        Please select a valid state.
      </div>
    
  <input name = "email" type="text" class="form-control mb-4" placeholder="Email" required>
    
  <input name = "password" type="password" class="form-control mb-4" placeholder="Password" required>
    
  <input name = "password2" type="password" class="form-control mb-4" placeholder="Retype Password" required>
    

    <div class="form-check">
      <input class="form-check-input-lg" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and policy
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>

      

    <button class="btn btn-primary" type="submit">Submit form</button>
    <button class="btn btn-secondary">Cancel</button>
  </form>




</body>

</html>