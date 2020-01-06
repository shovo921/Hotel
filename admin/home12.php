<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header" style="color:green;">
                            Welcome To  Dashboard
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
						$sql = "select * from roombook";
						$re = mysqli_query($con,$sql);
						$c =0;
						while($row=mysqli_fetch_array($re) )
						{
								$new = $row['stat'];
								$cin = $row['cin'];
								$id = $row['id'];
								if($new=="Not Conform")
								{
									$c = $c + 1;
									
								
								}
						
						}
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
				
				
				
				
				
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                             <div class="panel panel-primary">
					
										<div class=" panel-heading">
									
										</div>
										
										<div class=" panel-body">
										
										
										
										<div class="row">
													
													<div class="col-md-9">
																<div class="col-md-2" style="background-color:#b0aeff;height:123px;">
																	<a href="viewroom.php" style="color:black;">	 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Total Rooms</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				
																<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from add_room ";
																	$re = mysqli_query($con,$sql);
																	
																	$ar = mysqli_num_rows($re);
																		echo $ar;
																?>
																				
																				
																				
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																
																	</a>
																</div>
																
																 <div class="col-md-2" style="background-color:#aed5ff;height:123px;">
																<a href="viewbed.php" style="color:black;">		 <div class="card">
																			  <center>  <div class="cardHeader">
																				<h4>Total Beds</h4>
																			  </div>

																			  <div class="cardContainer">
																			  
																			  
																			  
																			  
																				<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from bed ";
																	$re = mysqli_query($con,$sql);
																	
																	$tb = mysqli_num_rows($re);
																		echo $tb;
																?></p>
																			  </div>
																			  </center>
																		</div> 
																		
																		</a>
																

																</div>
																
																<div class="col-md-2" style="background-color:#00d8bb;height:123px;">
																	<a href="booking.php" style="color:black;">	 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Active Booikng</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 1 AND check_in >= '$dateorder'";
																	$re = mysqli_query($con,$sql);
																	
																	$ab = mysqli_num_rows($re);
						                                              echo $ab;
																?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																<div class="col-md-2" style="background-color:#71addc;height:123px;">
																	
																<a href="viewbed.php" style="color:black;">	<div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Available  Bed</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				
																				<?php echo $tb-$ab; ?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																
																<div class="col-md-2" style="background-color:#cb6470;height:123px;">
																<a href="booking.php" style="color:black;">
																		

																		<div class="card">
																			<center>  <div class="cardHeader">
																				<h4>pending Booking</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 0 ";
																	$re = mysqli_query($con,$sql);
																	
																	$pb = mysqli_num_rows($re);
						                                              echo $pb;
																?>
																				
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																<div class="col-md-2" style="background-color:#f186eb;height:123px;">
																<a href="marchants.php" style="color:black;">
																		

																		<div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Pending Registration</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from marchant_login where status = 0 ";
																	$re = mysqli_query($con,$sql);
																	
																	$pr = mysqli_num_rows($re);
						                                              echo $pr;
																?>
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																
																
																
																
																<div class="col-md-4" style="background-color:#72ddf9;height:123px;">
																		 
																	<a href="booking.php" style="color:black;">	 
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Previous booking</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 2 ";
																	$re = mysqli_query($con,$sql);
																	
																	$pb1 = mysqli_num_rows($re);
						                                              echo $pb1;
																?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																
																<div class="col-md-2" style="background-color:#c3b4b4;height:123px;">
                                                               <a href="marchants.php" style="color:black;">																	
																	<div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Total booking</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				<?php echo $pb1+$ab;?> 
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																<div class="col-md-2" style="background-color:#bed2b5;height:123px;">
																	<a href="checkout.php" style="color:black;">	 
																		 
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Todays' checkin</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where check_in = '$dateorder' AND statas = 1 ";
																	$re = mysqli_query($con,$sql);
																	
																	$tci = mysqli_num_rows($re);
						                                              echo $tci;
																?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																</a>

																</div>
																
																<div class="col-md-2" style="background-color:#eae2e2;height:123px;">
																<a href="checkout.php" style="color:black;">	
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Todays' checkout</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where check_out = '$dateorder' AND statas = 1 ";
																	$re = mysqli_query($con,$sql);
																	
																	$tco = mysqli_num_rows($re);
						                                              echo $tco;
																?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																		</a>
																

																</div>
																
																<div class="col-md-2" style="background-color:#f9ea9e;height:123px;">
																
																<a href="viewhotel.php" style="color:black;">	
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h4>Total hotel</h4>
																			  </div>

																			  <div class="cardContainer">
																				<p>
																				
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from hotel  ";
																	$re = mysqli_query($con,$sql);
																	
																	$th = mysqli_num_rows($re);
						                                              echo $th;
																?>
																				
																				</p>
																			  </div>
																			  </center>
																		</div> 
																
