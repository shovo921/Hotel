<?php  

ob_start();
?> 

<?php
include('db.php');
$rsql ="select * from add_room";
$rre=mysqli_query($con,$rsql);

?>
<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           DELETE ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Delete room
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Select the Room ID *</label>
                                            <select name="id"  class="form-control" required>
												<option value selected >Select room</option>
												<?php
												while($rrow=mysqli_fetch_array($rre))
												{
												$value = $rrow['id'];
												 echo '<option value="'.$value.'">'.$rrow['name'].'</option>';
												
												}
												?>
                                                
                                            </select>
                              </div>
							  
								
							 <input type="submit" name="del" value="Delete Room" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 
							 if(isset($_POST['del']))
							 {
								$did = $_POST['id'];
								
								
								$sql ="DELETE FROM `add_room` WHERE id = '$did'" ;
								$sql1 ="DELETE FROM `bed` WHERE room_id = '$did'" ;
								if(mysqli_query($con,$sql))
								{
								 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Room deleted successfully</b>
															</div></center>";	
									
								}
								if(mysqli_query($con,$sql1))
								{
								 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Bed of this room deleted automatically</b>
															</div></center>";
										?>
										<script type="text/javascript">
<!--
function Redirect() {
window.location="roomdel.php";
}
document.write("<center>You will be redirected to main page in 2 sec.</center>");
setTimeout('Redirect()', 2000);
//-->
</script>
							<?php	}else {
									 echo "
															<center> <div class='alert alert-info'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Error! please check the sydtem.</b>
															</div></center>";
								}
							 }
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
          
                    
            
				
					</div>
					
					
					
					<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          All Rooms 
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "select * from add_room";
						$re = mysqli_query($con,$sql)
				?>
                <div class="row">
						<div class="panel panel-info">
                        <div class="panel-heading">
                           List of available Rooms
                        </div>
                        <div class="panel-body">
				
				<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['id'];
												$name = $row['name'];
												
												$type = $row['type'];
												$image = $row['image'];
												$price = $row['price'];
												
											?>
												<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<img src="../images/room/<?php echo $image ;?>" height="100px;" width="150px;"/>
															<h3><?php echo $name;?></h3><br>

                                                                    Room type  : <?php if($type == 1){
                                                                echo "<b> Single</b>";
                                                            }
                                                            if($type == 2){
                                                                echo "<b> Double</b>";
				                                                    }?>
															
															
														</div>
														<div class='panel-footer back-footer-blue'>
															Price: <?php echo $price;?>

														</div>
													</div>
												</div>
												
												
												
										<?php
										
											
										}
										
										
									?>
                    </div>
					
					</div>
                </div>
                <!-- /. ROW  -->
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
