<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

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
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Pilih Kategori</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pilih Makanan Anda</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Pesan dan Bayar</a></li>
                        
                    </ul>
                </div>
            </div>
			<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  ?>
            <section class="inner-page-hero bg-image" data-image-src="images/img/bg-2.jpg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo">'; ?></figure>
                                </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                    <p><?php echo $rows['address']; ?></p>   
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </section>
            <div class="breadcrumb">
                <div class="container">
                   
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        
                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Troli Anda
                              </h3>
							  				  
							  
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
									
									
	<?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item)  
{
?>									
									
                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<i class="fa fa-trash pull-right"></i></a>
										</div>
										
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "RM".$item["price"]; ?> readonly id="exampleSelect1">
                                                   
                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>
                                        
									  </div>
									  
	<?php
$item_total += ($item["price"]*$item["quantity"]); 
}
?>								  
									  
									  
									  
                                    </div>
                                </div>
                               
                         
                             
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>Jumlah Harga</p>
                                        <h3 class="value"><strong><?php echo "RM".$item_total; ?></strong></h3>
                                        <?php
                                        if($item_total==0){
                                        ?>

                                        
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg disabled">Pesan Sekarang</a>

                                        <?php
                                        }
                                        else{   
                                        ?>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg active">Pesan Sekarang</a>
                                        <?php   
                                        }
                                        ?>

                                    </div>
                                </div>
								
						
								
								
                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                      
             
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              MENU MAKANAN <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
										{
						
													
													 
													 ?>
                                <div class="food-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?></a>
                                            </div>
                                
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                           
                                        </div>
                               
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> 
										<span class="price pull-left" >RM<?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Tambah ke Troli" />
										</div>
										</form>
                                    </div>
              
                                </div>
                
								
								<?php
									  }
									}
									
								?>
								
								
                              
                            </div>
             
                        </div>
            
                       
                    </div>
                    
                </div>
     
            </div>
        
            <footer class="footer">
                <div class="container">
           
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
                                    <h5>Telefon: 018-970 4909</a></h5> </div>
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
