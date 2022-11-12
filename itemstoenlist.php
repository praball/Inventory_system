<?php

@include 'config.php';

session_start();


if (isset($_POST['submit'])) {

   if ($conn === false) {
      die("ERROR: Could not connect. "
         . mysqli_connect_error());
   }
   $suppliername = mysqli_real_escape_string($conn, $_POST['suppliername']);
   $itemname = mysqli_real_escape_string($conn, $_POST['itemname']);
   $itemnumber = $_POST['itemnumber'];
   $price = $_POST['price'];
   $imagesrc = mysqli_real_escape_string($conn, $_POST['imagesrc']);

   $insert = "INSERT INTO supplier_form(suppliername, itemname, itemnumber, price, image_src) VALUES('$suppliername','$itemname','$itemnumber','$price','$imagesrc')";
   mysqli_query($conn, $insert);

   $insert1 = "INSERT INTO products(name, price, quantity, supplier_name) VALUES('$itemname','$price','$itemnumber','$suppliername')";
   mysqli_query($conn, $insert1);
   header('location:admin_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Supplier page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<!--   <link rel="stylesheet" href="footer.css">-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Inventorily</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="admin_page.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['admin_name'] ?></a>
            </li>
         </ul>
         <a href="logout.php" button type="button" class="btn btn-outline-danger">Logout</a>

         <!-- "margin-left: 970px;" -->
      </div>
   </nav>


<br><hr><br>
   <div style="text-align:center;">
      <h2><b>Details for new items:</b></h2>
   </div><br>

   <form action="" method="post" onsubmit="myFunction()">
      <?php
      if (isset($error)) {
         foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         };
      };
      ?>
      <div class="form-group" style="margin-left: 400px; margin-right: 400px;">
         <label for="staticEmail" class="col-form-label">Name:</label>
         <input type="text" name="suppliername" readonly class="form-control" id="staticEmail" value="<?php echo $_SESSION['admin_name'] ?>">
      </div>

      <div class="form-group" style="margin-left: 400px; margin-right: 400px;">
         <label for="itemname">Item Name:</label>

         <input type="name" class="form-control" name="itemname" id="itemname" aria-describedby="emailHelp" placeholder="Name of item">
      </div>
      <div class="form-group" style="margin-left: 400px; margin-right: 400px;">
         <label for="numberitems">Number of items:</label>
         <input type="number" class="form-control" name="itemnumber" id="numberitems" placeholder="Item numbers">
      </div>
      <div class="form-group" style="margin-left: 400px; margin-right: 400px;">
         <label for="itemprice">Price of each item:</label>
         <input type="number" class="form-control" name="price" id="itemprice" placeholder="Price in $">
      </div>
      <div class="form-group" style="margin-left: 400px; margin-right: 400px;">
         <label for="imagesrc">URL of item image:</label>
         <input type="name" class="form-control" name="imagesrc" id="srcimage" placeholder="URL here">
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 400px;">Submit</button>
   </form>
   <br><br><br>


   <script>
      function myFunction() {
         alert("Your items were enlisted and will be confirmed shortly.");
      }
   </script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <!--<footer>
      <div class="footer-content">
         <h3>Inventorily</h3>
         <p>Inventorily is a online inventory handling and chain website which helps in connecting customers, suppliers and inventory handlers, providing better facilities and ease up all the processes in the long run.</p>

      </div><br>
      <div class="footer-bottom">
         <p>copyright &copy;2022<a href="#"> Prabal Pophaley</a> </p>
         <div class="footer-menu">
            <ul class="f-menu">
               <li><a href="">Home</a></li>
               <li><a href="">About</a></li>
               <li><a href="">Contact</a></li>
               <li><a href="">Blog</a></li>
            </ul>
         </div>
      </div>

   </footer> -->


</body>

</html>