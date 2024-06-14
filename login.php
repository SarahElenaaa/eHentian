<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>eHentian</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #ff3300;
	  }
	  </style>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
</head>

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
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<div style=" background-image: url('images/img/bg_main.jpg');">

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; 
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
   if(is_array($row)) 
								{ 
                  $_SESSION["user_id"] = $row['u_id']; 
                  header("refresh:1;url=index.php"); 
                } 
							else
							  {
                  $message = "Nama Pengguna dan Kata Laluan Tidak Sah!"; 
                }
	 }
}
?>
  

<div class="pen-title">
  <
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Log Masuk ke Akaun Anda</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Nama Pengguna"  name="username"/>
      <input type="password" placeholder="Kata Laluan" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Log Masuk" />
    </form>
  </div>
  
  <div class="cta">Tidak Berdaftar?<a href="registration.php" style="color:#f30;"> Daftar Akaun Sekarang</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   
  <div class="container-fluid pt-3">
	<p></p>
  </div>


   
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
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Alamat</h5>
                                    <p>Parit Hj. Zain, Kampung Api Api, 82100 Pontian, Johor</p>
                                    <h5>Telefon: +6018-970 4909</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Maklumat Tambahan</h5>
                                   <p>Ikuti kami di sosial media @hentian.apiapi di Instagram dan Facebook</p>
                                </div>
                    </div>
                </div>
            
            </div>
        </footer>
       


</body>

</html>