</a>
																</div>
						
													</div>
													
													<div class="col-md-3">
																			
				 <div class="panel panel-primary">
			
				<div class=" panel-heading">
			Filter & Search
			    </div>
				
				<div class=" panel-body">
				
						<form action="" method="post">
								
								<div class="form-group">
								  <label> Check In  </label>
									<input type="date" name="checkin" class="form-control" value="" />
								
								</div>
								
								<div class="form-group">
								  <label> Check Out  </label>
									<input type="date" name="checkout" class="form-control" value="" />
								
								</div>
								
								<div class="form-group">
								  
									<input type="submit" name="search" value="Check Availability" class="btn btn-primary" />
								
								</div>
								
						</form>
			
			    </div>
			
			</div>
													
													</div>
										
										
										
										
										</div>
										
										<div class="row">
										<?php
										if(isset($_POST["search"]))
											
											{ ?>
											<center> <h3>  Search Result </h3> <hr/></center>
										<?php	}
										else
										{ ?>
									<center> <h3>  Today's Bed map </h3> <hr/></center>
									<?php	}
										?>
										
										
										</div>
										<?php
										
										if(isset($_POST["search"]))
											
											{
										    $checkin  = $_POST["checkin"];
											$checkout  = $_POST["checkout"];
											
											
											
											$sql = "SELECT bed.sl_id,bed.bed_no,bed.room_id,bed.status,bed.bed_image,add_room.id,add_room.name,add_room.price from bed INNER JOIN add_room on bed.room_id = add_room.id";
										$re = mysqli_query($con,$sql);
										
										
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['sl_id'];
												$bedname = $row['bed_no'];
												
												$bedstatus = $row['status'];
												
												$image = $row['bed_image'];
												$roomno = $row['name'];
												$price = $row['price'];
												$color = "green";
										?>
										
										
										
										<?php 
										
										
										$sql = "SELECT  DISTINCT * FROM reservation";
										$re1 = mysqli_query($con,$sql);
										$dateorder = date("Y-m-d");
										
										while($row1= mysqli_fetch_array($re1))
										{
												$bed_no = $row1['bed_no'];
												$check_in = $row1['check_in'];
												$check_out = $row1['check_out'];
												$status = $row1['status'];
										
										if($bed_no == $id )
											
											{ 
												if( (($checkin < $check_in)&&($checkout < $check_in)) || (($checkin > $check_out)&&($checkout > $check_out)) )
											
												{ 
														
														
												}
												else
												{
													
													
														$color = "red";
													
													
												}
												
											}
											
									
										} ?>
										
										
										
									<div class="col-md-2" >
													<div class="panel panel-primary text-center no-boder bg-color-blue">
														<div class="panel-body">
															<img src="../images/bed.jpg"height="40px" width="60px"/>
															<?php echo $bedname ;?> <br>price <?php echo $price ;?>
														</div>
													<a href="../view_details.php?id=<?php echo $id;?>">
												<div class="panel-footer back-footer-blue" style="background-color:<?php echo $color;?>;color:yellow;">
														
													 	View 
														</div>
														</a>
													</div>	
											</div>	
										
										
										
									<?php	} 
											
											
											
											
										
											}
											
											else
											{
											$sql = "SELECT bed.sl_id,bed.bed_no,bed.room_id,bed.status,bed.bed_image,add_room.id,add_room.name,add_room.price from bed INNER JOIN add_room on bed.room_id = add_room.id";
										$re = mysqli_query($con,$sql);
										
										
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['sl_id'];
												$bedname = $row['bed_no'];
												
												$bedstatus = $row['status'];
												
												$image = $row['bed_image'];
												$roomno = $row['name'];
												$price = $row['price'];
												$color = "green";
										?>
										
										
										
										<?php 
										
										
										$sql = "SELECT  DISTINCT * FROM reservation";
										$re1 = mysqli_query($con,$sql);
										$dateorder = date("Y-m-d");
										
										while($row1= mysqli_fetch_array($re1))
										{
												$bed_no = $row1['bed_no'];
												$check_in = $row1['check_in'];
												$check_out = $row1['check_out'];
										
										if($bed_no == $id )
											
											{ 
												if(($dateorder >= $check_in) && ($dateorder <= $check_out)  )
											
												{ 
														$color = "red";
														
												}
												
											}
											
									
										} ?>
										
										
										
									<div class="col-md-2" >
													<div class="panel panel-primary text-center no-boder bg-color-blue">
														<div class="panel-body">
															<img src="../images/bed.jpg"height="40px" width="60px"/>
															<?php echo $bedname ;?> <br>price <?php echo $price ;?>
														</div>
													<a href="../view_details.php?id=<?php echo $id;?>">
												<div class="panel-footer back-footer-blue" style="background-color:<?php echo $color;?>;color:yellow;">
														
													 	View 
														</div>
														</a>
													</div>	
											</div>	
										
										
										
									<?php	} 	
												
											}
										
										?>
										</div>
							
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
				<!-- DEOMO-->
			
                        </div>
				
				<!--DEMO END-->
				
										
                    

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