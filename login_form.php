<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      } elseif ($row['user_type'] == 'manager') {

         $_SESSION['manager_name'] = $row['name'];
         header('location:manager_page.php');
      } elseif ($row['user_type'] == 'delivery') {

         $_SESSION['delivery_name'] = $row['name'];
         header('location:delivery_page.php');
      }
   } else {
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   <link rel="stylesheet" href="stylesheet.css">

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
                  <h3>Log in here:</h3><br>
                  <div class="form-group">
                     <input type="email" class="form-control" name="email" id="inputEmail3" required placeholder="Email">
                     <i class="fa fa-user"></i>
                  </div>
                  <div class="form-group help">
                     <input type="password" class="form-control" name="password" required id="inputPassword3" placeholder="Password">
                     <i class="fa fa-lock"></i>
                  </div>

                  <div class="social-login">
                     <input type="submit" name="submit" value=" Log In " class="form-btn btn btn-default">
                     <p style="text-align:center ;"><br>Don't have an account?<br> <a href="register_form.php"> Register now!</a></p>

                  </div>
               </form>
            </div>
         </div>
      </div>   
   </div>


   <script src="https://kit.fontawesome.com/fcc5188dd3.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>