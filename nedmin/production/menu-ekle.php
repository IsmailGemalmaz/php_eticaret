<?php 
    include "header.php"; 
    error_reporting(0);
?>

  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
           
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menü Düzenle <small>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Üst Menü
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  id="first-name" required="required" name="menu_ust"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü Ad
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_ad"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <script type="text/javascript">
                            CKEDITOR.replace( 'editor1', {
                                 extraPlugins: 'abbr'
                                       //askfhnlkasf
                            } );

                     </script>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü Detay
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="menu_detay" id="editor1" class="ckeditor"> </textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü Url
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_url"    class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü Sıra
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_sira"    class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="menu_durum" id="heard" required="">


                                <?php  echo $menucek['menu_durum']=='1' ? 'selected="" ':'' ?>

                                <option value="1" >Aktif</option>

                                <option value="0"  >Pasif</option>
                                
                               
                        </select>
                        </div>
                      </div>


                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Menü SeoUrl
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name"  name="menu_seourl"  value="<?php echo $menucek['menu_seourl'] ?>"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    
                      
                    
                        
                   
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button  type="submit" name="menuekle" class="btn btn-success">EKLE</button>
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






