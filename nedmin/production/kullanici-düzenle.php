<?php 
    include "header.php"; 
    error_reporting(0);

    $kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
    $kullanicicek=$kullanicisor->execute(array(
      'id'=>$_GET['kullanici_id']
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
?>

  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Düzenle <small>

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


                    <form method="POST" action="../net/islem.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Tarih 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" disabled="" id="first-name" required="required" name="kullanici_zaman" value="<?php echo $kullanicicek['kullanici_zaman'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Tc 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Ad Soyad 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kullanici_adsoyad"  value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Mail
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="kullanici_mail" disabled="" value="<?php echo $kullanicicek['kullanici_mail'] ?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="kullanici_durum" id="heard" required="">


                                <?php  echo $kullanicicek['kullanici_durum']=='1' ? 'selected="" ':'' ?>

                                <option value="1" <?php $kullanicicek['kullanici_durum']=='1' ? 'selected=""':'' ?> >Aktif</option>

                                <option value="0" <?php if($kullanicicek['kullanici_durum']==0) {echo'selected=""';}  ?> >Pasif</option>
                                
                               
                        </select>
                        </div>
                      </div>
                    
                      <input type="hidden" name=kullanici_id value="<?php echo $kullanicicek['kullanici_id'] ?>">
                    
                        
                   
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button  type="submit" name="kullanicidüzenle" class="btn btn-success">Güncelle</button>
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






