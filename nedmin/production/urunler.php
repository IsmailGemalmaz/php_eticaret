<?php
    include "header.php";
    error_reporting(0);
    
$urunsor=$db->prepare("SELECT * from urunler");
$uruncek=$urunsor->execute();
?>




 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Ayarları <small>

                      <?php
                        if($_GET['durum']=="ok"){?>
                          <b style="color:green">İşlem Başarılı..</b>
                       <?php }elseif($_GET['durum']=="no") {?>
                         <b style="color:red">İşlem Başarısız..</b>
                       <?php }  ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                       <div align="right">
                     
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </div>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>sıra</th>
                  <th> İD</th>
                  <th>Tarih</th>
                  <th> Resim</th>
                  <th> Ad</th>
                  <th> Marka</th>
                  <th> Model</th>
                  <th> Fiyat</th>
                  <th>İndirim Fiyat</th>
                  <th> indirim Varmı</th>
                  <th> Resim Ekle</th>
                  <th> Düzenle</th>
                  <th> Sil</th>
                 
                 
                </tr>
              </thead>

              <tbody>

                <?php 
                $sira=0;
                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $sira++ ;?>


                <tr>
                  <td><?php echo $sira ?></td>
                  <td><?php echo $uruncek['urun_id'] ?></td>
                  <td><?php echo $uruncek['urun_tarih'] ?></td>
                  <td><?php echo $uruncek['urun_resim'] ?></td>
                  <td><?php echo $uruncek['urun_ad'] ?></td>
                  <td><?php echo $uruncek['urun_marka'] ?></td>
                  <td><?php echo $uruncek['urun_model'] ?></td>
                  <td><?php echo $uruncek['urun_fiyat'] ?></td>
                  <td><?php echo $uruncek['urun_indirim_fiyat'] ?></td>
              
                 
                 
                  <td>
                        <?php 
                            if($uruncek['urun_indirim']=='1'){?>
                                <button class="btn btn-success btn-xs">Var</button>
                            <?php } else{ ?>
                                 <button class="btn btn-dark btn-xs">Yok</button>
                           <?php }?>

                      
                  
                  </td>
                  <td><center> <a href="urun_resim_ekle.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-warning btn-xs">Resim Ekle</button></a></center></td>
                  <td><center> <a href="urun_ekle.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_duzenle=ok"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../net/islem.php?urun_id=<?php echo $uruncek['urun_id']?>&urunsil=ok"><button  class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>
                   
                  



                  </div>
                </div>
              </div>
            </div>



           </div>
        </div>



                      
<?php include "footer.php" ?>