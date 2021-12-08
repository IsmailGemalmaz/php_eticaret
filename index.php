<?php
 include "header.php" ;
 session_start();
 ob_start();


 $urunsor=$db->prepare("SELECT * FROM urunler where urun_indirim=:indirim ");
 $urunsor->execute(array(
	 'indirim'=>'1'
 ));
?>

	


	<div class="container">
	
		<div class="clearfix"></div>
		<div class="lines"></div>
		<div class="main-slide">
		
			<div id="sync1" class="owl-carousel">
			<?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>
				<div class="item">
					<div class="slide-desc">
						<div class="inner">
							<h1><?php echo $uruncek['urun_ad'] ?></h1>
							<p>
							<?php echo $uruncek['urun_aciklama'] ?>
							</p>
						<a href="urun_detay.php?urun_id=<?php echo $uruncek['urun_id']?>"><button class="btn btn-default btn-red btn-lg">Ürün Detay</button></a>
						</div>
						<div class="inner">
							<div class="pro-pricetag big-deal">
								<div class="inner">
								
										<span class="oldprice"><?php echo $uruncek['urun_fiyat'] ?> ₺</span>
										<span><?php echo $uruncek['urun_indirim_fiyat']; ?><small>₺</small></span>
										<span class="ondeal">İndirim Fırsatı</span>
										
								</div>
							</div>
						</div>
					</div>
					<div class="slide-type-1">
						<img src="./nedmin/net\<?php echo $uruncek['urun_resim'] ?>" width="400" height="400" alt="" class="img-responsive">
					</div>
				</div>
				 <?php }?>
				</div>

		</div>
		
	</div>
<div class="f-widget featpro">
<br><br>

	<?php include "yeni_urun.php" ?><!--yeni ürünlerin listesi -->
	
	
	 

	<?php include "footer.php" ?>