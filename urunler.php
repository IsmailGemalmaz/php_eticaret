<?php 
  include "header.php";
  error_reporting(0);

  

  if($_GET['telefon']=='ok'){
	$urunsor=$db->prepare("SELECT * FROM urunler where urun_katagori_ad=:katagori");
	$urunsor->execute(array(
		'katagori'=>'telefon'
	));
  }
  elseif($_GET['bilgisayar']=='ok'){
	$urunsor=$db->prepare("SELECT * FROM urunler where urun_katagori_ad=:katagori");
	$urunsor->execute(array(
		'katagori'=>'bilgisayar'
	));
  }
  elseif($_GET['tablet']=='ok'){
	$urunsor=$db->prepare("SELECT * FROM urunler where urun_katagori_ad=:katagori");
	$urunsor->execute(array(
		'katagori'=>'tablet'
	));
  }
  elseif($_GET['beyazesya']=='ok'){
	$urunsor=$db->prepare("SELECT * FROM urunler where urun_katagori_ad=:katagori");
	$urunsor->execute(array(
		'katagori'=>'beyazesya'
	));
  }
  elseif($_GET['diger']=='ok'){
	$urunsor=$db->prepare("SELECT * FROM urunler where urun_katagori_ad=:katagori");
	$urunsor->execute(array(
		'katagori'=>'diger'
	));
  }
  else{
	$urunsor=$db->prepare("SELECT * FROM urunler");
	$urunsor->execute();
  }




  

?>


<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">ÜRÜNLER <br> </div>
						</div>
						<div class="col-md-3 col-md-offset-5">

					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
            <br> <br> <br>

            <div class="row prdct"><!--Products-->
				<?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>
					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								
								<a href="urun_detay.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><img src="./nedmin/net\<?php echo $uruncek['urun_resim'] ?>" width="200" height="200"  alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php if($uruncek['urun_indirim']=='1') {echo $uruncek['urun_fiyat']; echo $tl=₺;} ?> </span><?php if($uruncek['urun_indirim']=='1'){ echo $uruncek['urun_indirim_fiyat'];echo $tl=₺;}else{ echo $uruncek['urun_fiyat'];echo $tl=₺;} ?></span></div></div>
							</div>
							<span class="smalltitle"><a href=""><?php echo $uruncek['urun_ad']?></a></span>
							<span class="smalldesc"> id no :<?php echo $uruncek['urun_id']?></span>
						</div>
						
					</div>
					<?php }?>
					
				</div><!--Products-->
			
        
		</div>
		
		<div class="spacer">
		
      <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 
    </div>
	</div>



<?php include "footer.php" ?> 