<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['delivery_name'])) {
    header('location:login_form.php');
}

if (isset($_POST['submit'])) {
    header('location:delivered.php');
}

$sql = " SELECT itemname, price, itemnumber FROM supplier_form ";
$result = $conn->query($sql);


$sql2 = " SELECT order_id, cust_name, itemname, price, quantity, Total FROM order_details";
$result2 = $conn->query($sql2);


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
    <title>Delivery Agent</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="stylescart.css">
    <link rel="stylesheet" href="items_for_cust.css">
    <!-- <link rel="stylesheet" href="footer.css" media="screen"> -->

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
                    <a class="nav-link" href="delivery_page.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['delivery_name'] ?></a>
                </li>
            </ul>
            <a href="logout.php" button type="button" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>

    <br><br>
    <hr><br>



    <h2 style="text-align: center;"><b>Details of deliverable assigned orders:</b></h2>
    <br><br>

    <div class="container1"><br>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1"><b>Order ID</b></div>
                <div class="col col-2"><b>Customer Name</b></div>
                <div class="col col-3"><b>Product Quantity</b></div>
                <div class="col col-4"><b>Total Bill in &dollar;</b></div>
                <div class="col col-5"><b>Item Delivered Confirmation</b></div>
            </li>


            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result2->fetch_assoc()) {
            ?>

                <li class="table-row">
                    <div class="col col-1">
                        <?php echo $rows['order_id'];?>
                    </div>
                    <div class="col col-2">
                        <?php echo $rows['cust_name'] ?>
                    </div>
                    <div class="col col-3">
                        <?php echo $rows['quantity'] ?>
                    </div>
                    <div class="col col-4">
                        <?php echo $rows['Total'] ?>
                    </div>
                    <div class="col col-5">
                        <a class="btn btn-outline-danger" onclick="deleteconfirm()" href="delivered.php?id=<?php echo $rows['order_id']; ?>">
                            Delivered!
                        </a>
                    </div>
                </li>

            <?php } ?>
        </ul>

    </div>



    <br><br>
    <hr><br>



    <!-- java script -->
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function deleteconfirm() {
            confirm("You confirm to have delivered the product?");
        }
    </script>


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

    </footer>
    -->

</body>

</html>