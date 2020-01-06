<?php


include('db.php');

include 'repository/loginRepo.php';

if(!isset($_SESSION['userId']))
{
	
	header('location: login.php');	
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
				
                    
                   
					
                   


                    
					</ul>

            </div>

        </nav>
        <?php
         
              
				
				$login= new LoginRepo();
				$re = $login->getAll();// mysqli_query($con,$sql);
									
									while($row=mysqli_fetch_array($re) )
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
                                        $image = $row['image'];
										
					
				
				
				}
             ?>
             	<?php
									$sl = 0;
									$sell = 0;
									$earning = 0;
									
									$tre = $login->get();
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-7">
                        <h1 class="page-header">
                           <img src="images/welcome.jpg" height="200" width="400">
                           <img src="images/user/<?php echo $image;?>" height="200px"width="200px"  /> <br>
                            Welcome  <?php echo $fullname;?> <br><small>Room Booking Dashboard</small>
                        </h1>
                    </div>
                     <div class="col-md-5">
                        
                           <div class="col-md-5" style="background-color:#6663cb;">
																		 <div class="card">
																			<center>  <div class="cardHeader">
																				<h1>Total Pay</h1>
																			  </div>

																			  <div class="cardContainer">
																				<p><?php echo $sell;?></p>
																			  </div>
																			  </center>
																		</div> 
																

																</div>
																
																
																 <div class="col-md-5" style="background-color:#2956aa;">
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
                </div>
                
                <!-- /. ROW  -->
			

					
                <div class="row">
				
				<div class="col-md-12 " >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Users summary
                        </div>
                        
                        
                        <div class="panel-body">
						<b> Users full name: </b> <?php echo $fullname;?> <br>
						<b> username:</b> <?php echo $username;?> <br>
						<b>Email :</b> <?php echo $email;?> <br>
						<b>Mobile: </b> <?php
						
						echo $mobile;
					?> <br>
			
				
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
				
			
				
                   
					
								
			


<script>
// Set the date we're counting down to
var countDownDate = new Date("jun 20, 2019 23:59:59").getTime();

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
    <!-- Custom Js -->
    <script src="admin/assets/js/custom-scripts.js"></script>


</body>

</html>