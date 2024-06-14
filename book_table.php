<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
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
    <link href="css/style.css" rel="stylesheet"> </head>

<body>

        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/hentian-logo.jpeg" alt="" width="155" height="45"> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Laman Utama <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Pesan Makanan <span class="sr-only"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="book_table.php">Tempah Meja <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Log Masuk</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Daftar</a> </li>';
							}
						else
							{
									
                                echo  '<li class="nav-item"><a href="checkout.php" class="nav-link active">Troli Anda</a> </li>';
                                echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Pesanan Anda</a> </li>';
                                echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Log Keluar</a> </li>';
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
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Pilih Meja</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Tempah Meja</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Pesan dan Bayar</a></li>
                    </ul>
                </div>
            </div>
            <div class="inner-page-hero bg-image" data-image-src="images/img/bg-main-2.jpg">
                <div class="container"> </div>
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">     
                    </div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php 
$ress = mysqli_query($db, "SELECT * FROM available_tables");
while ($rows = mysqli_fetch_array($ress)) {
    echo '
    <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
        <div class="entry-logo">
            <a class="img-fluid" href="table.php?table_id=' . $rows['table_id'] . '"> 
                <img src="admin/Res_img/' . $rows['table_images'] . '" alt="Table logo">
            </a>
        </div>
        <!-- end:Logo -->
        <div class="entry-dscr">
            <h5><a href="table.php?table_id=' . $rows['table_id'] . '"> Meja ' . ucfirst($rows['table_type']) . '</a></h5> 
            <span>Kapasiti: ' . $rows['capacity'] . ' Orang</span><br>
            <span>' . $rows['description'] . '</span>
        </div>
        <!-- end:Entry description -->
    </div>
    
    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
        <div class="right-content bg-white">
            <div class="right-review">
                <a href="table.php?table_id=' . $rows['table_id'] . '" class="btn theme-btn-dash">Papar Kekosongan</a>
            </div>
        </div>
        <!-- end:right info -->
    </div>';
}
?>
                                </div>
                            </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <footer class="footer">
            <div class="container">
        <div class="bottom-footer">
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
                                    <h5>Telefon: 018-970 4909</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Maklumat Tambahan</h5>
                                   <p>Ikuti kami di sosial media @hentian.apiapi di Instagram dan Facebook</p>
                                </div>
                    </div>
                </div>
       
            </div>
        </footer>
        
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