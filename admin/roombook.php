<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
		
	<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				
				$id = $_GET['rid'];
				
				
				$tsql = "select * from booking where id = $id";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										$cusname = $row['cus_name'];
										$email = $row['email'];
										$mobile = $row['mobile'];
										$image = $row['image'];
										$bedno = $row['bed_no'];
										$checkin = $row['check_in'];
										$checkout = $row['check_out'];
										$meal = $row['meal'];
										$ac = $row['ac'];
										$user_id = $row['user_id'];
										$status = $row['statas'];
										$total = $row['total'];
										
										$bed_id = $row['bed_id'];
										$accnmbr = $row['account_number'];
										$tnxid = $row['transaction_id'];
				
				
				
				}
					
					
				
		
	}
		
		
		
			?> 	
		

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Bed Booking<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Bed-Booking Confirmation
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <th><img src="../images/user/<?php echo $image;?>" height="100px" width="200px"/> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Name</th>
                                            <th><?php echo $cusname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email </th>
                                            <th><?php echo $email; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Mobile </th>
                                            <th><?php echo $mobile;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>user id </th>
                                            <th><?php echo $user_id;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Bed No </th>
                                            <th><?php echo $bedno; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check in</th>
                                            <th><?php echo $checkin; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check out </th>
                                            <th><?php echo $checkout; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Tour guide </th>
                                            <th><?php echo $ac; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Meal </th>
                                            <th><?php echo $meal; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Account number </th>
                                            <th><?php echo $accnmbr; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Transaction id </th>
                                            <th><?php echo $tnxid; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>price </th>
                                            <th><?php echo $total; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Status</th>
                                            <th><?php 
											if($status == 0)
									{
										echo "<b style='color:red;'> Not confirmed</b>";
									}
									if($status == 1)
									{
										echo "<b style='color:green;'> Active</b>";
									}
									if($status == 2)
									{
										echo "<b style='color:blue;'> Completed</b>";
									}
											
											
											?></th>
                                            
                                        </tr>
										
										
                                   
                                  
                                        
                                        
                                    
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
							<input type="hidden" name="id" value="<?php echo $id ;?>">
							<input type="hidden" name="bedid" value="<?php echo $bed_id ;?>">
							<input type="hidden" name="userid" value="<?php echo $user_id ;?>">
							<input type="hidden" name="checkin" value="<?php echo $checkin ;?>">
							<input type="hidden" name="checkout" value="<?php echo $checkout ;?>">
										<div class="form-group">
														<label>Select the Confirmation</label>
														<select name="conf"class="form-control">
															<option value selected>	select an option</option>
															<option value="1">Confirm</option>
															<option value="0">Not Confirm</option>
															<option value="2">Completed</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Confirm" class="btn btn-success">
							<a href="booking.php" class="btn btn-primary" > Back </a>
							<input type="submit" name="delete" value="Delete" class="btn btn-danger">
							</form>
                        </div>
						
						
						<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							$bid = $_POST['id'];
							
							$bididr = $_POST['bedid'];
							$useridr = $_POST['userid'];
							$checkinr = $_POST['checkin'];
							$checkoutr = $_POST['checkout'];
							
						$tsql = "select * from reservation where bed_no = '$bididr' AND check_in = '$checkinr' AND check_out = '$checkoutr'";
									$tre = mysqli_query($con,$tsql);
									$number1 = mysqli_num_rows($tre);
									while($row=mysqli_fetch_array($tre) )
									{	
										$reid = $row['sl'];
										echo $reid;
									}
							
							if( $st == 0)
								
								{
								$sql1 = "DELETE FROM reservation WHERE sl = '$reid' ";
															
								$ds = mysqli_query($con,$sql1);	
								}
								
						if( $st == 1)
								
								{	


								if( $number1 > 0)
								{
													$sql1 = "UPDATE reservation SET status = 1 WHERE WHERE id = $reid ";
											if(mysqli_query($con,$sql1)){
														echo "<div class='alert alert-success'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<b>Bed Reservation is Updated </b>
								</div>";
											}
								}
								else
								{
									$sql1 = "INSERT INTO `reservation`
													(`bed_no`, `check_in`, `check_out`, `user_id`, `status`) 
																		VALUES ('$bididr','$checkinr','$checkoutr','$useridr','1')"; 
												if(mysqli_query($con,$sql1)){
															echo "<div class='alert alert-success'>
											<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<b>Bed Reservation is Updated </b>
									</div>";
												}
									
								}

										
														
						}

						if( $st == 2)
								
								{
								$sql1 = "DELETE FROM reservation WHERE sl = '$reid' ";
															
								$ds = mysqli_query($con,$sql1);	
								}


						
							 $sql = "UPDATE booking SET statas = $st WHERE id  = '$bid' ";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Booking is Updated </b>
				</div>";
					?>
