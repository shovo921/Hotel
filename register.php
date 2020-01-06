<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register for suite Hotel</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login/css/style.css">
</head>
<body>
<?php  include'header1.php'?>
    <div class="main">
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
				$password= $_POST["password"];
				$password = $password;
				
				
				$errors= array();
										 
										 
										  $file_name = $_FILES['image']['name'];
										  $file_size =$_FILES['image']['size'];
										  $file_tmp =$_FILES['image']['tmp_name'];
										  $file_type=$_FILES['image']['type'];
										  $file_ext= explode('.',$_FILES['image']['name']);
										  $file_ext= strtolower(end($file_ext));
										  
										  $expensions= array("jpeg","jpg","png");
										  
										  if(in_array($file_ext,$expensions)=== false){
											 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
										  }
										  
										  if($file_size > 2097152){
											 $errors[]='File size must be excately 2 MB';
										  }
										  
										  if(empty($errors)==true){
											 move_uploaded_file($file_tmp,"images/user/".$file_name);
											 echo "";
										  }else{
											 print_r($errors);
										  }	


                    $tsql = "select * from marchant_login  where username = '$username' ";
									$tre = mysqli_query($con,$tsql);
									$number = mysqli_num_rows($tre);
									while($row=mysqli_fetch_array($tre) )
									{	
										
										$checkusername = $row['username'];
										
									}
                    if($number > 0)
                    {
						
						echo "<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b> Username <span style='color:red;'>".$username." </span> already exist. Please choose another one. </b>
															</div></center>";
										      		
													
					}
					else{





										  
										  
				$sql = "INSERT INTO `marchant_login`
													(`fullname`, `username`, `email`, `mobile`, `password`, `address`, `city`, `status`, `comission`, `image`) 
													VALUES ('$fullname','$username','$email','$mobile','$password','$address','$city','1','0','$file_name')";
													if (mysqli_query($con,$sql)) {
														echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Registration is completed</b>
															</div></center>
														";
				                                    }
			}	
			}
			?>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="" method="post" enctype="multipart/form-data" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullname" id="name" placeholder="Fullname"required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="user Name"required/>
                            </div>
                             <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="mobile" id="name" placeholder="mobile "required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="address" id="name" placeholder="address "required/>
                            </div>
                            <div class="form-group">
                               <label for="agree-term" class="label-agree-term"><span><span></span></span>Images:</label>
                                <input type="file" name="image" id="agree-term" class="agree-term" required />
                                
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="city" id="name" placeholder="City*"/>
                            </div>
                           
                           
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                          
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="signup" class="form-submit" value="Register" required/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="login/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
       

    </div>
<?php  include'footer.php'?>
    <!-- JS -->
    <script src="login/vendor/jquery/jquery.min.js"></script>
    <script src="login/js/main.js"></script>
</body>
</html>