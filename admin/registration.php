
<html>
<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

</head>

<body>
<div class="container">

			<div class="row" style="background-color:#dbdbdb;">
			<br><br><br>
			<center> <h2> Add employee </h2></center> <hr/>
			
			<div class="col-md-12">
			
			
			<?php
			include"db.php";
			if(isset($_POST["register"]))
			{
				$fullname= $_POST["fullname"];
				$username= $_POST["username"];
				$email= $_POST["email"];
				$mobile= $_POST["mobile"];
				$address= $_POST["address"];
				$city= $_POST["city"];
				
				$sallary = $_POST["sallary"];
				
				
				$errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
										 

										 $file_ext = explode('.',$_FILES['image']['name']);
										  $file_ext=strtolower(end($file_ext));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"../images/user/".$file_name);
											 echo "";
										  }else{
											 print_r($errors);
										  }	 
										  
										  
				$sql = "INSERT INTO `marchant_login`
													(`fullname`, `username`, `email`, `mobile`, `sallary`, `address`, `city`, `status`, `comission`, `image`) 
													VALUES ('$fullname','$username','$email','$mobile','$sallary','$address','$city','1','0','$file_name')";
													if (mysqli_query($con,$sql)) {
														echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Registration is completed</b>
															</div></center>
														";
				                                    }
				
			}
			
			?>
					   
					</div>
			 <form action="" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
					   <div class="form-group">
					   <label > Fullname* </label>
					    <input type="text" name="fullname" class="form-control" value="" required />
					   </div>
					</div>
					
					<div class="col-md-6">
					<label > username* </label>
					<div class="form-group">
					    <input type="text" name="username" class="form-control" value="" required />
					   </div>
				</div>
				
				
				
				<div class="col-md-6">
					   <div class="form-group">
					   <label > Email *</label>
					    <input type="email" name="email" class="form-control" value="" required />
					   </div>
					</div>
					
					<div class="col-md-6">
					<label > Mobile *</label>
					<div class="form-group">
					    <input type="text" name="mobile" class="form-control" value="" required />
					   </div>
				</div>
				
				<div class="col-md-6">
					   <div class="form-group">
					   <label > Address* </label>
					    <input type="text" name="address" class="form-control" value="" required />
					   </div>
				</div>
				
				<div class="col-md-6">
					   <div class="form-group">
					   <label > User Image* </label>
					    <input type="file" name="image" class="form-control" value="" required />
					   </div>
				</div>
					
					<div class="col-md-6">
					<label > city * </label>
					<div class="form-group">
					    <input type="text" name="city" class="form-control" value="" required />
					   </div>
				</div>
				
				
				
				<div class="col-md-6">
					<label > Salary *</label>
					<div class="form-group">
					    <input type="number" name="sallary" class="form-control" value="" required />
					   </div>
				</div>
				
				<div class="col-md-12">
					
					
					    <input type="submit" name="register" class="form-control btn btn-success" value="Register" required />
					<br><br>   
				</div> 
				<center> <a href="marchants.php" class="btn btn-success" >  Back to Deshboard </a> </center>
				</form>
            </div>

</div>


</body>
</html>















































