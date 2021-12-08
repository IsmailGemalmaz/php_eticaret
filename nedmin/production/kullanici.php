<?php 

include "header.php";
error_reporting(0);

$kullanicisor=$db->prepare("SELECT * from kullanici");
$kullanicicek=$kullanicisor->execute();
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcı Listeleme <small>,

              <?php 

              if ($_GET['sil']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['sil']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
                       <div align="right">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </div>
                    </ul> 
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kayıt Tarih</th>
                  <th>Ad Soyad</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th>İşlem</th>
                  <th>İşlem</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $kullanicicek['kullanici_zaman'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_adsoyad'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
                  <td><?php echo $kullanicicek['kullanici_gsm'] ?></td>
                  <td><center> <a href="kullanici-düzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../net/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']?>&kullanicisil=ok"><button  class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->




<?php include "footer.php" ?>