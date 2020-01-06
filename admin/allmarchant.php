<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>All user </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
						$sql = "select * from marchant_login where status = 0";
						$re = mysqli_query($con,$sql);
						
						$number = mysqli_num_rows($re);
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> users
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" >
							
							
								<?php
						include ('db.php');
						$sql = "select * from marchant_login where status = 1";
						$re = mysqli_query($con,$sql);
						
						$number2 = mysqli_num_rows($re);
						
									
									

						
				?>
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a  href="#collapseOne" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Registerted users  <span class="badge"><?php echo $number2 ; ?></span>
											</button>
											
											</a>
                                        </h4>
                                    </div>
                                    
                                        <div class="panel-body">
										
										
										 <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Fullname</th>
                                            <th>username</th>
											
                                           
											
											<th>Mobile</th>
											<th>Email</th>
											<th>address</th>
											
											
											<th>city</th>
											
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									$tsql = "select * from marchant_login where status = 1 ORDER BY id DESC";
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
										$image = $row['image'];
										
										$sl++;
										
										
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="../images/user/<?php echo $image;?>" height="70px"width="80px"  />  </td>
									<td> <?php echo $fullname;?> </td>
									<td> <?php echo $username;?> </td>
									
									<td> <?php echo $mobile;?> </td>
									<td> <?php echo $email;?> </td>
									<td> <?php echo $address;?> </td>
									
									<td> <?php echo $city;?> </td>
									
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
									<td> <a href="marchant_details.php?rid=<?php echo $id;?>" class="btn btn-primary" > Action</a> </td>
									
									
									
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