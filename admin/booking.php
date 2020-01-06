<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
		
	<style>
	
	.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
        .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:20%; text-align:center;}
.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
body{ background: #EDECEC; }

@media all and (max-width:724px){
.nav-tabs > li > a > span {display:none;}	
.nav-tabs > li > a {padding: 5px 5px;}
}
	</style>
		
		
		
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
					

					
					
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
						$sql = "select * from booking where statas = 0";
						$re = mysqli_query($con,$sql);
						
						$number = mysqli_num_rows($re);
						
									
									

						
				?>
				
				
				
								<?php
						include ('db.php');
						
						$dateorder = date("Y-m-d");
						$sql = "select * from booking where statas = 1 AND check_in >= '$dateorder'";
						$re = mysqli_query($con,$sql);
						
						$number1 = mysqli_num_rows($re);
						
									
									

						
				?>
				
				
				 <?php
								
								$fsql = "SELECT * FROM `booking` where statas = 2";
								$fre = mysqli_query($con,$fsql);
								$f =0;
								while($row=mysqli_fetch_array($fre) )
								{
										$f = $f + 1;
								
								}
						
								?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
						
						
						
					
  <div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Pending Room Booking</span><span class="badge"><?php echo $number ; ?></span></a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>Current Booking Rooms</span><span class="badge"><?php echo $number1 ; ?></span></a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-envelope-o"></i>  <span>Previous Booking</span><span class="badge"><?php echo $f ; ?></span></a></li>
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
		  
		  
	 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            
											
                                           
											
											<th>Check In</th>
											<th>Check Out</th>
											<th>Account number</th>
											
											
											<th>Due amount</th>
											<th>Payment status</th>
											<th>Remaining time</th>
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									
									$tsql = "select * from booking where statas = 0 ORDER BY id DESC";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										$cusname = $row['cus_name'];
										
										$mobile = $row['mobile'];
										$image = $row['image'];
										$bedno = $row['bed_no'];
										$checkin = $row['check_in'];
										$checkout = $row['check_out'];
										$accnmbr = $row['account_number'];
										$tnxid = $row['transaction_id'];
										$user_id = $row['user_id'];
										$status = $row['statas'];
										$total = $row['total'];
										$bed_id =$row['bed_id'];
										$date =$row['date'];
										$sl++;
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="../images/user/<?php echo $image;?>" height="40px"width="40px"  />  </td>
									
									
									
									<td> <?php echo $cusname;?> </td>
									<td> <?php echo $checkin;?> </td>
									<td> <?php echo $checkout;?> </td>
									<td> <?php echo $accnmbr;?> </td>
									
									<td> <?php echo $total;?> </td>
									<td> <?php 
									
									if(($accnmbr =='none') || ($tnxid =='none'))
									{
										echo "<b style='color:red;'> UnPaid</b>";
									}
									if(($accnmbr !='none') && ($tnxid !='none'))
									{
										echo "<b style='color:green;'> Paid</b>";
									}
									
									
									?> </td>
									
									
									<td> 


									<?php
										$d1 = $date;
										$td = date("Y-m-d");
										
										$expired =date("Y-m-d",strtotime(date("Y-m-d",strtotime($d1))."+ 1 day " ));
										$expired1 =date("Y-m-d",strtotime(date("Y-m-d",strtotime($d1))."+ 2 day " ));
										if($td <= $expired )
										{ ?>
										
										Remaining 1 day
										<?php }
										if($td > $expired )
										{
										echo "<b style='color:red;'> Time expired </b>";
											$tsql = "select * from reservation where bed_no = '$bed_id' AND check_in = '$checkin' AND check_out = '$checkout'";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$eid = $row['sl'];
										echo $eid;
									}
							
							$sql2 = "DELETE FROM reservation WHERE sl = '$eid' ";	
								if(mysqli_query($con,$sql2))
								{
									echo"Your booking has been cancelled.If you need booking please contact with admin.";
								}

												
										}
										
										
										
										
										if($td > $expired1 )
										{
										echo "<b style='color:red;'> Time expired </b>";
											$tsql = "select * from booking where bed_id = '$bed_id' AND check_in = '$checkin' AND check_out = '$checkout'";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$breid = $row['id'];
										echo $breid;
									}
							
							$sql2 = "DELETE FROM booking WHERE id = '$breid' ";	
								if(mysqli_query($con,$sql2))
								{
									echo"Your booking has been cancelled.If you need booking please contact with admin.";
								}

												
										}
										
										?> 


									</td>
									<td> <?php 
									
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
									
									?> </td>
									<td> <a href="roombook.php?rid=<?php echo $id;?>" class="btn btn-primary" > Action</a> </td>
									
									
									
									</tr>
									
									<?php }
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
		  
		  
		  
		  
		  
		  </div>
          <div role="tabpanel" class="tab-pane" id="profile">
		  
		  
		  
											<?php
									$sl = 0;
									$dateorder = date("Y-m-d");
									$tsql = "select * from booking where statas = 1   ORDER BY id DESC";
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
										
										$sl++;
									
										


											if( $dateorder <= $checkin)
												
											
											{ ?>
											

										<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<img src="../images/user/<?php echo $image ;?>" height="70px" width="130px" />
															<h3><?php echo $cusname ;?></h3><br>
															Check in:<?php echo $checkin ;?> <br>
															Checkout : <?php echo $checkout ;?> <br>
															Number of days: <?php
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
															Price : <?php echo $total ;?><br>
														</div>
														<div class="panel-footer back-footer-blue">
														<a href="show.php?sid=<?php echo $id;?>" ><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Show
													</button></a>
													<a href="roombook.php?rid=<?php echo $id;?>" class="btn btn-primary" > Edit</a>
															Bed NO: <b> <?php echo $bedno ;?> </b>
														</div>
													</div>	
											</div>

											
										<?php	}
										
											
											?>
											
															
									<?php }


									?>	
				
		  
		  
		  
		  </div>
          <div role="tabpanel" class="tab-pane" id="messages">
		  
		  <div class="table-responsive">
                                <table class="table">
                                     <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            
											
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Account number</th>
											
											
											<th>Due amount</th>
											<th>Payment status</th>
											
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									
									$tsql = "select * from booking where statas = 2 ORDER BY id DESC";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										$cusname = $row['cus_name'];
										
										$mobile = $row['mobile'];
										$image = $row['image'];
										$bedno = $row['bed_no'];
										$checkin = $row['check_in'];
										$checkout = $row['check_out'];
										$accnmbr = $row['account_number'];
										$tnxid = $row['transaction_id'];
										$user_id = $row['user_id'];
										$status = $row['statas'];
										$total = $row['total'];
										
										$sl++;
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="../images/user/<?php echo $image;?>" height="40px"width="40px"  />  </td>
									<td> <?php echo $cusname;?> </td>
									
									
									<td> <?php echo $bedno;?> </td>
									<td> <?php echo $checkin;?> </td>
									<td> <?php echo $checkout;?> </td>
									<td> <?php echo $accnmbr;?> </td>
									
									<td> <?php echo $total;?> </td>
									<td> <?php 
									
									if(($accnmbr =='none') || ($tnxid =='none'))
									{
										echo "<b style='color:red;'> UnPaid</b>";
									}
									if(($accnmbr !='none') && ($tnxid !='none'))
									{
										echo "<b style='color:green;'> Paid</b>";
									}
									
									
									?> </td>
									
									
									
									<td> <?php 
									
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
									
									?> </td>
									<td> <a href="show.php?sid=<?php echo $id;?>" ><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Show
													</button></a> </td>
									
									
									
									</tr>
									
									<?php }
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
		  
		  
		  
		  </div>
         
        </div>
      </div>
    </div>
  </div>
				
	<script>
// Set the date we're counting down to

var countDownDate = new Date("2019-06-19 23:20:12").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> 					
						
						
						
						
						
						
						
						
						
						
						
						
						
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
				<!-- DEOMO-->
				
										
                    

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