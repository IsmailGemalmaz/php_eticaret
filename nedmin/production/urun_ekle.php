<?php
    include "header.php";
    error_reporting(0);

    $urunsor=$db->prepare("SELECT * from urunler where urun_id=:id");
    $uruncek=$urunsor->execute(array(
        'id' => $_GET['urun_id']
    ));
    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>



 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Ekle <small>

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
                          <input type="text" id="first-name" required="required" name="urun_ad"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_ad']; }?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Marka
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="urun_marka"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_marka']; }?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Model
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="urun_model"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_model']; }?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Katagori
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_katagori']; }?>"  name="urun_katagori_ad" id="color">
										        	<option>telefon
										        	<option>tablet
											        <option>bilgisayar
											        <option>beyazesya
                              <option>diger

								    		</select>
                          <!-- <input type="text" id="first-name" required="required" name="urun_katagori_ad"   class="form-control col-md-7 col-xs-12"> -->
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">fiyat
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_fiyat']; }?>"  name="urun_fiyat"    class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">indirim varmı
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="urun_indirim"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_indirim']; }?>"  id="color">
										        	<option>1
										        	<option>0 
											       

								    		</select>
                          <!-- <input type
                          <!-- <input type="text" id="first-name" required="required" name="urun_indirim"  class="form-control col-md-7 col-xs-12"> -->
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">indirim fiyat
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="urun_indirim_fiyat"   value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_indirim_fiyat']; }?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">açıklama
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="urun_aciklama"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_aciklama']; }?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">adet
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="urun_adet"  value="<?php if($_GET['urun_duzenle']=="ok"){ echo $uruncek['urun_adet']; }?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    

                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?php if($_GET['urun_duzenle']=="ok"){ ?> 
                        <button  type="submit" name="urunGuncelle" class="btn btn-primary"> Güncelle</button> 
                        <?php } else{ ?>
                          <button  type="submit" name="urunkaydet" class="btn btn-success"> Kaydet</button>
                          <?php } ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>



           </div>
        </div>




       


<?php include "footer.php" ?>