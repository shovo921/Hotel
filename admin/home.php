<?php include 'header.php';?>
            <!-- HEADER DESKTOP-->

          
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <marquee><h3>Welcome to Desboard</h3></marquee>
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    
                                        
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fas fa-bed"></i>
                                            </div>
                                            <div class="text">
                                            <a href="viewroom.php">   <h2>Total Rooms</h2></a> 
                                                <p><?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from add_room ";
																	$re = mysqli_query($con,$sql);
																	
																	$ar = mysqli_num_rows($re);
																		echo $ar;
																?></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-bullhorn"></i></i>
                                            </div>
                                            <div class="text">
                                               <a href="viewbed.php"> <h2>Total Beds</h2></a>
                                                	
												  </div>

													 <div>
																			  
														<p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from bed ";
																	$re = mysqli_query($con,$sql);
																	
																	$tb = mysqli_num_rows($re);
																		echo $tb;
																?></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fas fa-assistive-listening-systems"></i>
                                            </div>
                                            <div class="text">
                                              <a href="booking.php">  <h2>Active boking</h2>
                                                	<p>	<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 1 AND check_in >= '$dateorder'";
																	$re = mysqli_query($con,$sql);
																	
																	$ab = mysqli_num_rows($re);
						                                              echo $ab;
																?>
																				
																				</p>
                                           </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                              <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                                                               <i class="fas fa-assistive-listening-systems"></i>
                                            </div>
                                            <div class="text">
                                                <a href="viewbed.php">   <h2>Available  Bed</h2></a>	
                                                <span>	<p>	
																	<?php echo $tb-$ab; ?>
																				
                                                    								</p></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                               <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fas fa-bell"></i>
                                            </div>
                                            <a href="booking.php">
                                                <div class="text">
                                                <h2>pending Booking</h2>
                                                <span><p>
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 0 ";
																	$re = mysqli_query($con,$sql);
																	
																	$pb = mysqli_num_rows($re);
						                                              echo $pb;
																?>
																				
																				
																				</p></span>
                                            </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                               <i class="fas fa-arrow-circle-up"></i>
                                            </div>
                                            <a href="booking.php">
                                                <div class="text">
                                                <h2>Previous booking</h2>
                                                <span><p>
																				
																				<?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where statas = 2 ";
																	$re = mysqli_query($con,$sql);
																	
																	$pb1 = mysqli_num_rows($re);
						                                              echo $pb1;
																?>
																				
																				</p></span>
                                            </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                              <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-arrow-down"></i>
                                            </div>
                                            <a href="booking.php">
                                                <div class="text">
                                                <h2>Total booking</h2>
                                                <span><p>
																				<?php echo $pb1+$ab;?> 
																				
																				</p></span>
                                            </div>
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-2">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-arrow-circle-down"></i>
                                            </div>
                                            <div class="text">
                                            <a href="checkout.php">   <h2>Todays' checkin</h2>
                                                <p><?php
																	
																	
																	$dateorder = date("Y-m-d");
																	$sql = "select * from booking where check_in = '$dateorder' AND statas = 1 ";
																	$re = mysqli_query($con,$sql);
																	
																	$tci = mysqli_num_rows($re);
						                                              echo $tci;
																?></p>
                                           </a> 
                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                          
                                <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-arrow-circle-up"></i>
                                            </div>
                                            <div class="text">
                                               <a href="checkout.php">  <h2>Todays' checkout</h2> </a>
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
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           
                          
                            
                            
                            
                        </div>
                        	<div class="col-md-12">
																			
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
										
                          
                       
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
