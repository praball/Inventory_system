<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}


$iname = $_GET['buyitem'];
$price3 = $_GET['price1'];
$qtt = $_GET['qttitems'];

// $insert = "INSERT INTO order_details(cust_name, itemname, price, quantity, Total) VALUES('$user_name','$name2','$itemprice','$quantiti', $total2'')";
// mysqli_query($conn, $insert);
// header('location:login_form.php');

//echo $_SESSION['user_name'];

if (isset($_POST['submit'])) {

    $custname = mysqli_real_escape_string($conn, $_SESSION['user_name']);
    $name = mysqli_real_escape_string($conn, $_POST['name2']);
    $itemprice1 = mysqli_real_escape_string($conn, $_POST['itemprice']);
    $quantiti1 = mysqli_real_escape_string($conn, $_POST['quantiti']);
    $total3 = (int)$itemprice1 * (int)$quantiti1;

    $insert = "INSERT INTO order_details(cust_name, itemname, price, quantity, Total) VALUES('$custname','$name','$itemprice1','$quantiti1', '$total3')";
    mysqli_query($conn, $insert);
    header('location:user_page.php');
}


$sql = " SELECT name, price, quantity FROM products ";
$result = $conn->query($sql);
$conn->close();


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
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        tr:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
        }

        th:nth-child(even),
        td:nth-child(even) {
            background-color: rgba(150, 212, 212, 0.4);
        }
    </style>

    <link rel="stylesheet" href="stylescart.css">
    <link rel="stylesheet" href="items_for_cust.css">
    <!--<link rel="stylesheet" href="footer.css" media="screen">-->
    <link rel="stylesheet" href="style12.css">

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
                    <a class="nav-link" href="user_page.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION['user_name'] ?></a>
                </li>
            </ul>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>



<br>
    <div>
        <h1 style="background-color: black; color:aliceblue; padding:3px;"><u>Invoice:</u></h1>
        <form action="cart.php" method="post" onsubmit="myFunction()">
            <table>
                <thead>
                    <tr>
                        <td><strong>Product</strong></td>
                        <td><b>Price in &dollar;</b></td>
                        <td><b>Quantity</b></td>
                        <td><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post">
                        <td>
                            <a><input type="text" name="name2" value="<?= $iname ?>" readonly></a>
                        </td>
                        <td>
                            <a><input type="text" name="itemprice" value="<?= $price3 ?>" readonly></a>
                        </td>
                        <td>
                            <a><input type="text" name="quantiti" value="<?= $qtt ?>" readonly> </a>
                        </td>
                        <td>
                            <?php $total1 = (int)$price3 * (int)$qtt ?>
                            <input type="text" name="total2" value="&dollar; <?= $total1 ?>" readonly>
                        </td>
                        <br>
                </tbody>
            </table>
            <br><br>
            <hr><br>
    <a style="margin-left: 1160px; border: 2px black; background-color: black; color:aliceblue; padding:5px;"><b>Total Bill : &dollar; <?= $total1 ?></b></a><br>
    <a style="margin-left: 120px;">Delivered to:<br></a>
    <a style="margin-left: 120px; font-size: 21px"> -- <b><?php echo $_SESSION['user_name'] ?></b></a>
            <br><hr><br>
            <input type="submit" style="padding: 6px; margin-left: 700px ;" name="submit" value="Confirm Order!" class="form-btn">

        </form>
        </form>
    </div>




    <br>
    <hr>
    <!-- java script -->
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
        function myFunction() {
            alert("Your order was successfully placed!");
        }
    </script>
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