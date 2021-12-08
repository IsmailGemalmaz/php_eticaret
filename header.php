  
<?php 
  session_start();
  ob_start();
  error_reporting(0);	
include 'nedmin/net/baglan.php';
require_once'nedmin/net/baglan.php';
include 'nedmin/production/fonksiyon.php';
//belirli veriyi çekme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id'=>1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


// $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
// $kullanicisor->execute(array(
//   'mail'=>$_SESSION['kullaniciEposta']
// ));

// $say=$kullanicisor->rowCount();

// $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

// if($say==0){
//   Header("Lacation:header.php?durum=izinsiz");
//   exit;
// }

$sepetsor=$db->prepare("SELECT * FROM sepet");
$sepetsor->execute();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $ayarcek['ayar_title'] ?></title>
	<meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
  	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
 	 <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
 	 <meta name="viewport" content="">

    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- CSS only -->


	
	
	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 main-logo">
					<a href="index.php"> <b>TEKNO</b><img src="images\logo.png" alt="logo" class="logo img-responsive"></a>
				</div>
				<div class="col-md-8">
					<div class="pushright">
						<div class="top">
					<?php	if(!isset($_SESSION['kullaniciEposta'])){?>

						<a href="#" id="reg" class="btn btn-default btn-dark">Oturum Aç<span>-- Veya --</span>Kayıt Ol</a>

					<!--small-nav --><?php } ?>
						
												
						
							<div class="regwrap">
								<div class="row">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">Login</div>
										</div>
										<form  method="POST" action="./nedmin/net/islem.php">
											<div class="form-group">
												<input type="text" name="kullaniciEposta" class="form-control" id="username" placeholder="eposta">
											</div>
											<div class="form-group">
												<input type="password" name="kullaniciSifre" class="form-control" id="password" placeholder="şifre">
											</div>
											<div class="form-group">
												<button name="kullaniciOturumAc" class="btn btn-default btn-red btn-sm">Oturum Aç</button>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Kaydol</div>
										</div>
										<p>
											Yeni kullanıcı? Bir hesap oluşturarak daha hızlı alışveriş yapabilir, bir siparişin durumu hakkında güncel bilgi sahibi olabilirsiniz ...
										</p>
										 <a href="register.php" class="btn btn-default btn-yellow">Şimdi Kaydol	</a>
									</div>
								</div>
							</div>
							
							<div class="srch-wrap">
								<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
							</div>
							<div class="srchwrap">
								<div class="row">
									<div class="col-md-12">
									
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label for="search" class="col-sm-2 control-label"></label>
												
												<div class="col-sm-10">
													<input type="text" class="form-control" id="search">
												</div>
												
											</div>
											
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
				
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
							<li><a href="index.php" class="active">Anasayfa</a><div class="curve"></div></li>
							
								
								<?php
									$menusor=$db->prepare("SELECT * from menu where menu_durum=:durum order by menu_sira ASC limit 5");
									$menucek=$menusor->execute(array(
										'durum'=>1
									));

									while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){?>
										<li><a href="
										
											<?php  
												if(!empty($menucek['menu_url'])){
													echo $menucek['menu_url'];
												}
											?>
										
										"><?php echo $menucek['menu_ad'] ?></a></li>
								<?php }?>
								
								
								
								
							</ul>
						</div>
					
					</div>
				
			
				
										
					
					<div class="col-md-2 machart">
					<?php 	if(isset($_SESSION['kullaniciEposta'])) { ?>	
					<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">MiniSepet</span>|<span class="allprice"></span></button>
						<div class="popcart">
							<table class="table table-condensed popcart-inner">
							<?php while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){ 
								if($_SESSION['kullaniciEposta'] == $sepetcek['kullanici_mail']) {
					  			$topfiyat+=$sepetcek['sepet_fiyat'];
								?>
								<tbody>
									<tr>
										<td>
										<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
										</td>
										<td><a href="product.htm"><?php echo $sepetcek['sepet_urun'] ?></a><br><span><?php echo $sepetcek['sepet_model'] ?></span></td>
										
										<td><?php echo $sepetcek['sepet_fiyat'] ?>₺</td>
										<td><a href="./nedmin/net/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']?>&sepetsil=ok"><i class="fa fa-times-circle fa-2x"></i></a></td>
									</tr>
									<?php } }?>
								</tbody>
							</table>
							<span class="sub-tot">Toplam Fiyat : <span><?php echo $topfiyat ?>₺</span> | <span></span>  </span>
							<br>
							<div class="btn-popcart">
								<a href="sepet.php" class="btn btn-default btn-red btn-sm">Sepete Git</a>
							</div>
							<div class="popcart-tot">
								<p>
									Total<br>
									<span><?php echo $topfiyat ?>₺</span>
								</p>
								
							</div>					
											
							<div class="clearfix"></div> 
							
						</div>  <?php  }?>	
					</div>
					
				</div>
			</div>
		</div>
	</div><!--end main-nav -->

<div class="container">
    <?php 
	if(isset($_SESSION['kullaniciEposta'])){?>

	
		<ul class="small-menu"><!--small-nav -->
			<li><a href="hesap_ayarları.php" class="myacc">Hesabım</a></li>
			<li><a href="sepet.php" class="myshop">Sepetim</a></li>
			<li><a href="logout.php" class="mycheck">Çıkış Yap</a></li>
		</ul><!--small-nav --><?php  } ?> </div>