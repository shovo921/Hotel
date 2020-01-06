<?php include"header.php";  ?>

<br>  <br> <br>
      <div class="plans-section" id="rooms">
				 <div class="container">
				 
				 <?php 
				 if(isset($_POST["confirm"]))
					 
					 {
						 
						 $checkin = $_POST["checkin"];
						 $checkout = $_POST["checkout"];
						 
						$date1 = new DateTime($checkin);
						$date2 = new DateTime($checkout);
						$interval = $date1->diff($date2);
						$num_days = $interval->days;
							
							
						 $bedno = $_POST["bedno"];
						 $price = $_POST["price"];
						if(isset($_POST["ac"]))
						{
							$ac = $_POST["ac"];
						}
						 else
						 {
							$ac = "no"; 
							 
						 }
						 
						 
						 if(isset($_POST["meal"]))
						{
							$meal = $_POST["meal"];
						}
						 else
						 {
							$meal = "no"; 
							 
						 }
						 
						  if(isset($_POST["bodymsg"]))
						{
							$bodymsg = $_POST["bodymsg"];
						}
						 else
						 {
							$bodymsg = "no"; 
							 
						 }
						 
						
						 $userid = $_SESSION["userId"];
						
						 
						 $comsn = empty($_POST["comsn"]) ? 0 : $_POST["comsn"];
						 $comearn = empty($_POST["comearn"]) ? 0 : $_POST["comearn"];
						 
						  $customername = $_POST["customername"];
						   $email = $_POST["email"];
						    $mobile = $_POST["mobile"];
							$address = $_POST["address"];
							
							$bed_id = $_POST["bed_id"];
							$date = date("Y-m-d");
							
							
							$sql1 = "INSERT INTO `reservation`
													(`bed_no`, `check_in`, `check_out`, `user_id`, `status`) 
													VALUES ('$bed_id','$checkin','$checkout','$userid','0')"; 
							if(mysqli_query($con,$sql1)){
										
							}	
							
							
						  
						  $errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
											
										  $file_ext= explode('.', $_FILES['image']['name']);
										  $file_ext= strtolower(end($file_ext));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"images/user/".$file_name);
											 echo "";
										  }else{
											 print_r($errors);
										  }	
						  
						  
							$errors1= array();
							$file_name1 = $_FILES['image1']['name'];
							$file_size1 =$_FILES['image1']['size'];
							$file_tmp1 =$_FILES['image1']['tmp_name'];
							$file_type1=$_FILES['image1']['type'];
							$file_ext1 = explode('.', $_FILES['image1']['name']);
							$file_ext1 = strtolower(end($file_ext1));
							
							$expensions1= array("jpeg","jpg","png");
							
							if(in_array($file_ext1,$expensions1)=== false){
							 $errors1[]="extension not allowed, please choose a JPEG or PNG file.";
							}
							
							if($file_size1 > 2097152){
							 $errors1[]='File size must be excately 2 MB';
							}
							
							if(empty($errors1)==true){
							 move_uploaded_file($file_tmp1,"images/user/".$file_name1);
							 echo "";
							} else print_r($errors1);
						$sql = "INSERT INTO `booking`
													(`user_id`, `bed_no`, `check_in`, `check_out`, `num_days`, `ac`, `meal`, `total`, `statas`, `account_number`,`transaction_id`,`comission`,`earn`,`cus_name`,`email`,`mobile`,`image`,`visa_image`,`cus_address`,`bed_id`,`date`,`spa`) 
													VALUES ('$userid','$bedno','$checkin','$checkout','$num_days','$ac','$meal','$price','0','none','none','$comsn','$comearn','$customername','$email','$mobile','$file_name','$file_name1','$address','$bed_id','$date','$bodymsg')";
													if (mysqli_query($con,$sql)) { 
						  
				?>			
				 <h3 class="title-w3-agileits title-black-wthree">Booking Summary</h3> <hr/>
				 
				 
				  <h2> Your booking is Pending.Please complete payment within 24 hours.Otherwise your booking will be automatically cancelled. Thank you . </h2> <br/>
				  <div class="panel panel-primary">
						<div class="panel-heading">
						Booking Information
					
					    </div>
						
				<div class="panel-body">
						<div class="col-md-6">
						<b> Check In Date: </b> <?php echo $checkin;?> <br>
						<b> Check Out Date:</b> <?php echo $checkout;?> <br>
						
						<b>Bed No:</b> <?php echo $bedno;?> <br>
						<b>Number Of Days:</b> <?= $num_days ?> days<br>
						
						<b>payment  amount:</b> BDT <?php echo $price;?> /- <br>
						
						
						 <br/><br/>
						</div>
				 <?php
				 
								} else echo '<br/><br/><h1>'.$con->error.'</h1>';
				 
					}
					else
					{ ?>
						
					 <h3 class="title-w3-agileits title-black-wthree">No data to show</h3>	
						
						
				<?php	}
				 ?>
				 
				 
				 
				 
				 
				 
				
														
														
														
					</div>									
					</div>									
														
					




                             					
				</div>
				
				
			
			
				</div>
	</div>
	 <!--// rooms & rates -->
  <!-- visitors -->
<?php include"footer.php";?>