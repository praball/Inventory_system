<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

$sql = " SELECT itemname, price, itemnumber, image_src FROM supplier_form ";
$result = $conn->query($sql);
/*
if (isset($_POST['submit'])) {

   
$itemname = mysqli_real_escape_string($conn, $_POST['itemname']);

$select = "SELECT * FROM supplier_form WHERE itemname = '$itemname'";

$resulz = mysqli_query($conn, $select);


   $row = mysqli_fetch_array($resulz);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = md5($_POST['price']);
   $_SESSION['product_name1'] = $row['itemname'];
   header('location:product.php');

}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Customer page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   <!-- css -->
   <link rel="stylesheet" href="items_for_cust.css">
   <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
   
   <style>
      section {
         display: flex;
         align-content: space-around;
         justify-content: space-around;
         align-items: center;
         flex-wrap: wrap;
      }

      .product-card {
         margin: 15px 10px;
         padding: 5px;
      }
   </style>

</head>

<body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 1000;">
      <a class="navbar-brand">Inventorily</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="user_page.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="history.php">View Order History <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['user_name'] ?></a>
            </li>
         </ul>
         <a href="logout.php" button type="button" class="btn btn-outline-danger">Logout</a>
      </div>
   </nav>

   <div class="container">

      <div class="content">
         <h3>Hi <span>customer!</span></h3>
         <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      </div>
   </div>

   <h2 style="text-align: center;">Buy items:</h2>
   <br><br>


   <section class="products">

      <!-- PHP CODE TO FETCH DATA FROM ROWS -->
      <?php
      // LOOP TILL END OF DATA
      while ($rows = $result->fetch_assoc()) {
      ?>
         <section>

            <!-- It's likely you'll need to link the card somewhere. You could add a button in the info, link the titles, or even wrap the entire card in an <a href="..."> -->

            <div class="product-card">
               <div class="product-image">
                  <img src="<?php echo $rows['image_src'] ?>" width="200px">
               </div>
               <div class="product-info">
                  <form action="product.php" method="get">
                     <h5><input type="text" readonly name="name" value="<?php echo $rows['itemname']; ?>"></h5>
                     Price ($): <h6><input type="text" name="price" value="<?php echo $rows['price']; ?>" readonly></h6>
                     <input type="hidden" name="quantity" value="<?php echo $rows['itemnumber']; ?>">
                     <input type="submit" name="submit" value="Click Here!" class="form-btn" style="border-radius: 4px; border-color: white;">
                  </form>
               </div>
            </div>

            <!-- more products -->

         </section>

      <?php
      }
      ?>

   </section>

   <br>
   <hr>
   <br>







   <!-- java script -->
   <script src="app.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--
   <footer>
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

   </footer>
   -->

</body>

</html>