<?php 
  include "header.php";
  error_reporting(0);

  $kişiSor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail ");
  $kişiSor->execute(array(
      'mail'=>$_SESSION['kullaniciEposta']
  ));
  $kişiÇek=$kişiSor->fetch(PDO::FETCH_ASSOC)


  
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
            <br>

            
		<form class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kişi Bilgileri</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_adsoyad']?>"  id="email" placeholder="Ad Soyad">
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_mail']?>" id="email" placeholder="Email">
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_tc']?>" id="email" placeholder="Tc">
						</div>
					</div>
                    <div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control"value="<?php echo $kişiÇek['kullanici_gsm']?>"  id="email" placeholder="Tel">
						</div>
					</div>
                    
				
					<button class="btn btn-default btn-success">Güncelle</button>
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Adres Bilgileri</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_adres']?>" id="address" placeholder="Adres">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_il']?>" id="city"  placeholder="İl">
						</div>
						
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" value="<?php echo $kişiÇek['kullanici_ilce']?>" id="country" placeholder="İlçe">
						</div>
						
					</div>
				</div>
			</div>
		</form>
			<br><br><br>
        
		</div>
		
		<div class="spacer">
		
      <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 
    </div>
	</div>



<?php include "footer.php" ?> 