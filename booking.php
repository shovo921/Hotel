<?php


include('db.php');
include('repository/BookingRepo.php');

if(!isset($_SESSION['userId']))
{
	
	header('location: login.php');	
}

?>
<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard	</title>
    <!-- Bootstrap Styles-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="admin/assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">  Dashboard </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
			<b style="color:#fff"> Login as: </b> <span class="badge"> <?php echo $_SESSION["name"]; ?> </span>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
				
					
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					 <li>
                        <a class="active-menu" href="index.php"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li>
                        <a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
					 <li>
                        <a href="booking.php"><i class="fa fa-desktop"></i> Booking</a>
                    </li>
                    <li>
                        <a href="due_payment.php"><i class="fa fa-desktop"></i>  Payment</a>
                    </li>
					
                    
					
                   


                    
					</ul>

            </div>

        </nav>
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
				       
                
                        $booking= new BookingRepo();
                        $re = $booking->getAll();
						
						
						$number1 = mysqli_num_rows($re);
						
						
									
									

						
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
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												 Pending Room Bookings  <span class="badge"><?php echo $number1 ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                             <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
											
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Meal</th>
											<th>AC</th>
											
											<th>Price</th>
											
											<th>Status</th>
											
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									
									   $tre = $booking->getAll();
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
									
									
									?>
                                      <tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="images/user/<?php echo $image;?>" height="70px"width="80px"  />  </td>
									<td> <?php echo $cusname;?> </td>
									<td> <?php echo $email;?> </td>
									
									<td> <?php echo $bedno;?> </td>
									<td> <?php echo $checkin;?> </td>
									<td> <?php echo $checkout;?> </td>
									<td> <?php echo $meal;?> </td>
									<td> <?php echo $ac;?> </td>
									<td> <?php echo $total;?> </td>
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
                                
					
                                $re=$booking->getAll();
						
						$number1 = mysqli_num_rows($re);
						
									
									

						
				?>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
											<button class="btn btn-primary" type="button">
												Current Booked Rooms  
											</button>
											
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
										
										
										<?php
									$sl = 0;
									$dateorder = date("Y-m-d");
									$tre=$booking->getdisc();
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
															<img src="images/user/<?php echo $image ;?>" height="70px" width="130px" />
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
													<i class="fa fa-print" aria-hidden="true"></i>
													</button></a>
															Bed NO: <b> <?php echo $bedno ;?> </b>
														</div>
													</div>	
											</div>

											
										<?php	}
										else {
											echo"You have no current room booking.";
											
										}
											
											?>
											
															
									<?php }


									?>									
					
				
										
                                           
										</div>
										
                                    </div>
									
                                </div>
                               
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
			
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="admin/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="admin/assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="admin/assets/js/custom-scripts.js"></script>


</body>

</html>