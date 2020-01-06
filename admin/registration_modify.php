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
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Bed Booking<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Bed-Booking Confirmation
                        </div>
                        <div class="panel-body">
							
							 <form method="post">
							<input type="hidden" name="id" value="<?php echo $id ;?>">
							
							<div class="form-group">
														<label>staff name</label>
														
								<input type="number" name="commision" class="form-control" value="" placeholder="enter commision"   min="0"/>
														
							 </div>
										<div class="form-group">
														<label>Select the Confirmation</label>
														<select name="conf"class="form-control">
															<option value selected>	select an option</option>
															<option value="1">Confirm</option>
															<option value="0">Not Confirm</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Confirm" class="btn btn-success">
							<a href="marchants.php" class="btn btn-primary" > Back </a>
							<input type="submit" name="delete" value="Delete" class="btn btn-danger">
							</form>
                        
					
							
                        </div>
                        <div class="panel-footer">
                           
                        </div>
						
						
						<?php
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							$bid = $_POST['id'];
							$commision = $_POST['commision'];
							
							 $sql = "UPDATE marchant_login SET status = $st,comission = $commision  WHERE id  = '$bid' ";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Marchant status is Updated </b>
				</div>";
					?>
<script type="text/javascript">
<!--
function Redirect() {
window.location="registration_modify.php?rid=<?php echo $id ;?>";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 2000);
//-->
</script>

<?php					
								
					
						}
					
						}			
									
						

						if(isset($_POST['delete']))
						{	
							
							$bid = $_POST['id'];
							
							
							$sql = "DELETE FROM marchant_login WHERE id = '$bid' ";
	
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Marchant  is deleted successfully </b>
				</div>";
					?>
<script type="text/javascript">
<!--
function Redirect() {
window.location="marchants.php";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 2000);
//-->
</script>

<?php					
								
					
						}
					
						}		

						
						?>
						
						
						
                    </div>
					</div>
					
					
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          staff  summary
                        </div>
                        <div class="panel-body">
						<b> staff name: </b> <?php echo $fullname;?> <br>
						<b> username:</b> <?php echo $username;?> <br>
						<b>Email :</b> <?php echo $email;?> <br>
						<b>Mobile: </b> <?php
						
						echo $mobile;
					?> <br>
				<br>
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


</body>

</html>

