<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          Add Bed <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-12 col-sm-5">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ADD NEW BED
                        </div>
                        <div class="panel-body"> 
						<form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                            <label>Avialable Rooms*</label>
                                            <select name="roomname"  class="form-control" required>
												<option value selected >select a room</option>
												<?php 
												include ('db.php');
						$sql = "select * from add_room";
						$re = mysqli_query($con,$sql);
						while($row= mysqli_fetch_array($re))
										{
												$id = $row['id'];
												$name = $row['name'];
												
												
											?>
						
                                                <option value="<?php echo $id ;?>"> <?php echo $name ;?></option>
                                               
											   <?php
											   
										}
										?>
										
										
                                            </select>
                              </div>
							  
							
							 
							 
							 
							 
							  
							 
							 
							 
							 
							  <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Bed NO *</label>
                                    <input type="text" name="bednumber" class="form-control" value="" placeholder="Example: RDA109-1" required />         
                                            
                             </div>
							 
							 </div>
							 
							 <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Room Featured image *</label>
                                    <input type="file" name="image" class="form-control" value="" placeholder="enter location" required />        
                                            
                             </div>
							 
							 </div>
							 
							 
							 
							  
							 
							 
							 
							 
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 if(isset($_POST['add']))
							 {
										
										$roomname = $_POST['roomname'];
										$bedno = $_POST['bednumber'];
										
										
										
										
										
										$product_query = "SELECT * FROM bed WHERE room_id = '$roomname' ";
	                                         $run_query = mysqli_query($con,$product_query);
											
											$number= mysqli_num_rows($run_query);
										
										
										
										
										if($number >= 2) {
												echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>There is no free space. 2 bed already available in this room</b>
															</div></center>";
										}

										else
										{
							 
										$product_query = "SELECT * FROM bed WHERE bed_no = '$bedno' ";
	                                         $run_query = mysqli_query($con,$product_query);
											
											$number1= mysqli_num_rows($run_query);
										
										   if($number1 > 0)
										   {
											  
                                                      echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Please change the bed name. bed name already exist</b>
															</div></center>";											  
											   
										   }
										   
										   
										   else
										   
									{
										
										
										
										$errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
										  $file_ext=explode('.',$_FILES['image']['name']);
										  $file_ext=strtolower(end($file_ext));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"../images/bed/".$file_name);
											 echo "success";
										  }else{
											 print_r($errors);
										  }	
										  
										  
										  
										  
										  
										  
										  
										 
										  
										  
										$sql ="INSERT INTO `bed`( `bed_no`, `room_id`,`status`, `bed_image`) VALUES ('$bedno','$roomname','0','$file_name')" ;
										if(mysqli_query($con,$sql))
										{
										 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This bed is added successfullly</b>
															</div></center>";
										}else {
											 echo "
															<center> <div class='alert alert-info'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Bed add failed</b>
															</div></center>";
										}
										
										
									}
							 }
							}
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
            
                    
            
				
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
