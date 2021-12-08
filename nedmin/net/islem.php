<?php 
    ob_start();
    session_start();
    include "baglan.php";
    include "../production/fonksiyon.php";
    require_once"baglan.php";
    //admin girtiş 
        if(isset($_POST['admingiris'])){

            $kullanicimail= $_POST['kullanici_mail'];
           
            $kullanicipassword= $_POST['kullanici_password'];//md5 kullan

            $kullanicisor=$db->prepare("SELECT * From  kullanici where kullanici_mail=:mail and kullanici_password=:sifre and 
            kullanici_yetki=:yetki  ");
            $kullanicisor->execute(array(
                'mail' => $kullanicimail,
                'sifre' => $kullanicipassword,
                'yetki'=>5
                
            ));

            $say=$kullanicisor->rowCount();//veri tabanında böyle bir sıra varmı
           

           if($say==1 ){
                $_SESSION['kullanici_mail']=$kullanicimail;
                
                header("Location:../production/index.php?durum=ok");
                exit;
           }else{
               header("Location:../production/login.php?durum=no");
               exit;
           }
        }
    //Admin giriş wson

//kullanıcı kayıt
    
if(isset($_POST['kullanici_kaydol'])){

    $kullaniciKaydet = $db->prepare("INSERT INTO kullanici SET 
    
        kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_mail=:kullanici_mail,
        kullanici_password=:kullanici_password,
        kullanici_gsm=:kullanici_gsm,
        kullanici_tc=:kullanici_tc,
        kullanici_il=:kullanici_il,
        kullanici_ilce=:kullanici_ilce,
        kullanici_adres=:kullanici_adres

        ");
       



    $insert = $kullaniciKaydet->execute(array(

        'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
        'kullanici_mail'=> $_POST['kullanici_mail'],
        'kullanici_password'=> $_POST['kullanici_password'],
        'kullanici_gsm'=> $_POST['kullanici_gsm'],
        'kullanici_tc'=> $_POST['kullanici_tc'],
        'kullanici_il'=> $_POST['kullanici_il'],
        'kullanici_ilce'=> $_POST['kullanici_ilce'],
        'kullanici_adres'=> $_POST['kullanici_adres']

        )); 
       

  

    if($insert){
     
        header("Location:../../?durum=ok");
        
   }else{
       header("Location:../../?durum=no");
          
   }

}



//kullanıcı kayıt son


//kullanıcı oturum açma işlemleri
    if(isset($_POST['kullaniciOturumAc'])){

        $kullanicimail= $_POST['kullaniciEposta'];
        $kullanicipassword= $_POST['kullaniciSifre'];//md5 kullan
    

        $kullanicisor=$db->prepare("SELECT * From  kullanici where kullanici_mail=:mail and kullanici_password=:sifre and 
        kullanici_yetki=:yetki and kullanici_durum=:durum ");
        $kullanicisor->execute(array(
            'mail' => $kullanicimail,
            'sifre' => $kullanicipassword,
            'yetki'=>1,
            'durum'=>1
            
        ));

        $say=$kullanicisor->rowCount();//veri tabanında böyle bir sıra varmı
       

       if($say==1){
            $_SESSION['kullaniciEposta']=$kullanicimail;
            

            header("Location:../../?durum=ok");
            exit;
       }else{
           header("Location:../../?durum=no");
           exit;    
       }
    }
//kullanıcı oturum açma son



    //genel ayarlar
    if(isset($_POST['genelayarkaydet'])){
      
      $ayarkaydet=$db->prepare("UPDATE ayar Set 
           ayar_title=:ayar_title,
            ayar_description=:ayar_description,
            ayar_keywords=:ayar_keywords,
            ayar_author=:ayar_author
            Where ayar_id=1 ");


        $update=$ayarkaydet->execute(array(
            'ayar_title'=> $_POST['ayar_title'],
            'ayar_description'=> $_POST['ayar_description'],
            'ayar_keywords'=> $_POST['ayar_keywords'],
            'ayar_author'=> $_POST['ayar_author']
        ));

        if($update){
            header("Location:../production/genel_ayar.php?durum=ok");
        }else{
            header("Location:../production/genel_ayar.php?durum=no");
        }
        
    }

    //genelayarlar son



    //iletişim ayarları
    if(isset($_POST['iletisimayarkaydet'])){
      
        $ayarkaydet=$db->prepare("UPDATE ayar Set 
             ayar_tel=:ayar_tel,
              ayar_gsm=:ayar_gsm,
              ayar_faks=:ayar_faks,
              ayar_mail=:ayar_mail,
              ayar_il=:ayar_il,
              ayar_ilce=:ayar_ilce,
              ayar_adres=:ayar_adres,
              ayar_mesai=:ayar_mesai
              Where ayar_id=1 ");
  
  
          $update=$ayarkaydet->execute(array(
              'ayar_tel'=> $_POST['ayar_tel'],
              'ayar_gsm'=> $_POST['ayar_gsm'],
              'ayar_faks'=> $_POST['ayar_faks'],
              'ayar_mail'=> $_POST['ayar_mail'], 
              'ayar_il'=> $_POST['ayar_il'],
              'ayar_ilce'=> $_POST['ayar_ilce'],
              'ayar_adres'=> $_POST['ayar_adres'],
              'ayar_mesai'=> $_POST['ayar_mesai']
          ));
  
          if($update){
              header("Location:../production/iletisim_ayar.php?durum=ok");
          }else{
              header("Location:../production/iletisim_ayar.php?durum=no");
          }
          
      }
        //iletişim ayarları son
     


       //api ayarları
    if(isset($_POST['apiayarkaydet'])){
      
        $ayarkaydet=$db->prepare("UPDATE ayar Set 
             ayar_analystic=:ayar_analystic,
             ayar_maps=:ayar_maps,
             ayar_zopim=:ayar_zopim
               Where ayar_id=1 ");
             
  
  
          $update=$ayarkaydet->execute(array(
              'ayar_analystic'=> $_POST['ayar_analystic'],
              'ayar_maps'=> $_POST['ayar_maps'],
              'ayar_zopim'=> $_POST['ayar_zopim']
             
          ));
  
          if($update){
              header("Location:../production/api_ayar.php?durum=ok");
          }else{
              header("Location:../production/api_ayar.php?durum=no");
          }
          
      }

      //api ayarları son


      
       //sosyal ayarları
    if(isset($_POST['sosyalayarkaydet'])){
      
        $ayarkaydet=$db->prepare("UPDATE ayar Set 
             ayar_google=:ayar_google,
             ayar_facebook=:ayar_facebook,
             ayar_twitter=:ayar_twitter,
             ayar_youtube=:ayar_youtube
               Where ayar_id=1 ");
             
  
  
          $update=$ayarkaydet->execute(array(
              'ayar_google'=> $_POST['ayar_google'],
              'ayar_facebook'=> $_POST['ayar_facebook'],
              'ayar_twitter'=> $_POST['ayar_twitter'],
              'ayar_youtube'=> $_POST['ayar_youtube']
             
          ));
  
          if($update){
              header("Location:../production/sosyal_ayar.php?durum=ok");
          }else{
              header("Location:../production/sosyal_ayar.php?durum=no");
          }
          
      }
       //sosyal ayarları son


          //mail ayarları
    if(isset($_POST['mailayarkaydet'])){
      
        $ayarkaydet=$db->prepare("UPDATE ayar Set 
             ayar_smtphost=:ayar_smtphost,
             ayar_smtpuser=:ayar_smtpuser,
             ayar_smtppassword=:ayar_smtppassword,
             ayar_smtpport=:ayar_smtpport
               Where ayar_id=1 ");
             
  
  
          $update=$ayarkaydet->execute(array(
              'ayar_smtphost'=> $_POST['ayar_smtphost'],
              'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
              'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
              'ayar_smtpport'=> $_POST['ayar_smtpport']
             
          ));
  
          if($update){
              header("Location:../production/mail_ayar.php?durum=ok");
          }else{
              header("Location:../production/mail_ayar.php?durum=no");
          }
          
      }
       //mail ayarları son




          //hakkimizda ayarları
    if(isset($_POST['hakkimizdakaydet'])){
      
        $ayarkaydet=$db->prepare("UPDATE hakkimizda Set 
             hakkimizda_baslik=:hakkimizda_baslik,
             hakkimizda_icerik=:hakkimizda_icerik,
             hakkimizda_video=:hakkimizda_video,
             hakkimizda_vizyon=:hakkimizda_vizyon,
             hakkimizda_misyon=:hakkimizda_misyon
               Where hakkimizda_id=0 ");
             
  
  
          $update=$ayarkaydet->execute(array(
              'hakkimizda_baslik'=> $_POST['hakkimizda_baslik'],
              'hakkimizda_icerik'=> $_POST['hakkimizda_icerik'],
              'hakkimizda_video'=> $_POST['hakkimizda_video'],
              'hakkimizda_vizyon'=> $_POST['hakkimizda_vizyon'],
              'hakkimizda_misyon'=> $_POST['hakkimizda_misyon']
             
          ));
  
          if($update){
              header("Location:../production/hakkimizda.php?durum=ok");
          }else{
              header("Location:../production/hakkimizda.php?durum=no");
          }
          
      }
       //hakkimzda ayarları son


       //kullanici düzenleme
        if(isset($_POST['kullanicidüzenle'])){

            $kullanici_id=$_POST['kullanici_id'];
            $kullanicikaydet=$db->prepare("UPDATE kullanici Set 
             kullanici_tc=:kullanici_tc,
             kullanici_adsoyad=:kullanici_adsoyad,
             kullanici_durum=:kullanici_durum
               Where kullanici_id={$_POST['kullanici_id']} ");
             
  
  
          $update=$kullanicikaydet->execute(array(
              'kullanici_tc'=> $_POST['kullanici_tc'],
              'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
              'kullanici_durum'=> $_POST['kullanici_durum']
             
          ));

          if($update){
              Header("Location:../production/kullanici-düzenle.php?kullanici_id=$kullanici_id&durum=ok");
          }else{
            Header("Location:../production/kullanici-düzenle.php?kullanici_id=$kullanici_id&durum=no");
          }

        }

       //kullanici düzenleme son

       //kullanıcı sil
       if($_GET['kullanicisil']=='ok'){
           $sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
           $kontrol=$sil->execute(array(
                'id'=>$_GET['kullanici_id']
           ));

           if($kontrol){
               header("Location:../production/kullanici.php?sil=ok");
           }else{
            header("Location:../production/kullanici.php?sil=no");
           }
       }

       //kullanıcı sil son


        //kullanici düzenleme
        if(isset($_POST['kullanicidüzenle'])){

            $kullanici_id=$_POST['kullanici_id'];
            $kullanicikaydet=$db->prepare("UPDATE kullanici Set 
             kullanici_tc=:kullanici_tc,
             kullanici_adsoyad=:kullanici_adsoyad,
             kullanici_durum=:kullanici_durum
               Where kullanici_id={$_POST['kullanici_id']} ");
             
  
  
          $update=$kullanicikaydet->execute(array(
              'kullanici_tc'=> $_POST['kullanici_tc'],
              'kullanici_adsoyad'=> $_POST['kullanici_adsoyad'],
              'kullanici_durum'=> $_POST['kullanici_durum']
             
          ));

          if($update){
              Header("Location:../production/kullanici-düzenle.php?kullanici_id=$kullanici_id&durum=ok");
          }else{
            Header("Location:../production/kullanici-düzenle.php?kullanici_id=$kullanici_id&durum=no");
          }

        }

       //kullanici düzenleme son


        //menü düzenle
       if(isset($_POST['menuduzenle'])){

        $menu_id=$_POST['menu_id'];
        $menu_seourl=seo($_POST['menu_seourl']);

        $menukaydet=$db->prepare("UPDATE menu Set 
         menu_ust=:menu_ust,
         menu_ad=:menu_ad,
         menu_detay=:menu_detay,
         menu_url=:menu_url,
         menu_sira=:menu_sira,
         menu_durum=:menu_durum,
         menu_seourl=:menu_seourl
     
           Where menu_id={$_POST['menu_id']} ");
         
        
        
        $update=$menukaydet->execute(array(
          'menu_ust'=> $_POST['menu_ust'],
          'menu_ad'=> $_POST['menu_ad'],
          'menu_detay'=> $_POST['menu_detay'],
          'menu_url'=> $_POST['menu_url'],
          'menu_sira'=> $_POST['menu_sira'],
          'menu_durum'=> $_POST['menu_durum'],
         'menu_seourl'=> $_POST['menu_seourl']
         
        ));
        
        if($update){
          Header("Location:../production/menu.php?menu_id=$menu_id&durum=ok");
        }else{
        Header("Location:../production/menu.php?menu_id=$menu_id&durum=no");
        }
    }
    //menü düzenle sil


    //menü sil
    if($_GET['menusil']=='ok'){
        $sil=$db->prepare("DELETE from menu where menu_id=:id");
        $kontrol=$sil->execute(array(
             'id'=>$_GET['menu_id']
        ));

        if($kontrol){
            header("Location:../production/menu.php?sil=ok");
        }else{
         header("Location:../production/menu.php?sil=no");
        }
    }

    //menü sil son


      //menü ekle
      if(isset($_POST['menuekle'])){

        
        $menu_seourl=seo($_POST['menu_seourl']);

        $menukaydet=$db->prepare("INSERT INTO menu Set 
         menu_ust=:menu_ust,
         menu_ad=:menu_ad,
         menu_detay=:menu_detay,
         menu_url=:menu_url,
         menu_sira=:menu_sira,
         menu_durum=:menu_durum,
         menu_seourl=:menu_seourl
     
         ");
         
        
        
        $update=$menukaydet->execute(array(
          'menu_ust'=> $_POST['menu_ust'],
          'menu_ad'=> $_POST['menu_ad'],
          'menu_detay'=> $_POST['menu_detay'],
          'menu_url'=> $_POST['menu_url'],
          'menu_sira'=> $_POST['menu_sira'],
          'menu_durum'=> $_POST['menu_durum'],
         'menu_seourl'=> $_POST['menu_seourl']
         
        ));
        
        if($update){
          Header("Location:../production/menu.php?durum=ok");
        }else{
        Header("Location:../production/menu.php?durum=no");
        }
    }
    //menü ekle son


    //Gizlilik güncelle
    if(isset($_POST['gizlilikGuncelle'])){

        
        $gizlilikGuncelle=$db->prepare("UPDATE gizlilik_kosullari set 
            gizlilik=:gizlilik ");
          
            
             
         
      $update=$gizlilikGuncelle->execute(array(
          'gizlilik'=>$_POST['gizlilik']
         ));

      if($update){
          Header("Location:../production/gizlilik_ayar.php?gizlilik=ok");
      }else{
        Header("Location:../production/gizlilik_ayar.php?gizlilik=no");
      }

    }


    //--------

    //sepeteekleme işlemi
            
if(isset($_POST['sepeteEkle'])){

    $urunKaydet = $db->prepare("INSERT INTO sepet SET 


        urun_id=:urun_id,
        sepet_urunkod=:sepet_urunkod,
        sepet_fiyat=:sepet_fiyat,
        sepet_urun=:sepet_urun,
        sepet_model=:sepet_model,
        kullanici_mail=:kullanici_mail
        ");
       



    $insert = $urunKaydet->execute(array(

        'urun_id'=> $_POST['sepet_detay_id'],
        'sepet_fiyat'=> $_POST['sepet_detay_fiyat'],
        'sepet_urun'=> $_POST['sepet_detay_marka'],
        'sepet_model'=> $_POST['sepet_detay_model'],
        'sepet_urunkod'=> $_POST['sepet_detay_id'],
        'kullanici_mail'=> $_SESSION['kullaniciEposta']
        
        )); 
       

  

    if($insert){
     
        header("Location:../../sepet.php?durum=ok");
        
   }else{
       header("Location:../../sepet.php?durum=no");
          
   }

}

    //------------

//sepet silme

    if($_GET['sepetsil']=="ok"){
        $sil=$db->prepare("DELETE from sepet where sepet_id=:id");
        $kontrol=$sil->execute(array(
             'id'=>$_GET['sepet_id']
        ));

        if($kontrol){
            header("Location:../../sepet.php?sil=ok");
        }else{
         header("Location:../../sepet.php?sil=no");
        }
    }

//--------


//ürün kaydetme

if(isset($_POST['urunkaydet'])){

    $kullaniciKaydet = $db->prepare("INSERT INTO urunler SET 
    
        urun_ad=:urun_ad,
        urun_katagori_ad=:urun_katagori_ad,
        urun_marka=:urun_marka,
        urun_model=:urun_model,
        urun_fiyat=:urun_fiyat,
        urun_indirim=:urun_indirim,
        urun_indirim_fiyat=:urun_indirim_fiyat,
        urun_aciklama=:urun_aciklama,
        urun_adet=:urun_adet,
        urun_resim=:urun_resim

        ");
       



    $insert = $kullaniciKaydet->execute(array(

        'urun_ad'=>$_POST['urun_ad'],
        'urun_marka'=>$_POST['urun_marka'],
        'urun_model'=>$_POST['urun_model'],
        'urun_fiyat'=>$_POST['urun_fiyat'],
        'urun_indirim'=>$_POST['urun_indirim'],
        'urun_indirim_fiyat'=>$_POST['urun_indirim_fiyat'],
        'urun_aciklama'=>$_POST['urun_aciklama'],
        'urun_adet'=>$_POST['urun_adet'],
        'urun_katagori_ad'=>$_POST['urun_katagori_ad'],
        'urun_resim'=>$_POST['urun_resim']
      
        )); 


    if($insert){
     
        header("Location:../production/urun_ekle.php?durum=ok");
        
   }else{
       header("Location:../production/urun_ekle.php?durum=no");
          
   }

}


//--------



//urun resim ekle
if(isset($_POST['urunResimEkle'])){


    if($_FILES){
        $maxBoyut=700000;
        // $dosyaUzantisi=substr($_FILES["urun_resim"]["name"],-4,4);
        $name=$_FILES['urun_resim']['name'];
        $dosyaAdi=rand(1,99999).$name;
        $dosyaYolu="images/".$dosyaAdi;
       
           if($_FILES["urun_resim"]["size"]>$maxBoyut){
              echo "<h2> dosya 700kb den büyük olamaz </h2>";
           }else{

             $dosya=$_FILES["urun_resim"]["type"];
                if($dosya =="image/jpeg"||$dosya =="image/png"||$dosya =="image/gif"||$dosya=="image/jpg"){
                    if(is_uploaded_file($_FILES["urun_resim"]["tmp_name"])){

                      $tasi=move_uploaded_file($_FILES["urun_resim"]["tmp_name"],$dosyaYolu);

                      $kayit= $db->prepare("UPDATE urunler set 
                          urun_resim=:resim  
                          where urun_id={$_POST['urun_resim_id']}  
                      ");

                      $kayit->execute(array(
                          
                        'resim'=> $dosyaYolu
                        
                    ));

                      if($tasi){

                        echo "<h2> dosya başarıyla yüklendi </h2>";
                        header("Location:../production/urun_resim_ekle.php?durum=ok");
                      }else{
                        header("Location:../production/urun_resim_ekle.php?durum=no");
                        echo "<h2> dosya taşınırken hata oluştu </h2>";
                      }
                    }else{

                      echo "<h2> dosya taşınırken hata oluştu </h2>";
                    }

                }else{
                  echo "<h2> dosya formatı yanlış </h2>";
                }
           }

      }
}
//--------------------

//ürün sil 

if($_GET['urunsil']=="ok"){
    $sil=$db->prepare("DELETE from urunler where urun_id=:id");
    $kontrol=$sil->execute(array(
         'id'=>$_GET['urun_id']
    ));

    if($kontrol){
        header("Location:../production/urunler.php?sil=ok");
    }else{
     header("Location:../production/urunler.php?sil=no");
    }
}


//-----------------------



//Ürün güncelle
if(isset($_POST[''])){

        
    $gizlilikGuncelle=$db->prepare("UPDATE gizlilik_kosullari set 
        gizlilik=:gizlilik ");
      
        
         
     
  $update=$gizlilikGuncelle->execute(array(
      'gizlilik'=>$_POST['gizlilik']
     ));

  if($update){
      Header("Location:../production/gizlilik_ayar.php?gizlilik=ok");
  }else{
    Header("Location:../production/gizlilik_ayar.php?gizlilik=no");
  }

}


//--------

?>