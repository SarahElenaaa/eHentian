<!DOCTYPE html>
<html lang="en">
<?php
include ("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert()
{


    echo "<script>alert('Terima kasih! Pesanan anda berjaya diterima!');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {

            $SQL = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";

            mysqli_query($db, $SQL);


            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Thankyou! Your Order Placed successfully!";

            function_alert();



        }
    }
    ?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>eHentian</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <div class="site-wrapper">
            <header id="header" class="header-scroll top-header headrom">
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                            data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/hentian-logo.jpeg"
                                alt="" width="155" height="45"> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"> <a class="nav-link active" href="index.php">Laman Utama <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Pesan Makanan <span class="sr-only"></span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="book_table.php">Tempah Meja <span class="sr-only"></span></a> </li>

                                <?php
                                if (empty($_SESSION["user_id"])) {
                                    echo '<li class="nav-item"><a href="login.php" class="nav-link active">Log Masuk</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Daftar</a> </li>';
                                } else {

                                    echo '<li class="nav-item"><a href="checkout.php" class="nav-link active">Troli Anda</a> </li>';
                                    echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Pesanan Anda</a> </li>';
                                    echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Log Keluar</a> </li>';
                                }

                                ?>

                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="page-wrapper">
                <div class="top-links">
                    <div class="container">
                        <ul class="row links">

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Pilih
                                    Kategori</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pilih Makanan Anda</a></li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Pesan dan
                                    Bayar</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>




                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                <h4>Butiran Pesanan:</h4>
</div>
<div class="cart-totals-fields">
    <table class="table">
        <tbody>
        <?php 
        foreach ($cart_items as $item) {
            ?>
            <tr>
                <td><?php echo $item["title"]; ?></td>
                <td>
                    <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&d_id=<?php echo $item['d_id']; ?>">
                        <?php echo "RM".$item["price"]; ?>
                    </a>
                </td>
                <td>
                    <div class="form-group row no-gutter">
                        <div class="col-xs-8">
                            <input type="text" class="form-control b-r-0" value="<?php echo "RM".$item["price"]; ?>" readonly id="exampleSelect1">
                        </div>
                        <div class="col-xs-4">
                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> 
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td>Jumlah Harga Pesanan</td>
            <td><?php echo "RM".$item_total; ?></td>
        </tr>
        <tr>
            <td>Caj Servis & Cukai</td>
            <td>Percuma</td>
        </tr>
        <tr>
            <td class="text-color"><strong>Jumlah Harga</strong></td>
            <td class="text-color"><strong><?php echo "RM".$item_total; ?></strong></td>
        </tr>
        </tbody>
    </table>
</div>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Wang Tunai di Kaunter</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <a href="../simple-payment/index.html"></a><input name="mod"  type="radio" value="paypal" enabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Pemindahan Atas Talian<img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Adakah Anda Pasti Untuk Teruskan?');" name="submit"  class="btn btn-outline-success btn-block" value="Pesan Sekarang"> </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>

        <footer class="footer">
            <div class="row bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Pilihan Pembayaran</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Alamat</h5>
                            <p>Parit Hj. Zain, Kampung Api Api, 82100 Pontian, Johor</p>
                            <h5>Telefon: 018-970 4909</a></h5>
                        </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Maklumat Tambahan</h5>
                            <p>Ikuti kami di sosial media @hentian.apiapi di Instagram dan Facebook</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </footer>
        </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </body>

    </html>

    <?php
}
?>