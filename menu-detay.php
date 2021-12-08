<?php   
     
        include "header.php";
       
       
        error_reporting(0);

        //belirli veriyi çekme işlemi
        $menusor=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
          $menusor->execute(array(
            'sef'=>$_GET['sef']
          ));
        $menucek=$menusor->fetch(PDO::FETCH_ASSOC);
   
    
    ?>


	
	<div class="container">
		
		<div class="row">
			<div class="col-md-9"><!--Main content-->

                 <div class="title-bg">
					<div class="title"> <?php echo $menucek['menu_ad'] ?> </div>
				</div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $menucek['menu_video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <div class="title-bg">
					<div class="title"> Misyonumuz </div>
				</div>
				<blockquote>
                     <?php echo $menucek['menu_misyon'] ?>
                </blockquote>
				

                <div class="title-bg">
					<div class="title"> Vizyonumuz </div>
				</div>
				<blockquote>
                     <?php echo $menucek['menu_vizyon'] ?>
                </blockquote>


				<div class="title-bg">
					<div class="title"><?php echo $menucek['menu_baslik'] ?></div>
				</div>
				<div class="page-content">
					<p>
                     <?php echo $menucek['menu_icerik'] ?>
					</p>
				</div>                 
				
			</div>
		
            <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 


		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include "footer.php" ?>