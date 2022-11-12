<?php

@include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'user already exist!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'password not matched!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylesheet.css">

   <!--<link rel="sytlesheet" href="/css/style.css">-->

</head>

<body>


   <div class="form-bg">
      <div class="form-container">
         <div class="row">
            <div class="col-md-offset-3 col-md-6">
               <form class="form-horizontal" action="" method="post">

                  <?php
                  if (isset($error)) {
                     foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                     };
                  };
                  ?>
                  <span class="heading">Welcome to <img src="Screenshot (58).png" alt="" width=" 70%"></span>
                  <h3>Register Here</h3>
                  <div class="form-group">
                     <input type="text" class="form-control" name="name" id="inputName3" required placeholder="Your Name">
                     <i class="fa fa-user"></i>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email" class="form-control" id="inputEmail3" required placeholder="Your Email">
                     <i class="fa-solid fa-envelope"></i>
                  </div>
                  <div class="form-group help">
                     <input type="password" name="password" class="form-control" id="inputPassword3" required placeholder="Enter Password">
                     <i class="fa fa-lock"></i>
                  </div>
                  <div class="form-group help">
                     <input type="password" name="cpassword" class="form-control" id="inputPassword2" required placeholder="Re-enter Password">
                     <i class="fa-solid fa-square-check"></i>
                  </div>
                  <div class="form-group box">
                     <span> Register As: </span>
                     <select name="user_type">
                        <option value="user">Customer</option>
                        <option value="admin">Supplier</option>
                        <option value="manager">Inventory Handler</option>
                        <option value="delivery">Delivery Agent</option>
                        <option value="agent">Delivery Agent</option>
                     </select>
                  </div>

                  <div class="social-login">
                     <input type="submit" name="submit" value="register now" class="form-btn btn btn-default">
                     <p><br>Already Registered?<br> <a href="login_form.php">Login Here!</a></p>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!--<div class="form-container">

         <form action="" method="post">
            <h3>register now</h3>
            <?php
            if (isset($error)) {
               foreach ($error as $error) {
                  echo '<span class="error-msg">' . $error . '</span>';
               };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
               <option value="user">Customer</option>
               <option value="admin">Supplier</option>
               <option value="manager">Inventory Handler</option>
               <option value="delivery">Delivery Agent</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login now</a></p>
         </form>

      </div>-->

      <script src="https://kit.fontawesome.com/fcc5188dd3.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>

</html>