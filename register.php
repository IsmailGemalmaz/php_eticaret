<?php 
     include "header.php" ;
    error_reporting(0);	

?>

<head>
<link rel="stylesheet" href="register.css">
</head>

<div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
         
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h1 class="card-title text-center">KAYDOL</h1><br><br>

            <form class="form-signin" method="POST" action="./nedmin/net/islem.php">
              <div class="form-label-group">
                <input type="text" name="kullanici_adsoyad" id="inputUserame" class="form-control" placeholder="Adsoyad" required autofocus>
                
              </div>

              <div class="form-label-group">
                <input type="email" name="kullanici_mail" id="inputEmail" class="form-control" placeholder="Email " required>
                
              </div>
              
             

              <div class="form-label-group">
                <input type="password" name="kullanici_password" id="inputPassword" class="form-control" placeholder="Şifre" required>
                
              </div>
              <hr>
              <div class="form-label-group">
                <input type="text" name="kullanici_tc" id="inputConfirmPassword" class="form-control" placeholder="Tc" required>
              
              </div>


                
              <div class="form-label-group">
                <input type="text" name="kullanici_gsm" id="inputConfirmPassword" class="form-control" placeholder="Tel" required>
                
              </div>
              <hr>
              
              <div class="form-label-group">
                <input type="text" name="kullanici_il" id="inputConfirmPassword" class="form-control" placeholder="İl" required>
                
              </div>

              <div class="form-label-group">
                <input type="text" name="kullanici_ilce" id="inputConfirmPassword" class="form-control" placeholder="İlçe" required>
                
              </div>

              <div class="form-label-group">
                <input type="text" name="kullanici_adres" id="inputConfirmPassword" class="form-control" placeholder="Adres" required>
                
              </div>

              <hr>

            

              <button name="kullanici_kaydol" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
             
              <hr class="my-4">
             
            </form>
          
        </div>
      </div>
    </div>
  </div>



<?php include "footer.php" ?>