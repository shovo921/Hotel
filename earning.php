<?php

session_start();
include('db.php');


if(!isset($_SESSION['userId']))
{
	
	header('location: login/index.php');	
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

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
					<li>
                        <a href="earning.php"><i class="fa fa-bar-chart-o"></i> Reservation  Statistic</a>
                    </li>
                    
                   
					
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			<?php
          $id = $_SESSION["userId"];
				
				
				$tsql = "select * from marchant_login where id = $id";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										$fullname = $row['fullname'];
										$username = $row['username'];
										
										$email = $row['email'];
										$mobile = $row['mobile'];
										$address = $row['address'];
										$city = $row['city'];
										$comission = $row['comission'];
										$status = $row['status'];
										
					
				
				
				}
             ?>
                <div class="row">
				
				<div class="col-md-12 ">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
						
						<b> username:</b> <?php echo $username;?> <br>
						<b>Email :</b> <?php echo $email;?> <br>
						<b>Mobile: </b> <?php
						
						echo $mobile;
					?> <br>
				
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
				
				<?php
									$sl = 0;
									$sell = 0;
									$earning = 0;
									
									$tsql = "select * from booking where user_id = $id AND statas = 1 ";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
											
										
										$total = $row['total'];
										$earn = $row['earn'];
										$sl++;
										$sell = $sell + ($total+$earn);
										$earning = $earning +$earn;
										 
									}
									
									?>
									
									
									
									
									
									
									<?php
									$sl = 0;
									
									$due= 0;
									$tsql = "select * from booking where user_id = $id AND statas = 0 ";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
											
										
										$total1 = $row['total'];
										
										$due= $due + $total1; 
									}
									
									?>
				
                    <div class="col-md-12">
																<div class="col-md-6" style="background-color:#b0aeff;">
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h1>Total sell</h1>
																			  </div>

																			  <div class="cardContainer">
																				<p><?php echo $sell;?></p>
																			  </div>
																			  </center>
																		</div> 
																

																</div>
																
																 
																
																 <div class="col-md-6" style="background-color:#75c6bb;">
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h1>Due Amount</h1>
																			  </div>

																			  <div class="cardContainer">
																				<p><?php echo $due;?></p>
																			  </div>
																			  </center>
																		</div> 
																

																</div>
						
                    </div>
					
					
					<div class="col-md-12 ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Bed-Booking Confirmation
                        </div>
                        <div class="panel-body">
							
							 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 
                                    <thead>
                                        <tr>
                                             <th>#</th>
											<th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
											
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											
											
											<th>price</th>
											<th>Earn</th>
											
											<th>Status</th>
											
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									
									$tsql = "select * from booking where user_id = $id AND statas = 1 ";
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
										$earn = $row['earn'];
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
									
									
									<td> <?php echo $total;?> </td>
									<td> <?php echo $earn;?> </td>
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
                        <div class="panel-footer">
                           
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
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="admin/assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="admin/assets/js/morris/morris.js"></script>
	
	<script src="admin/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="admin/assets/js/custom-scripts.js"></script>
    <!-- Custom Js -->
    <script src="admin/assets/js/custom-scripts.js"></script>


</body>

</html>