<?php ob_start(); include"header.php";?>
<?php if(!isset($_SESSION["userId"])) header('location: login.php');  ?>
        <div class="pd-to-100">
            <div class="container">
            <?php
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$sql = "SELECT bed.sl_id,bed.bed_no,bed.room_id,bed.status,bed.bed_image,add_room.name,";
					$sql.= "add_room.price,add_room.wifi,add_room.ac,add_room.ac_per_day,add_room.meal,add_room.meal_per_day,";
					$sql.= "add_room.body_message,add_room.body_message_per_day FROM bed ";
					$sql.= "INNER JOIN add_room on bed.room_id = add_room.id ";
					$sql.= "WHERE bed.sl_id = $id";
					
					$re = mysqli_query($con,$sql);	
					while($row= mysqli_fetch_array($re)) {
						$id = $row['sl_id'];
						$bedname = $row['bed_no'];

						$bedstatus = $row['status'];

						$image = $row['bed_image'];
						$roomno = $row['name'];
						$roombedding = 'Single';
						$price = $row['price'];

						$wifi = $row['wifi'];
						$ac = $row['ac'];
						$acprice = $row['ac_per_day'];
						$meal = $row['meal'];
						$meal_price = $row['meal_per_day'];

						$body_message = $row['body_message'];
						$body_message_per_day = $row['body_message_per_day'];
						$price = $row['price'];
			?>

                    <div class="row">
                       

                        <div class="col-md-7">
                            <h3>Facilities</h3><hr/><br>
                            <div class="priceing-table-main">
                                <div class="col-md-6">
                                    <div class="">
                                     <h3>   Room No : <?php echo $roomno;?> 
										<br> Bed NO: <?php echo $bedname ;?>
										<br> Price : BDT <?php echo $price ;?> /per night
										</h3>
                                    </div>
                                    <div class="">
                                        <hr> Free services: WIFI : <?php echo $wifi;?><hr>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading"><strong> Booked date list <br></strong></div>
                                        <div class="panel-body">
										<?php
											$sl = 0;

											$sql ="select * from reservation where bed_no = '$id' ";
											$re = mysqli_query($con,$sql);
											$nmbr = mysqli_num_rows($re);
											while($row=mysqli_fetch_array($re)){
												$rcheck_in = $row['check_in'];
												$rcheck_out = $row['check_out'];
										?>
                                        <?php if( $nmbr > 0 ) { ?>
                                            <b>from </b> <b style="color:red;"> <?php echo  $rcheck_in;?> </b> <b>  to </b> <b style="color:red;">	<?php echo  $rcheck_out;?>  </b><br>
                                        <?php } ?>
										<?php
												$sl++;
											}
											$cusname = $row['cus_name'];
										?>
										<?php if( $nmbr == 0) { ?>
											<b>There is no booked date. </b> <b style="color:green;"> This bed is available for booking </b><br>
										<?php	} ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <br><br>

                            <div class="panel panel-primary">
                                <div class=" panel-heading">
                                    Booking Information
                                </div>

                                <div class=" panel-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label> Check In </label>
                                            <input type="date" name="chekin" class="form-control" value="" min="0" />
                                        </div>
                                        <div class="form-group">
                                            <label> Check Out </label>
                                            <input type="date" name="checkout" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="check" value="Check Availability" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
						</div>
						 <div class="col-md-5">
                            <h3>Featured Image</h3><hr/>
                            <img src="images/bed/<?php echo $image ;?>" height="400px" width="450px;" />
                        </div>
					</div>
                <?php
					}
					if(isset($_POST["check"])) {
						$bedid = $_GET["id"];
						$checkin = $_POST["chekin"];
						$checkout = $_POST["checkout"];

						$sql = "select * from reservation where  bed_no = $bedid ";
						$re = mysqli_query($con,$sql);
						$number = mysqli_num_rows($re);
                        $date= date("Y-m-d");
						while($row= mysqli_fetch_array($re)) {
							$id = $row['sl'];
							$checkdata[] = $row['check_in'];
							$checkoutdata[] = $row['check_out'];
						}
						$i=0;	

						//if( (($checkin < $checkdata[$i])&&($checkout < $checkdata[$i])) || (($checkin > $checkoutdata[$i])&&($checkout > $checkoutdata[$i])) )
						//if( ( (($checkin < $checkdata[$i])&&($checkout < $checkdata[$i])) || (($checkin > $checkoutdata[$i])&&($checkout > $checkoutdata[$i])) ) || ( (($checkin < $checkdata[$i+1])&&($checkout < $checkdata[$i+1])) || (($checkin > $checkoutdata[$i+1])&&($checkout > $checkoutdata[$i+1])) )||  ( (($checkin < $checkdata[$i+2])&&($checkout < $checkdata[$i+2])) || (($checkin > $checkoutdata[$i+2])&&($checkout > $checkoutdata[$i+2])) ) )	

						if($number == 0) {
							if( ($checkin > $date) || ( $checkout > $date)  )
							{ ?>
								
							<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>This bed is available for booking within this date. Please continue ..</b>
								</div></center> 
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">Booking Information</div>
								<div class="panel-body">
									<form action="payment.php" method="post">
										<div class="form-group">
											<label> Check In </label>
											<input type="hidden" class="form-check-input" name="bed_id" value="<?php echo $bedid;?>">
											<input type="hidden" class="form-check-input" name="roombedding" value="<?php echo $roombedding;?>">
											<input type="hidden" class="form-check-input" name="bedname" value="<?php echo $bedname;?>">
											<input type="text" name="checkin" class="form-control" value="<?php echo $checkin;?>" readonly />
										</div>

										<div class="form-group">
											<label> Check Out </label>
											<input type="text" name="checkout" class="form-control" value="<?php echo $checkout;?>" readonly />

										</div>

										<div class="form-group">
											<label> Booking Price </label>
											<input type="text" name="price" class="form-control" value="<?php echo $price;?>" readonly />

										</div>

										<div class="col-md-4">
											Free services
											<hr/> Wifi
											<br> AC
										</div>

										<div class="col-md-8">
											Extra services
											<hr/>
											<?php if( $ac == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" name="ac" value="yes">
													<input type="checkbox" class="form-check-input" name="acprice" value="<?php echo $acprice;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Tour guide (BDT <?php echo $acprice;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $meal == "yes") { ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="meal" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="mealprice" value="<?php echo $meal_price;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Daily Meal package (BDT
														<?php echo $meal_price;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $body_message == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="bodymsg" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="bodymsgprice" value="<?php echo $body_message_per_day;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Body massage (spa) (BDT <?php echo $body_message_per_day;?>/- per day)</label>
												</div>
											<?php }?>
											<br><br>
										</div>

										<div class="form-group">
											<center><input type="submit" name="next" value="Continue1" class="btn btn-primary" /> </center>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


							
								
							<?php }
							else
							{
								
								echo "
								<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>Date is invalid</b>
								</div></center>";
							}
				
							
							 
								 
				?>
				
				
                <?php
					} else if($number == 1) {
						if((($checkin < $checkdata[$i])&&($checkout < $checkdata[$i])) || (($checkin > $checkoutdata[$i])&&($checkout > $checkoutdata[$i])) ){ 
							
							if( ($checkin > $date) || ( $checkout > $date)  )
							{ ?>
								
							<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>This bed is available for booking within this date. Please continue ..</b>
								</div></center> 
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">Booking Information</div>
								<div class="panel-body">
									<form action="payment.php" method="post">
										<div class="form-group">
											<label> Check In </label>
											<input type="hidden" class="form-check-input" name="bed_id" value="<?php echo $bedid;?>">
											<input type="hidden" class="form-check-input" name="roombedding" value="<?php echo $roombedding;?>">
											<input type="hidden" class="form-check-input" name="bedname" value="<?php echo $bedname;?>">
											<input type="text" name="checkin" class="form-control" value="<?php echo $checkin;?>" readonly />
										</div>

										<div class="form-group">
											<label> Check Out </label>
											<input type="text" name="checkout" class="form-control" value="<?php echo $checkout;?>" readonly />

										</div>

										<div class="form-group">
											<label> Booking Price </label>
											<input type="text" name="price" class="form-control" value="<?php echo $price;?>" readonly />

										</div>

										<div class="col-md-4">
											Free services
											<hr/> Wifi
											<br> AC
										</div>

										<div class="col-md-8">
											Extra services
											<hr/>
											<?php if( $ac == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" name="ac" value="yes">
													<input type="checkbox" class="form-check-input" name="acprice" value="<?php echo $acprice;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Tour guide (BDT <?php echo $acprice;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $meal == "yes") { ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="meal" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="mealprice" value="<?php echo $meal_price;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Daily Meal package (BDT
														<?php echo $meal_price;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $body_message == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="bodymsg" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="bodymsgprice" value="<?php echo $body_message_per_day;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Body massage (spa) (BDT <?php echo $body_message_per_day;?>/- per day)</label>
												</div>
											<?php }?>
											<br><br>
										</div>

										<div class="form-group">
											<center><input type="submit" name="next" value="Continue" class="btn btn-primary" /> </center>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


							
								
							<?php }
							else
							{
								
								echo "
								<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>Date is invalid</b>
								</div></center>";
							}
				
							
							 
								 
				?>
							

                                    <?php  }
				else
				{
					 echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This bed is not available for booking .please choose another date.</b>
															</div></center>";

				}

		  }

		  else if( $number == 2)

			  {

				if( (($checkin < $checkdata[$i])&&($checkout < $checkdata[$i])) || (($checkin > $checkoutdata[$i])&&($checkout > $checkoutdata[$i]) && ($checkin < $checkdata[$i+1])&&($checkout < $checkdata[$i+1])) || (($checkin > $checkoutdata[$i+1])&&($checkout > $checkoutdata[$i+1]) )    )

						{

                            if( ($checkin > $date) || ( $checkout > $date)  )
							{ ?>
								
							<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>This bed is available for booking within this date. Please continue ..</b>
								</div></center> 
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">Booking Information</div>
								<div class="panel-body">
									<form action="payment.php" method="post">
										<div class="form-group">
											<label> Check In </label>
											<input type="hidden" class="form-check-input" name="bed_id" value="<?php echo $bedid;?>">
											<input type="hidden" class="form-check-input" name="roombedding" value="<?php echo $roombedding;?>">
											<input type="hidden" class="form-check-input" name="bedname" value="<?php echo $bedname;?>">
											<input type="text" name="checkin" class="form-control" value="<?php echo $checkin;?>" readonly />
										</div>

										<div class="form-group">
											<label> Check Out </label>
											<input type="text" name="checkout" class="form-control" value="<?php echo $checkout;?>" readonly />

										</div>

										<div class="form-group">
											<label> Booking Price </label>
											<input type="text" name="price" class="form-control" value="<?php echo $price;?>" readonly />

										</div>

										<div class="col-md-4">
											Free services
											<hr/> Wifi
											<br> AC
										</div>

										<div class="col-md-8">
											Extra services
											<hr/>
											<?php if( $ac == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" name="ac" value="yes">
													<input type="checkbox" class="form-check-input" name="acprice" value="<?php echo $acprice;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Tour guide (BDT <?php echo $acprice;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $meal == "yes") { ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="meal" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="mealprice" value="<?php echo $meal_price;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Daily Meal package (BDT
														<?php echo $meal_price;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $body_message == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="bodymsg" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="bodymsgprice" value="<?php echo $body_message_per_day;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Body massage (spa) (BDT <?php echo $body_message_per_day;?>/- per day)</label>
												</div>
											<?php }?>
											<br><br>
										</div>

										<div class="form-group">
											<center><input type="submit" name="next" value="Continue" class="btn btn-primary" /> </center>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


							
								
							<?php }
							else
							{
								
								echo "
								<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>Date is invalid</b>
								</div></center>";
							}
				
							
							 
								 
				?>

                                        <?php }	
						else{
							 echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This bed is not available for booking .please choose another date.</b>
															</div></center>";	
						}

			  }

			   else if( $number == 3)

			  {

				if( (($checkin < $checkdata[$i])&&($checkout < $checkdata[$i])) || (($checkin > $checkoutdata[$i])&&($checkout > $checkoutdata[$i]) && ($checkin < $checkdata[$i+1])&&($checkout < $checkdata[$i+1])) || (($checkin > $checkoutdata[$i+1])&&($checkout > $checkoutdata[$i+1]) && ($checkin < $checkdata[$i+2])&&($checkout < $checkdata[$i+2])) || (($checkin > $checkoutdata[$i+2])&&($checkout > $checkoutdata[$i+2]) )   )

						{

                            if( ($checkin > $date) || ( $checkout > $date)  )
							{ ?>
								
							<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>This bed is available for booking within this date. Please continue ..</b>
								</div></center> 
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-info">
								<div class="panel-heading">Booking Information</div>
								<div class="panel-body">
									<form action="payment.php" method="post">
										<div class="form-group">
											<label> Check In </label>
											<input type="hidden" class="form-check-input" name="bed_id" value="<?php echo $bedid;?>">
											<input type="hidden" class="form-check-input" name="roombedding" value="<?php echo $roombedding;?>">
											<input type="hidden" class="form-check-input" name="bedname" value="<?php echo $bedname;?>">
											<input type="text" name="checkin" class="form-control" value="<?php echo $checkin;?>" readonly />
										</div>

										<div class="form-group">
											<label> Check Out </label>
											<input type="text" name="checkout" class="form-control" value="<?php echo $checkout;?>" readonly />

										</div>

										<div class="form-group">
											<label> Booking Price </label>
											<input type="text" name="price" class="form-control" value="<?php echo $price;?>" readonly />

										</div>

										<div class="col-md-4">
											Free services
											<hr/> Wifi
											<br> AC
										</div>

										<div class="col-md-8">
											Extra services
											<hr/>
											<?php if( $ac == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" name="ac" value="yes">
													<input type="checkbox" class="form-check-input" name="acprice" value="<?php echo $acprice;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Tour guide (BDT <?php echo $acprice;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $meal == "yes") { ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="meal" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="mealprice" value="<?php echo $meal_price;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Daily Meal package (BDT
														<?php echo $meal_price;?>/- per day)</label>
												</div>
											<?php } ?>
											<?php if( $body_message == "yes"){ ?>
												<div class="form-check">
													<input type="hidden" class="form-check-input" name="bodymsg" value="yes" id="exampleCheck1">
													<input type="checkbox" class="form-check-input" name="bodymsgprice" value="<?php echo $body_message_per_day;?>" id="exampleCheck1">
													<label class="form-check-label" for="exampleCheck1">Body massage (spa) (BDT <?php echo $body_message_per_day;?>/- per day)</label>
												</div>
											<?php }?>
											<br><br>
										</div>

										<div class="form-group">
											<center><input type="submit" name="next" value="Continue" class="btn btn-primary" /> </center>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>


							
								
							<?php }
							else
							{
								
								echo "
								<center> <div class='alert alert-success'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<b>Date is invalid</b>
								</div></center>";
							}
                                           
						} else {
							 echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This bed is not available for booking .please choose another date.</b>
															</div></center>";	
						}

			  }
						 ?>

                                                <?php	

			}

			?>

                        </div>

                        <?php

			}

			else{ ?>

                            <h3 class="title-w3-agileits title-black-wthree">No data to show</h3>

                            <?php	}
         ?>

                    </div>

                    <?php

		?>
            </div>
        </div>
        <!--// rooms & rates -->
        <!-- visitors -->
        <?php include"footer.php";?>