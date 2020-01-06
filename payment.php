

<?php include"header.php";?>


 <br>  <br> <br>
 
 
     
				 
	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
				 
				 <?php 
				 if(isset($_POST["next"]))
					 
					{
						 
						 $checkin = $_POST["checkin"];
						 $checkout = $_POST["checkout"];
						 $bedno = $_POST["bedname"];
						 $bed_id = $_POST["bed_id"];
						 $price = $_POST["price"];

						
						 if(isset($_POST["acprice"]))
						{
							$ac = $_POST["ac"];
				          $acprice = $_POST["acprice"];
						}
						 else
						 {
							$ac = "no"; 
							 $acprice = 0;
						 }
						 
						 
						 if(isset($_POST["mealprice"]))
						{
							$mealprice = $_POST["mealprice"];
							$meal = $_POST["meal"];
						}
						 else
						 {
							$meal = "no"; 
							 $mealprice = 0;
						 }
						 
						 
						  if(isset($_POST["bodymsgprice"]))
						{
							$bodymsgprice = $_POST["bodymsgprice"];
							$bodymsg = $_POST["bodymsg"];
						}
						 else
						 {
							$bodymsg = "no"; 
							 $bodymsgprice = 0;
						 }
					?>	
					
				 <h3>Booking Information</h3> <hr/>
				 
				 
				 
				
				 
				  <div class="panel panel-primary">
						<div class="panel-heading">
						Booking Information
					
					    </div>
						
				<div class="panel-body">
						<div class="col-md-6">
						<b> Check In Date: </b> <?php echo $checkin;?> <br>
						<b> Check Out Date:</b> <?php echo $checkout;?> <br>
						
						<b>Bed No:</b> <?php echo $bedno;?> <br>
						<b>Number Of Days:</b> 
						<?php
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
					
					
					?>
						<br>
						
						<b>Bed Price:</b> BDT <?php echo $price;?> /per night <br>
						 <br/><br/>
						</div>
						
						
						<div class="col-md-6">
						Extra services <hr/>
					<?php if($acprice > 0){ ?>
						Tour Guide: BDT <?php echo $acprice;?> <br>
					<?php } if($mealprice > 0) { ?>
						Meal: Bdt <?php echo $mealprice;?> <br>
					<?php } if($bodymsgprice > 0) { ?>
						Body massage: Bdt <?php echo $bodymsgprice;?> <br>
					<?php } ?>	
					
						 <br/><br/>
						</div>
						
				 <div class="row">
				 
				
				    <table class="table">
					<tr>
					<th>SL </th>
					<th> Item name </th>
					<th>Days </th>
					<th> Price </th>
					</tr>
					
					<tr>
					<td>1 </td>
					<td> bed </td>
					<td>1 </td>
					<td> <?php echo $price;?> </td>
					</tr>
					<?php
					 if(isset($_POST["acprice"]))
						{ ?>
							<tr>
					<td>2 </td>
					<td> Tour guide  </td>
					<td>1 </td>
					<td> <?php echo $acprice;?> </td>
					</tr>
					<?php	}
						
						?>
					
					
					<?php
					 if(isset($_POST["mealprice"]))
						{ ?>
							<tr>
					<td>2 </td>
					<td> meal </td>
					<td>1 </td>
					<td> <?php echo $mealprice;?> </td>
					</tr>
					<?php	}
						
						?>
						
						
						
						<?php
					 if(isset($_POST["bodymsgprice"]))
						{ ?>
							<tr>
					<td>2 </td>
					<td> Body massage </td>
					<td>1 </td>
					<td> <?php echo $bodymsgprice;?> </td>
					</tr>
					<?php	}
						
						?>
					
					<tr> 
					<td> </td>
					<td>  </td>
					<td> sub total </td>
					<td> <?php 
					
						$total =  $price+$mealprice+$acprice + $bodymsgprice ;
                           echo $total; 						
					
					?> </td>
					
					</tr>
					
					<tr> 
					<td> </td>
					<td>  </td>
					<td> Number of days</td>
					<td> <?php 
					
					$dt = $diff->format("%R%a days");
					if($dt ==0)
					{
						
						echo "+1 days";
					}
					else{
						echo $dt;
						
					}
					
					
					?></td>
					
					</tr>
					
					
					<tr> 
					<td> </td>
					<td>  </td>
					<td> Grand Total</td>
					<td> <?php 
					$dt = $diff->format("%R%a");
					if($dt ==0)
					{
						
						$ttl = $total*1;
					}
					else{
						$ttl = $total*$dt;
						
					}
					
					
					echo $ttl; ?> </td>
					
					</tr>
					</table>
				 
				 <br>
				
				 <br> 
				 
				 
				 
				 <div class="col-md-5">
				 <h3 class="title-w3-agileits title-black-wthree">User Information</h3> <hr/>
				 <div class="panel panel-primary">
						<div class="panel-heading">
					 User Information
					    </div>
						
						<div class="panel-body">
						<form action="success.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									 <label>User name * </label>
									<input type="text" name="customername" class="form-control" value="" placeholder="user name" required />
								</div>
								
								<div class="form-group">
									 <label>Email  </label>
									<input type="email" name="email" class="form-control" value="" placeholder="user email"  />
								</div>
								
								<div class="form-group">
									 <label>Mobile * </label>
									<input type="text" name="mobile" class="form-control" value="" placeholder="Mobile number" required />
								</div>
								
								<div class="form-group">
									 <label>User Image * </label>
									<input type="file" name="image" class="form-control" value=""  required />
								</div>
								
								<div class="form-group">
									 <label>Passport/visa Image * </label>
									<input type="file" name="image1" class="form-control" value=""  required />
								</div>
								
								<div class="form-group">
									 <label>Address  </label>
									<input type="text" name="address" class="form-control" value="" placeholder="user address"  />
								</div>
						
						
						</div>
				 </div>
				 
				 </div>
				 
				 
				 <div class="col-md-7">
				 <h3 class="title-w3-agileits title-black-wthree">Payment  Information</h3> <hr/>
				 
				 
					<div class="panel panel-primary">
						<div class="panel-heading">
					 Payment area
					    </div>
						
						<div class="panel-body">
						
						<div class="col-md-12">
							
							
							
							<div class="col-md-7">
						
							Total Bill: BDT <?php echo $ttl;?> /- <br>
							Due Amount: <?php echo $ttl;?> /-
							
							</div>
							
							
							
						</div>		
							<input type="hidden" name="bed_id" class="form-control" value="<?php echo $bed_id;?>"   />
							<input type="hidden" name="comsn" class="form-control" value="<?php //echo $com; ?>"   />
							<input type="hidden" name="comearn" class="form-control" value="<?php //echo $dis;?>"   />
								
								<input type="hidden" name="ac" class="form-control" value="<?php echo $ac;?>"   />
								<input type="hidden" name="meal" class="form-control" value="<?php echo $meal;?>"   />
								<input type="hidden" name="bodymsg" class="form-control" value="<?php echo $bodymsg;?>"   />
								
								<input type="hidden" name="checkin" class="form-control" value="<?php echo $checkin;?>"   />
								<input type="hidden" name="checkout" class="form-control" value="<?php echo $checkout;?>"   />
								<div class="form-group">
									 <label>Bed No * </label>
									<input type="text" name="bedno" class="form-control" value="<?php echo $bedno;?>"  readonly />
								</div>
								<div class="form-group">
									 <label>Payable Ammount * </label>
									<input type="text" name="price" class="form-control" value="<?php echo $ttl ;?>"  readonly />
								</div>
								
								<br>
							 
							<div class="form-group">
								<input type="submit" name="confirm" class="form-control btn btn-success" value="Confirm Booking"  />
							</div>
							 
							 </form>
					    </div>
					
					</div>
							 
				 
				 </div>
				 
				 
				 
				 
									
				 
				 
				 
				 
				 
				 </div>
				 
				 
				 
				 <?php
				 
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