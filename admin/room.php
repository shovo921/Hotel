<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Suite Hotel</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include'header.php';?>
<body>
    <div id="wrapper">
       
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           NEW ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-12 col-sm-5">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="panel-body"> 
						<form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                            <label> Hotel Name</label>
                                            <select name="hotelname"  class="form-control" required>
												<option value selected >select hotel</option>
												<?php 
												include ('db.php');
						$sql = "select * from hotel";
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
                                            <label>Room name *</label>
                                    <input type="text" name="roomname" class="form-control" value="" placeholder=" " required />         
                                            
                             </div>
							 <div class="form-group">
                                            <label> ROOM Type</label>
                                            <select name="type"  class="form-control" required>
												<option value selected >select Type</option>
												
						
                                                <option value="1"> Single Room </option>
												
												<option value="2"> Double Room </option>
                                               
											  
										
										
                                            </select>
                              </div>
							</div> 
							 
							  <div class="col-md-6">   
							<div class="form-group">
                                            <label>Bed cost *</label>
                                    <input type="text" name="bedcost" class="form-control" value="" placeholder="enter bed cost" required />         
                                            
                             </div>
							</div> 
							 
							  
							 
							 
							 
							 
							  <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Bed price *</label>
                                    <input type="text" name="price" class="form-control" value="" placeholder="enter bed price" required />         
                                            
                             </div>
							 
							 </div>
							 
							 <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Room Featured image *</label>
                                    <input type="file" name="image" class="form-control" value="" placeholder="enter location" required />        
                                            
                             </div>
							 
							 </div>
							 
							 
							 
							  <div class="col-md-12"> 
							<div class="form-group">
                                         <center>   <label><h4><b> Room Services </b> </h4> </label> </center> <hr/>
                                <div class="col-md-6">
								
								<label>Free Services</label> <br>
								<div class="form-check">
										
									<input type="checkbox" class="form-check-input" name="wifi" value="yes" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Wifi</label>
								 </div>  
								 
                                


								</div>
								
								<div class="col-md-6">
								<label>paid Services</label> <br>
								
									<div class="col-md-3">
										<div class="form-check">
									
											<input type="checkbox" class="form-check-input" name="ac" value="yes" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Ac</label>
										</div>
									
									</div>
									<div class="col-md-9">
										<div class="form-group">
                                            <label>Daily charge</label>
												<input type="text" name="ac_price" class="form-control" value="" placeholder="enter price" />        
														
										</div>
									</div>
								
								
								<div class="col-md-3">
										<div class="form-check">
									
											<input type="checkbox" class="form-check-input" name="meal" value="yes" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Daily meal</label>
										</div>
									
									</div>
									<div class="col-md-9">
										<div class="form-group">
                                            <label>Daily charge</label>
												<input type="text" name="meal_price" class="form-control" value="" placeholder="enter price" />        
														
										</div>
									</div>
								
								  
								<div class="col-md-3">
										<div class="form-check">
									
											<input type="checkbox" class="form-check-input" name="body_massage" value="yes" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Body massage (spa) </label>
										</div>
									
									</div>
									<div class="col-md-9">
										<div class="form-group">
                                            <label>Daily charge</label>
												<input type="text" name="body_massage_price" class="form-control" value="" placeholder="enter price" />        
														
										</div>
									</div>
								 
								
                                 


								</div>
								 
                             </div>
							  
							 </div>
							 
							 
							 
							 
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 if(isset($_POST['add']))
							 {
										$hotelname = $_POST['hotelname'];
										$roomname = $_POST['roomname'];
										$price = $_POST['price'];
										$bedcost = $_POST['bedcost'];
										
										
										
										
										$wifi = $_POST['wifi'];
										
										$ac = $_POST['ac'];
										$meal = $_POST['meal'];
										$body_massage = $_POST['body_massage'];
										
										$ac_price = $_POST['ac_price'];
										$meal_price = $_POST['meal_price'];
										$body_massage_price = $_POST['body_massage_price'];
										$type = $_POST['type'];
										
										
										
										$product_query = "SELECT * FROM add_room WHERE name = '$roomname' ";
	                                         $run_query = mysqli_query($con,$product_query);
											
											$number= mysqli_num_rows($run_query);
										if($number > 0) {
												echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This Room already in exist</b>
															</div></center>";
										}

										else
										{
							 
										$errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
										  $file_ext=strtolower(end(explode('.',$file_name)));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"../images/room/".$file_name);
											 echo "success";
										  }else{
											 print_r($errors);
										  }	
										  
										  
										  
										  
										  
										  
										  
										 
										  
										  
										$sql ="INSERT INTO `add_room`( `name`, `hotel_id`,`price`, `wifi`,`ac`,`ac_per_day`, `body_message`,`body_message_per_day`, `meal`,`meal_per_day`,`image`,`bed_cost`,`type`) VALUES ('$roomname','$hotelname','$price','$wifi','$ac','$ac_price','$body_massage','$body_massage_price','$meal','$meal_price','$file_name','$bedcost','$type')" ;
										if(mysqli_query($con,$sql))
										{
										 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This Room added successfullly</b>
															</div></center>";
										}else {
											 echo "
															<center> <div class='alert alert-info'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Room add failed</b>
															</div></center>";
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
