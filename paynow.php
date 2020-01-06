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
					
                    
                   
					
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
			<?php
                $id = $_GET["rid"];
				
				
				$tsql = "select * from booking where id = $id";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										$bed_no = $row['bed_no'];
										$check_in = $row['check_in'];
										
										$check_out = $row['check_out'];
										$total = $row['total'];
										$statas = $row['statas'];
										$account_number = $row['account_number'];
										$transaction_id = $row['transaction_id'];
										$comission = $row['comission'];
										$earn = $row['earn'];
										$cus_name = $row['cus_name'];
										$email = $row['email'];
										$mobile = $row['mobile'];
										
										
					
				
				
				}
             ?>
                <div class="row">
				
				<div class="col-md-6 ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                         Customer Details
                        </div>
                        <div class="panel-body">
						<b> Customer name: </b> <?php echo $cus_name;?> <br>
						
						<b>Email :</b> <?php echo $email;?> <br>
						<b>Mobile: </b> <?php
						
						echo $mobile;
					?> <br>
					<b>CheckIn: </b> <?php
						
						echo $check_in;
					?> <br>
					<b>CheckOut: </b> <?php
						
						echo $check_out;
					?> <br>
					
				
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
				
				
					
					
					
					<div class="col-md-6 ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          Order  summary
                        </div>
                        <div class="panel-body">
						<b> Due amount:  BDT </b> <?php echo $total;?> TK <br>
					
						
						
						
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
					
					
					
					
					<div class="col-md-12 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Payment area
                        </div>
                        <div class="panel-body">
						
						
						<h3 style="color:red;"> Pay The due amount to this bkash number ( 01303802470   )  </h3><br>
						<b> Due amount:  BDT </b> <?php echo $total;?> TK <br>
						
						
						
						
						<form  action="" method="post">
						
						
						
						<div class="form-group">
						<label> Due amount </label>
						<input type="text" name="" value="<?php echo $total;?>" class="form-control" readonly>
						</div> 
						<div class="form-group">
						<label> Account number </label>
						<input type="text" name="accnmbr" value="" class="form-control" required>
						</div>
						
						<div class="form-group">
						<label> Transaction id </label>
						<input type="text" name="tnxid" value="" class="form-control" required>
						</div>
						
						<div class="form-group">
						
						<center> <input type="submit" name="paynow" value="Confirm Payment" class="btn btn-primary" required> </center>
						</div>
						
						</form>
						
                        
						
						</div>
                        <div class="panel-footer">
                           
								<?php
								$rid = $_GET["rid"];
								if(isset($_POST["paynow"]))
								{
									$accnmbr = $_POST["accnmbr"];
									$tnxid = $_POST["tnxid"];
									
									$sql = "UPDATE booking SET account_number ='$accnmbr',transaction_id ='$tnxid' WHERE id = '$rid' ";
	
											if(mysqli_query($con,$sql)){
												echo "<div class='alert alert-info'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Payment  is successfull</b>
                                                                <mark>If your booking is not confirm around 1 hours .phease contact with Us  </mark>
                                                                <b> Thank you Mr </b>
                                                                
														</div>";
												
												
												?>
											
										
										<?php
											}
									
								}
								?>
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