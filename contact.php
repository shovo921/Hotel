<!DOCTYPE html>
<html lang="en">

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
              <span class="caption mb-3">Chat With Us</span>
              <h1 class="mb-4">Get In Touch</h1>
            </div>
          </div>
        </div>
      </div>  

    
    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form action="" class="p-5 bg-white"  method="post" class="contact_form" id="contact_form">

              <div class="row form-group" id="contact_form">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="fullname" name="name" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group" id="contact_form">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                </div>
              </div>


              <div class="row form-group" id="contact_form">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Phone</label>
                  <input type="text" id="phone" name="mobile" class="form-control" placeholder="Phone #">
                </div>
              </div>

              <div class="row form-group" id="contact_form">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea  id="message"  name="msg" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group" id="contact_form">
                <div class="col-md-12">
                        <button class="contact_button" type="submit" name="submit" >Send</button>
                </div>
              </div>
                  <?php
					include"db.php";
                    include'repository/ContractRepo.php';
					if(isset($_POST["submit"]))
					{
					$name= 	$_POST["name"];
					$email= 	$_POST["email"];
					$mobile= 	$_POST["mobile"];
					$msg= 	$_POST["msg"];
					
					
					
                        $contract= new LoginRepo();
				        $re = $contract->getAll();// mysqli_query($con,$sql);
												if($re){
															echo "<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<b>Message is sent </b>
									</div>";
												}
						
					}
					
					?>
  
            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+8801635229748</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">16103176@iubat.edu</a></p>

            </div>
            
            
          </div>
        </div>
      </div>
    </div>
    
    


    
<?php include"footer.php"?>

  </body>
</html>