<script type="text/javascript">
<!--
function Redirect() {
window.location="roombook.php?rid=<?php echo $bid ;?>";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 2000);
//-->
</script>

<?php					
								
					
						}
					
						}	

								if(isset($_POST['delete']))
						{	
							
							
							$st = $_POST['conf'];
							$bid = $_POST['id'];
							
							$bididr = $_POST['bedid'];
							$useridr = $_POST['userid'];
							$checkinr = $_POST['checkin'];
							$checkoutr = $_POST['checkout'];
							
						$tsql = "select * from reservation where bed_no = '$bididr' AND check_in = '$checkinr' AND check_out = '$checkoutr'";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$reid = $row['sl'];
										echo $reid;
									}
							
							
							
							
							$bid = $_POST['id'];
							$sql2 = "DELETE FROM reservation WHERE sl = '$reid' ";	
								$ds = mysqli_query($con,$sql2);	
							$sql = "DELETE FROM booking WHERE id = '$bid' ";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Booking is deleted successfully </b>
				</div>";
					?>
<script type="text/javascript">
<!--
function Redirect() {
window.location="monitoring.php";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 2000);
//-->
</script>

<?php					
								
					
						}
					
						}
									
							
						?>
						
						
						
                    </div>
					</div>
					
					
					<div class="col-md-4 col-sm-4">
					
					
					
					 <div class="panel panel-default">
                        <div class="panel-heading">
                          Criminal Check
                        </div>
                        <div class="panel-body">
						
						<img src="../images/user/<?php echo $image;?>" style="height:283px;width:350px;"/>
						
                        
						<br>
						<form action="" method="post">
						<input type="submit" name="check" value="Check" class="btn btn-success" />
						</form>
						</div>
                        <div class="panel-footer">
						
						<?php
						
						if(isset($_POST["check"]))
						{
							
						$tsql = "select * from criminal_info where name ='$cusname' AND mobile = '$mobile' ";
									$tre = mysqli_query($con,$tsql);
									$nmbr = mysqli_num_rows($tre);
									if($nmbr > 0)
									{
									
										echo "<h2> <b style='color:red;'> This Person is a Criminal </b> </h2>";
										
										
									while($row=mysqli_fetch_array($tre) )
									{	
										$name = $row['name'];
										$image = $row['image'];
										$details = $row['details'];
										
									}
									?>
									<h4> Criminal Name: <?php echo $name ;?>  </h4> <br/>
									<img src="../images/user/<?php echo $image;?>" style="height:100px;width:100px;" />
									
									Crime Details:   <p>  <?php echo $details ;?> </p> 
									
									<?php
										
									}
									else{
									
									echo "<h2> <b style='color:green;'> This Person is not  a Criminal </b> </h2>";
						}
							
						}
						?>
                            
                        </div>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Booking summary
                        </div>
                        <div class="panel-body">
						<b> Customer name: </b> <?php echo $cusname;?> <br>
						<b> Check in:</b> <?php echo $checkin;?> <br>
						<b>Check out :</b> <?php echo $checkout;?> <br>
						<b>number of days: </b> <?php
							$date1=date_create($checkin);
							$date2=date_create($checkout);
							$diff=date_diff($date1,$date2);
							
						
					$dt = $diff->format("%R%a days");
					if($dt ==0)
					{
						
						echo "+1 days";
					}
					else{
						echo $dt;
						
					}
					
					
					?> <br>
				<b>	Price :</b> BDT <?php echo $total;?> /-<br>
					<b> Status:</b> <?php 
											if($status == 0)
									{
										echo "<b style='color:red;'> Not confirmed</b>";
									}
									if($status == 1)
									{
										echo "<b style='color:green;'> Active</b>";
									}
									if($status == 2)
									{
										echo "<b style='color:blue;'> Completed</b>";
									}
											
											
											?>
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                </div>
                <!-- /. ROW  -->
				
                </div>
                <!-- /. ROW  -->
				
				
				
				
         </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>

