<?php 
  include "header.php";
  error_reporting(0);

  $ayarsor=$db->prepare("SELECT * FROM  ayar ");
  $ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


?>


<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">İLETİŞİME GEÇİN 7/24 HİZMET</div>
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
        
            <ul class="list-group">
                <li class="list-group-item">TEL  <hr><?php echo $ayarcek['ayar_tel']?> </li><br><br>
                <li class="list-group-item">GSM <hr> <?php echo $ayarcek['ayar_gsm']?> </li><br><br>
                 <li class="list-group-item">FAKS NUMARASI  <hr><?php echo $ayarcek['ayar_faks']?>  </li><br><br>
                 <li class="list-group-item">E POSTA  <hr><?php echo $ayarcek['ayar_mail']?>  </li><br><br>
                 <li class="list-group-item">İL  <hr><?php echo $ayarcek['ayar_il']?>   </li><br><br>
                 <li class="list-group-item">İLÇE   <hr><?php echo $ayarcek['ayar_ilce']?>  </li><br><br>
                 <li class="list-group-item">ADRES   <hr> <?php echo $ayarcek['ayar_adres']?>  </li><br><br>
                 <li class="list-group-item">FACEBOOK  <hr> <a href="http://<?php echo $ayarcek['ayar_facebook']?> "> FACEBBOK GİT</a>  </li><br><br>
                 <li class="list-group-item">GOOGLE  <hr><a href="http://<?php echo $ayarcek['ayar_google']?>  ">GOOGLE GİT</a> </li><br><br>
                 <li class="list-group-item">YOUTUBE   <hr> <a href="http://<?php echo $ayarcek['ayar_youtube']?>">YOUTUBE GİT</a>  </li><br><br>
                 <li class="list-group-item">TWİTTER  <hr> <a href="http://<?php echo $ayarcek['ayar_twitter']?> ">TWİTTER GİT</a>  </li><br><br>
                 <li class="list-group-item">MESAİ   <hr><?php echo $ayarcek['ayar_mesai']?>  </li><br><br>
            </ul>   


            
        


		</div>
		<div class="spacer">

      <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 
    </div>
	</div>




<?php include "footer.php" ?>   