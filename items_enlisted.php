<?php

@include 'config.php';

session_start();

$suppname = $_SESSION['admin_name'];
// echo $suppname;
$sql = " SELECT sno, itemname, price, itemnumber FROM supplier_form WHERE suppliername = '$suppname'";
$result2 = $conn->query($sql);
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
    <title>Supplier page</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="table.css">
    <!--<link rel="stylesheet" href="footer.css" media="screen">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Inventorily</a>
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
            <a href="logout.php" button type="button" class="btn btn-outline-danger">logout</a>

            <!-- "margin-left: 970px;" -->
        </div>
    </nav>


    <br><br>
    <hr><br>



    <h2 style="text-align: center;"><b>Previously enlisted items:</b></h2>
    <br><br>


    <div class="container1"><br>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1"><b>Item ID</b></div>
                <div class="col col-2"><b>Item Name</b></div>
                <div class="col col-3"><b>Price of each item in &dollar;</b></div>
                <div class="col col-4"><b>Quantity</b></div>
            </li>

            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result2->fetch_assoc()) {
            ?>

                <li class="table-row">
                    <div class="col col-1">
                        <?php echo $rows['sno']; ?>
                    </div>
                    <div class="col col-2">
                        <?php echo $rows['itemname'] ?>
                    </div>
                    <div class="col col-3">
                        <?php echo $rows['price'] ?>
                    </div>
                    <div class="col col-4">
                        <?php echo $rows['itemnumber'] ?>
                    </div>
                </li>

            <?php } ?>
        </ul>

    </div>



    <br><br>
    <hr><br>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--   <footer>
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

   </footer>-->




</body>

</html>