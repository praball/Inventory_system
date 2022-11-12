<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}


if (isset($_POST['submit'])) {
    header('location:cart.php');
}

$nameo = $_GET['name'];
$priceo = $_GET['price'];
$qtt = $_GET['quantity'];


// $result2 = mysqli_query($conn, "SELECT quantity FROM products WHERE name = 'fvdkj' ");

// $row2 = $result2->fetch_assoc();

// while ($row2 = $result2->fetch_assoc()) {
//     echo $row2[0]."<br>";
// }


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
    <link rel="stylesheet" href="stylescart.css">
    <link rel="stylesheet" href="items_for_cust.css">
    <!-- <link rel="stylesheet" href="footer.css" media="screen"> -->
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




    <div class="product content-wrapper" style="position: relative;
	min-height: 100%;
	color: #555555;
	background-color: #FFFFFF;
	margin: 0;
	padding-bottom: 100px; /* Same height as footer */">
        <?php
        $product = $result->fetch_assoc()
        ?>

        <br>
        <h1 class="name"> Product: <a><br>
                <hr>
            </a>
            <ul><b style="color: white;"><?= $nameo ?></b></ul>
        </h1>
        <span style="margin-left:50px; text-align: center; font-size: 30px;" class="price"> Price:
            &dollar;<?= $priceo ?>
        </span>
        <a>
            <hr><br>
        </a>

        <form action="cart.php" method="get" style="margin-left: 580px;">
            <input hidden type="text" name="buyitem" value="<?php echo $nameo ?>" >
            <input hidden type="text" name="price1" value="<?php echo $priceo ?>" >
            <input type="number" name="qttitems" style="padding: 6px;" value="1" min="1" max="<?= $qtt ?>" placeholder="Quantity" required>
            <input type="submit" style="padding: 6px;" name="submit" value="Add To Cart" class="form-btn">
        </form>
    </div>


    <br>
    <hr>







    <!-- java script -->
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--    <footer>
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