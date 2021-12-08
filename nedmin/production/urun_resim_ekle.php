<?php
    include "header.php";
    error_reporting(0);

    
    $resimSor=$db->prepare("SELECT * from urunler where urun_id=:id");
    $resimCek=$resimSor->execute(array(
      'id'=>$_GET['urun_id']
    ));
    $resimCek=$resimSor->fetch(PDO::FETCH_ASSOC);
?>



 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Resim Ekle <small>

                      <?php
                        if($_GET['durum']=="ok"){?>
                          <b style="color:green">İşlem Başarılı..</b>
                       <?php }elseif($_GET['durum']=="no") {?>
                         <b style="color:red">İşlem Başarısız..</b>
                       <?php }  ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                       <div align="right">
                       <a href="urunler.php"> <button class="btn btn-primary btn-xs ">Ürünlere Resim Ekle </button></a> 
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </div>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <form method="POST" action="../net/islem.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" >

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name"> ad
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name" required="required" name="urun_resim" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <input type="hidden" value="<?php echo $resimCek['urun_id'] ?>" name="urun_resim_id" >

                        <button  type="submit" name="urunResimEkle" class="btn btn-success">Resmi Ekle</button>


                    </form>
                  </div>
                </div>
              </div>
            </div>



           </div>
        </div>



<?php include "footer.php" ?>