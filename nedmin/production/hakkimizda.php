    <?php 
        include "header.php";
        error_reporting(0);

        //belirli veriyi çekme işlemi
        $hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
          $hakkimizdasor->execute(array(
            'id'=>0
          ));
        $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
    ?>
        
       
         

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hakkımızda  <small>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Başlık 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name=hakkimizda_baslik value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Video 
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required"  name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required"  name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                    
                     <script type="text/javascript">
                            CKEDITOR.replace( 'editor1', {
                                 extraPlugins: 'abbr'
                                       //askfhnlkasf
                            } );

                     </script>

                    <!-- CK editör başlangıç -->
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">İçerik
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea name="hakkimizda_icerik" id="editor1" class="ckeditor"><?php echo $hakkimizdacek['hakkimizda_icerik'] ?> </textarea>
                        
                        </div>
                      </div>
                    <!-- CK editör bitiş -->
                   
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button  type="submit" name="hakkimizdakaydet" class="btn btn-success">Güncelle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

         

           </div>
        </div>

          
         
        <!-- /page content -->

        <?php include "footer.php" ?>    