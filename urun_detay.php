<?php 
  include "header.php";
  error_reporting(0);

  $urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:id");
  $urunsor->execute(array(
      'id'=>$_GET['urun_id']
  ));


  

?>


<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">ÜRÜN DETAY <br> </div>
                            <div class="title">Ürünleri İncele <br> </div>
						</div>
						<div class="col-md-3 col-md-offset-5">

					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
            <div class="title-bg">
               
                <?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){ ?>
					<div class="title"><?php echo $uruncek['urun_ad'] ?></div> 
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="dt-img">
							<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat'] ?>₺</div></div>
							<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="./nedmin/net\<?php echo $uruncek['urun_resim'] ?>" alt="" class="img-responsive"></a>
						</div>
					
					</div>
					<div class="col-md-6 det-desc">
						<div class="productdata">
							<div class="infospan">Model <span><?php echo $uruncek['urun_model'] ?></span></div>
							<div name="sepetid" class="infospan">Item no <span><?php echo $uruncek['urun_id'] ?></span></div>
							<div class="infospan">Marka <span><?php echo $uruncek['urun_marka'] ?></span></div>
                            <div class="infospan">Fiyat <span><?php echo $uruncek['urun_fiyat'] ?>₺</span></div>
							<h4>Mevcut Opsiyonlar</h4>
							
							<!-- <form class="form-horizontal ava" role="form"> -->
								<div class="form-group">
									<label for="mem" class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
									
									</div>
									<div class="clearfix"></div>
									<div class="dash"></div>
								</div>
								<div class="form-group">
									<label for="color" class="col-sm-2 control-label">Color</label>
									<div class="col-sm-10">
										<select class="form-control" id="color">
											<option>kırmızı
											<option>Mavi
											<option>siyah
											<option>Beyaz
											
										</select>
									</div>
									<div class="clearfix"></div>
									<div class="dash"></div>
								</div>
                
								<div class="form-group">
									<label for="qty" class="col-sm-2 control-label"> Adet</label>
									<div class="col-sm-4">
										<select class="form-control" id="qty">
											<option>1
											<option>2
											<option>3
											<option>4
											<option>5
										</select>
									</div>
									<div class="col-sm-4">
                                    <form action="./nedmin/net/islem.php" method="POST">
                                    <input type="hidden" name="sepet_detay_id" value="<?php echo $uruncek['urun_id'] ?>">
                                    <input type="hidden" name="sepet_detay_fiyat" value="<?php echo $uruncek['urun_fiyat'] ?>">
                                    <input type="hidden" name="sepet_detay_marka" value="<?php echo $uruncek['urun_marka'] ?>">
                                    <input type="hidden" name="sepet_detay_model" value="<?php echo $uruncek['urun_model'] ?>">
                                    <?php   
	                                    if(isset($_SESSION['kullaniciEposta'])){?>
										<button name="sepeteEkle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
                                    <?php } ?>    
                                    </form>
                                    </div>
									<div class="clearfix"></div>
								</div>
                            
							
							<div class="sharing">
								<div class="share-bt">
									<div class="addthis_toolbox addthis_default_style ">
										<a class="addthis_counter addthis_pill_style"></a>
									</div>
									<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
									<div class="clearfix"></div>
								</div>
								<div class="avatock"><span> Adet : <?php echo $uruncek['urun_adet'] ?></span></div>
							</div>
							
						</div>
					</div>
				</div>

				<div class="tab-review">
					<ul id="myTab" class="nav nav-tabs shop-tab">
						<li class="active"><a href="#desc" data-toggle="tab">ÜRÜN AÇIKLAMA</a> </li>
						<li class=""><a href="#rev" data-toggle="tab">ÜRÜN YORUM</a></li>
					</ul>
					<div id="myTabContent" class="tab-content shop-tab-ct">
						<div class="tab-pane fade active in" id="desc">
							<p>
                            <?php echo $uruncek['urun_aciklama'] ?>
							</p>
						</div>
						<div class="tab-pane fade" id="rev">
							<p class="dash">
							<span>Jhon Doe</span> (11/25/2012)<br><br>
							<?php echo $uruncek['urun_yorum'] ?>
							</p>
							<h4>Yorum Yaz</h4>
							<form role="form">
							<div class="form-group">
                                <label for="">başlık</label>
								<input type="text"  class="form-control" id="name">
							</div>
							<div class="form-group">
                            <label for="">yorum</label>
								<textarea class="form-control" id="text"></textarea>
							</div>
                            
						
							<button type="submit" class="btn btn-default btn-red btn-sm">Submit</button>
						</form>
							
						</div>
					</div>
				</div><?php } ?>
				
				<div id="title-bg">
					<div class="title"></div>
				</div>
				<?php include "yeni_urun.php" ?>
				<div class="spacer"></div>
        
   
  
            
        


		</div>
		<div class="spacer">

      <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 
    </div>
	</div>



<?php include "footer.php" ?> 