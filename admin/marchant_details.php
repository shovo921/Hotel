<?php include"header.php";?>

<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				
				$id = $_GET['rid'];
				
				
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
					
					
				
		
	}
		
		
		
			?> 

        <!-- /. NAV SIDE  -->
		
		
		

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
				
				<div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Marchants  summary
                        </div>
                        <div class="panel-body">
						<b> Marchants name: </b> <?php echo $fullname;?> <br>
						<b> username:</b> <?php echo $username;?> <br>
						<b>Email :</b> <?php echo $email;?> <br>
						<b>Mobile: </b> <?php
						
						echo $mobile;
					?> <br>
				<b>	Commision : <?php echo $comission;?> %<br>
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
				
				
				
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Bed Booking<small>	<?php echo  $curdate; ?> </small>
                        </h1>
						
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
											<th>mobile</th>										
											<th>Bed No</th>
											<th>Check In</th>
											<th>Check Out</th>
											
											
											<th>Sell</th>
											<th>earn</th>
											
											<th>Status</th>
											
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									$userid = $_GET["rid"];
									
									
									$sql = "select * from marchant_login where status = 1 AND id = $userid ";
									$re = mysqli_query($con,$sql);
                                   
									while($row=mysqli_fetch_array($re) )
									{	
										$uid = $row['id'];
										$name = $row['fullname'];
										$email = $row['email'];
										$mobile = $row['mobile'];
										$image = $row['image'];
									}
									
									
									
									
									
									
									$tsql = "select * from booking where statas = 1 AND user_id = $userid ORDER BY id DESC";
									$tre = mysqli_query($con,$tsql);
                                    $totalsell = 0;
									$totalearn = 0;
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										
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
										
										$totalsell = $totalsell + ($total + $earn ) ;
										$totalearn = $totalearn +  $earn;
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="../images/user/<?php echo $image;?>" height="70px"width="80px"  />  </td>
									<td> <?php echo $name;?> </td>
									<td> <?php echo $email;?> </td>
									<td> <?php echo $mobile;?> </td>
									
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
                                  <a href="" class="btn btn-info" > Total sell: <span class="badge" > 
						<?php
						function sell($s)
						{
							
							echo $s;
						}
						sell($totalsell);
						
						?>
						
						</span>
						
						</a>
							<a href="" class="btn btn-info" > Total earn: <span class="badge" > 
						<?php
						function earn($s)
						{
							
							echo $s;
						}
						earn($totalearn);
						
						?>
						
						</span>
						
						</a>		 
									
                                        
                                    </tbody>
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                           
                        </div>
						
						
						
						
						
						
                    </div>
					</div>
					
					
					
                </div>
                <!-- /. ROW  -->
				
                </div>
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
<script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });

</body>

</html>

