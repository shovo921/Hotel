<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
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
						$dateorder = date("Y-m-d");
						echo $dateorder;
						$sql = "select * from booking where check_in = '$dateorder' AND statas = 1";
						$re = mysqli_query($con,$sql);
						
						$number = mysqli_num_rows($re);
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo1">
											<button class="btn btn-default" type="button">
												Recent checkin  <span class="badge"><?php echo $number ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo1" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
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
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            
											
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											
											
											
											<th>Due amount</th>
											<th>Payment status</th>
											
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									$tsql = "select * from booking where check_in = '$dateorder' AND statas = 1";
									
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
									<td> <a href="roombook.php?rid=<?php echo $id;?>" class="btn btn-primary" > Action</a> </td>
									
									
									
									</tr>
									
									<?php }
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                </div>
							
							
							<?php
						include ('db.php');
						$dateorder = date("Y-m-d");
						echo $dateorder;
						$sql = "select * from booking where check_out = '$dateorder' AND statas = 1";
						$re = mysqli_query($con,$sql);
						
						$number1 = mysqli_num_rows($re);
						
									
									

						
				?>
							
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												Recent Checkout  <span class="badge"><?php echo $number1 ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
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
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            
											
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											
											
											
											<th>Due amount</th>
											<th>Payment status</th>
											
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									$tsql = "select * from booking where check_out = '$dateorder' AND statas = 1";
									
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
									<td> <a href="roombook.php?rid=<?php echo $id;?>" class="btn btn-primary" > Action</a> </td>
									
									
									
									</tr>
									
									<?php }
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
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