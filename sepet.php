<?php 
  include "header.php";
  error_reporting(0);


  $sepetsor=$db->prepare("SELECT * FROM sepet");
  $sepetsor->execute();


?>



<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">Sepetim </div>
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
         

           
		<div class="table-responsive">
			<table class="table table-bordered chart">
				<thead>
					<tr>
						<th>Sil</th>
						<th>Image</th>
						<th>Ürün Ad</th>
						<th>Model</th>
						<th>Ürün id</th>
						<th> Fiyat</th>
						
					</tr>
				</thead>
			
				<?php while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){ 
						if($_SESSION['kullaniciEposta'] == $sepetcek['kullanici_mail']) {
					  $topfiayt+=$sepetcek['sepet_fiyat'];
					?>
				<tbody>
					<tr>
						<td><a href="./nedmin/net/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']?>&sepetsil=ok"><i class="fa fa-times-circle fa-2x"></i></a></td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $sepetcek['sepet_urun'] ?></td>
						<td><?php echo $sepetcek['sepet_model'] ?></td>
						<td><?php echo $sepetcek['sepet_urunkod'] ?></td>
						
						<td><?php echo $sepetcek['sepet_fiyat'] ?>₺</td>
					
					</tr> <?php } } ?>  
				
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">
			
			</div>
			<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">
				<div class="subtotal">
					<!-- <p>Sub Total : $26.00</p> -->
				
					
				</div>
				<div class="total">Total : <span class="bigprice"><?php echo $topfiayt ?>₺	</span></div>
				<a href="" class="btn btn-default btn-red btn-sm">Alışverişi Tamamla</a>
				<a href="" class="btn btn-default btn-red btn-sm">Güncelle</a>
				<div class="clearfix"></div>
				<a href="urunler.php" class="btn btn-default btn-yellow">AlışVerişe Geri Dön</a>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>

            
        


		</div>
		<div class="spacer">

      <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?>  
    </div>
	</div>


<?php include "footer.php" ?> 