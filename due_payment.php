<?php


include('db.php');
include('repository/DuePaymentRepo.php');


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
                        <a href="due_payment.php"><i class="fa fa-desktop"></i> Due payment</a>
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
									$sl = 0;
									
									$due= 0;
									$payment=new Payment();
                                    $tre=$payment->getAll();
									while($row=mysqli_fetch_array($tre) )
									{	
											
										
										$total1 = $row['total'];
										
										$due= $due + $total1; 
									}
									
									?>
									
									
					<div class="row">
								 <div class="col-md-4" style="background-color:#75c6bb;margin-bottom:10px;margin-left:30px;">
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h1>Due Amount</h1>
																			  </div>

																			  <div class="cardContainer">
																				<p><b> <?php echo $due;?> </b></p>
																			  </div>
																			  </center>
																		</div> 
																

																</div>
                     </div>					
									

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
                                           

											
											
											<a  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-info"  type="button">
											<i class="far fa-sun"> Due payment </i>	<span class="badge"><?php
						include ('db.php');
						
					   $re=$payment->getAll();
						
						$number1 = mysqli_num_rows($re);
						
						echo $number1;			
									

						
				?></span>
											</button>
											</a>
											
											
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 
                                   <thead>
                                        <tr>
                                            <th>#</th>
											<th> Image</th>
                                            <th>Customer Name</th>
                                            
											<input type="hidden" name="te"  id="first_name" value="2019-06-21 23:50:15"/>
                                           
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											
											
											<th>Due amount</th>
											<th>Remaining time</th>
											
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									
									
									
                                           $tre=$payment->getAllDese();
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
										$bed_id =$row['bed_id'];
										$date =$row['date'];
										$sl++;
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="images/user/<?php echo $image;?>" height="70px"width="80px"  />  </td>
									<td> <?php echo $cusname;?> </td>
									
									<td> <?php echo $bedno;?> </td>
									<td> <?php echo $checkin;?> </td>
									<td> <?php echo $checkout;?> </td>
									
									<td> <?php echo $total;?> </td>
									<td> <?php
										$d1 = $date;
										$td = date("Y-m-d");
										
										$expired =date("Y-m-d",strtotime(date("Y-m-d",strtotime($d1))."+ 1 day " ));
										$expired1 =date("Y-m-d",strtotime(date("Y-m-d",strtotime($d1))."+ 2 day " ));
										if($td <= $expired )
										{ ?>
										
										You have exactly 1 day
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
										
										?> </td>
									
<script>
// Set the date we're counting down to
 
var countDownDate = new Date("2019-06-29 0:0:0").getTime();

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
									<td> <?php 
									
									if($status == 0)
									{
										echo "<b style='color:red;'>Unpaid</b>";
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
									<td> <a href="paynow.php?rid=<?php echo $id;?>" class="btn btn-primary" > Pay Now</a> </td>
									
									
									
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