<?php 
include "header.php";
        
       
 error_reporting(0);
 $gizliliksor=$db->prepare("SELECT * FROM gizlilik_kosullari ");
 $gizlilikcek=$gizliliksor->execute();
 $gizlilikcek=$gizliliksor->fetch(PDO::FETCH_ASSOC);
  
 



 ?>


	
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							
							<div class="bigtitle">Gizlilik Koşullarımız</div>
						</div>
						<div class="col-md-3 col-md-offset-5">

						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->

               
			
				<div class="page-content">
					<p>
                     <?php echo $gizlilikcek['gizlilik'] ?>
					</p>
				</div>                 
				
			</div>
		
           <!-- dide bar buraya gelecek --> <?php include "sidebar.php"?> 	

		</div>
		
		
		<div class="spacer">

		
		</div>
	</div>

	
	<?php include "footer.php" ?>