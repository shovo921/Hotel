<!DOCTYPE html>

  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
   <?php include'header.php'?>
  
    
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <span class="caption mb-3">Luxurious Rooms</span>
              <h1 class="mb-4">Double Rooms</h1>
            </div>
          </div>
        </div>
      </div>  

    
   
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Our Rooms</h2>
          </div>
        </div>
        <div class="row">
		
		
		
		<?php 	
						
				
						$sql = "SELECT bed.sl_id,bed.bed_no,bed.room_id,bed.status,bed.bed_image,add_room.name,add_room.price,add_room.type from bed INNER JOIN add_room on bed.room_id = add_room.id where add_room.type = '2' ";
						$re = mysqli_query($con,$sql);	
						while($row= mysqli_fetch_array($re))
										{
												$id = $row['sl_id'];
												$bedname = $row['bed_no'];
												
												$bedstatus = $row['status'];
												
												$image = $row['bed_image'];
												$roomno = $row['name'];
												$price = $row['price'];
												
											?>

          
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="hotel-room text-center">
              <a href="view_details.php?id=<?php echo $id ;?>" class="d-block mb-0 thumbnail"><img src="images/bed/<?php echo $image;?>" alt="Image" class="img-fluid"></a>
              <div class="hotel-room-body">
                <h3 class="heading mb-0"><a href="view_details.php?id=<?php echo $id ;?>" ><?php echo $bedname;?></a></h3>
                <strong class="price">BDT <?php echo $price;?>/Night</strong>
              </div>
            </div>
          </div>
		  
		  
		  <?php }
										
			?>						
		  
        </div>
      </div>
    </div>

        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    


    
   <?php include"footer.php"?>
</html>