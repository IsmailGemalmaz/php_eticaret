<?php 
include "header.php";
error_reporting(0);

$katagorisor=$db->prepare("SELECT * from urun_katagori");
$katagoricek=$katagorisor->execute();
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

                    <div align="right">
             </div>  
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>sıra</th>
                  <th>id</th>
                  <th>İsim</th>
                  <th>Açıkalama</th>
                  <th>İşlem</th>
                  <th>İşlem</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $sıra=0 ;
                while($katagoricek=$katagorisor->fetch(PDO::FETCH_ASSOC)) { $sıra++ ?>


                <tr>
                  <td><?php echo $sıra ?></td>
                  <td><?php echo $katagoricek['katagori_id'] ?></td>
                  <td><?php echo $katagoricek['katagori_ad'] ?></td>
                  <td><?php echo $katagoricek['katagori_aciklama'] ?></td>
                  <td><center> <a href="katagori_düzenle.php?katagori_id=<?php echo $katagoricek['katagori_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../net/islem.php?katagori_id=<?php echo $katagoricek['katagori_id']?>&katagorisil=ok"><button  class="btn btn-danger btn-xs">Sil</button></a></center></td>
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


 <?php include "footer.php" ?> 

