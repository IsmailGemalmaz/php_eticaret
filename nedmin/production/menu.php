<?php 

include "header.php";
error_reporting(0);

$menusor=$db->prepare("SELECT * from menu");
$menucek=$menusor->execute();
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Menü Listeleme <small>,

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
               <a href="menu-ekle.php"> <button class="btn btn-success btn-xs">Yeni Ekle</button></a>
             </div>  
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Üst menü</th>
                  <th> adı</th>
                  <th> detay</th>
                  <th> url</th>
                  <th> sıra</th>
                  <th> durum</th>
                  
                  <th>İşlem</th>
                  <th>İşlem</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $menucek['menu_ust'] ?></td>
                  <td><?php echo $menucek['menu_ad'] ?></td>
                  <td><?php echo $menucek['menu_detay'] ?></td>
                  <td><?php echo $menucek['menu_url'] ?></td>
                  <td><?php echo $menucek['menu_sira'] ?></td>
                  <td>
                        <?php 
                            if($menucek['menu_durum']==1){?>
                                <button class="btn btn-success btn-xs">AKTİF</button>
                            <?php } else{ ?>
                                 <button class="btn btn-danger btn-xs">PASİF</button>
                           <?php }?>

                      
                  
                  </td>
                 
                  <td><center> <a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../net/islem.php?menu_id=<?php echo $menucek['menu_id']?>&menusil=ok"><button  class="btn btn-danger btn-xs">Sil</button></a></center></td>
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


