<?php 
include './nedmin/net/baglan.php'

?>


<?php  
	

		$urunyenisor=$db->prepare("SELECT * FROM urunler  order by urun_tarih DESC ");
		$urunyenisor->execute(); ?>
	
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Yeni Eklenen Ürünler</div>
				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">
			<?php while($urunyenicek=$urunyenisor->fetch(PDO::FETCH_ASSOC)){ ?>
				<div class="item">
					<div class="productwrap">
						<div class="pr-img">
							
							<a href="urun_detay.php?urun_id=<?php echo $urunyenicek['urun_id'] ?>"><img src="./nedmin/net\<?php echo $urunyenicek['urun_resim'] ?>" width="200" height="200" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php if($urunyenicek['urun_indirim']=='1') {echo $urunyenicek['urun_fiyat']; echo $tl=₺;} ?> </span><?php if($urunyenicek['urun_indirim']=='1'){ echo $urunyenicek['urun_indirim_fiyat'];echo $tl=₺;}else{ echo $urunyenicek['urun_fiyat'];echo $tl=₺;} ?></span></div></div>
							
						</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $urunyenicek['urun_marka']; echo '  ' ; echo $urunyenicek['urun_model']; ?></a></span>
							<span class="smalldesc">id no :<?php echo $urunyenicek['urun_id'];?>  </span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	