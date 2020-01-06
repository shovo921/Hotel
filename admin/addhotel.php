<?php include"header.php";?>
        <!--/. NAV TOP  -->
        
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Add Hotel <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-12 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW HOTEL
                        </div>
                        <div class="panel-body">
						<form name="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                            <label>Country *</label>
                                            <select name="country"  class="form-control" required>
												<option value selected >Select country</option>
                                                <option value="China">China</option>
                                                <option value="Bangladesh">Bangladesh</option>
												<option value="Japan">japan</option>
												
                                            </select>
                              </div>
							 <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Hotel name *</label>
                                    <input type="text" name="hotelname" class="form-control" value="" placeholder="enter hotel name" required />         
                                            
                             </div>
							 
							 </div>
							 
							 <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Hotel address/location *</label>
                                    <input type="text" name="address" class="form-control" value="" placeholder="enter location" required />        
                                            
                             </div>
							 
							 </div>
							 
							 
							  <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Hotel codename *</label>
                                    <input type="text" name="codename" class="form-control" value="" placeholder="enter hotel name" required />        
                                            
                             </div>
							 
							 </div>
							 
							  <div class="col-md-6"> 
							<div class="form-group">
                                            <label>Hotel image *</label>
                                    <input type="file" name="image" class="form-control" value=""  required />        
                                            
                             </div>
							 
							 </div>
							 <div class="col-md-12"> 
							<div class="form-group">
                                         <center>   <label><h4><b> Hotel Services </b> </h4> </label> </center> <hr/>
                                <div class="col-md-6">
								
								<label>Free Services</label> <br>
								<div class="form-check">
										
									<input type="checkbox" class="form-check-input" name="wifi" value="Wifi" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Wifi</label>
								 </div>  
								 
                                 <div class="form-check">
										
									<input type="checkbox" class="form-check-input" name="car_parking" value="Car parking" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Car parking</label>
								 </div>
								 <div class="form-check">
										
									<input type="checkbox" class="form-check-input" name="swiming_pol" value="Swiming pol" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Swiming pol</label>
								 </div>


								</div>
								
								<div class="col-md-6">
								<label>paid Services</label> <br>
								
									<div class="col-md-3">
										<div class="form-check">
									
											<input type="checkbox" class="form-check-input" name="gym" value="Gym" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Gym</label>
										</div>
									
									</div>
									<div class="col-md-9">
										<div class="form-group">
                                            <label>Daily charge</label>
												<input type="text" name="gym_price" class="form-control" value="" placeholder="enter price" />        
														
										</div>
									</div>
								
								
								<div class="col-md-3">
										<div class="form-check">
									
											<input type="checkbox" class="form-check-input" name="meal" value="Meal" id="exampleCheck1">
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
									
											<input type="checkbox" class="form-check-input" name="entertain" value="Entertainment" id="exampleCheck1">
											<label class="form-check-label" for="exampleCheck1">Entertainment</label>
										</div>
									
									</div>
									<div class="col-md-9">
										<div class="form-group">
                                            <label>Daily charge</label>
												<input type="text" name="entertain_price" class="form-control" value="" placeholder="enter price" />        
														
										</div>
									</div>
								 
								
                                 


								</div>
								 
                             </div>
							  
							 </div>
						
							<center> <input type="submit" name="addhotel" value="Add Hotel" class="btn btn-success">  </center>
							</form>
							
                        </div>
                        
                    </div>
					
					
					<?php
							 include('db.php');
							 if(isset($_POST['addhotel']))
							 {
										$country = $_POST['country'];
										$name = $_POST['hotelname'];
										$location = $_POST['address'];
										$codename = $_POST['codename'];
										
										$wifi = $_POST['wifi'];
										$carparking = $_POST['car_parking'];
										$swiming_pol = $_POST['swiming_pol'];
										
										$gym = $_POST['gym'];
										$meal = $_POST['meal'];
										$entertain = $_POST['entertain'];
										
										$gym_price = $_POST['gym_price'];
										$meal_price = $_POST['meal_price'];
										$entertain_price = $_POST['entertain_price'];
										
										
										
										$check="SELECT * FROM hotel WHERE code_name = '$codename' ";
										$rs = mysqli_query($con,$check);
										$data = mysqli_fetch_array($rs, MYSQLI_NUM);
										if($data[0] > 1) {
											echo "
															<center> <div class='alert alert-danger'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>This Hotel already in exist</b>
															</div></center>";
										}

										else
										{
							 
										
										
										
										 $errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
										  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"../images/hotel/".$file_name);
											 echo "";
										  }else{
											 print_r($errors);
										  }	
										
										
										
										
										
										$sql ="INSERT INTO `hotel`( `name`, `location`,`country`,`feature_image`,`status`,`wifi`,`meal`,`meal_price`,`car_parking`,`gym`,`gym_price`,`code_name`,`swiming_pol`) VALUES ('$name','$location','$country','$file_name','1','$wifi','$meal','$meal_price','$carparking','$gym','$gym_price','$codename','$swiming_pol')" ;
										if(mysqli_query($con,$sql))
										{
										echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Hotel is added successfully</b>
															</div></center>";
										}else {
											echo "
															<center> <div class='alert alert-info'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Hotel is not added</b>
															</div></center>";
										}
							 }
							}
							
							?>
					
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
