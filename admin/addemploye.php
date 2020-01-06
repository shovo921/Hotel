<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
		
	<style>
	
	.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
        .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:20%; text-align:center;}
.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
body{ background: #EDECEC; }

@media all and (max-width:724px){
.nav-tabs > li > a > span {display:none;}	
.nav-tabs > li > a {padding: 5px 5px;}
}

	
	
	</style>
		
		
		
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Manage Employe </small>
                        </h1>
                    </div>
					

					
					
                </div>
                <!-- /. ROW  -->
				<?php
						include ('db.php');
						$sql = "select * from booking where statas = 0";
						$re = mysqli_query($con,$sql);
						
						$number = mysqli_num_rows($re);
						
									
									

						
				?>
				
			
				
				

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
						
						
						
					
  <div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Employee</span></a></li>
       
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
		  
		 <form action ="" method="post" enctype="multipart/form-data" >
		 
		 <div class="form-group">
		 <label > Full Name </label>
			<input type="text" name="name" value="" class="form-control" >
		 
		 
		 </div>
		  <div class="form-group">
		 <label > Empolye image </label>
			<input type="file" name="image" value="" class="form-control" >
		 
		 
		 </div>
		  <div class="form-group">
		 <label > Employe mobile </label>
			<input type="text" name="mobile" value="" class="form-control"  >
		 
		 
		 </div>
		 
		  <div class="form-group">
		 <label > Email </label>
			<input type="email" name="email" value="" class="form-control"  >
		 
		 
		 </div>
		  <div class="form-group">
		 <label > Employe Address </label>
			<input type="text" name="address" value="" class="form-control"  >
		 
		 
		 </div>
		 
		 <div class="form-group">
		 <label > Joining Date</label>
			<input type="date" name="join_date" value="" class="form-control"  >
		 
		 
		 </div>
		 
		  <div class="form-group">
		 <label > Sallary</label>
			<input type="text" name="salary" value="" class="form-control"  >
		 
		 
		 </div>
		 
		 <input type="submit" name="add" value="Submit" class="btn btn-primary"  />
		 
		 </form>
		  
		  
		  
		  
		  <?php
		  
		  if(isset($_POST["add"]))
		  {
			  $name = $_POST["name"];
			   
			    $mobile = $_POST["mobile"];
				$email = $_POST["email"];
				$address = $_POST["address"];
				$salary = $_POST["salary"];
				
				$join_date = $_POST["join_date"];
				
				
				
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
											 move_uploaded_file($file_tmp,"../images/employee/".$file_name);
											 echo "success";
										  }else{
											 print_r($errors);
										  }

									$sql ="INSERT INTO `employee`( `username`, `image`,`email`,`mobile`,`address`,`salary`,`join_date`) VALUES ('$name','$file_name','$email','$mobile','$address','$salary','$join_date')" ;
										if(mysqli_query($con,$sql))
										{
										 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>Employe  is added successfullly</b>
															</div></center>";
                                            
                                           ?>
                                                            <script type="text/javascript">

function Redirect() {
window.location="employee.php";
}
document.write("<center>You will be redirected to main page in 1 sec.</center>");
setTimeout('Redirect()', 1000);
//-->
</script> 
                                          
                <?php                            
															
										}	
 
			  
		  }
		  
		  ?>
		  	
		  
		  
		  </div>

         
         
        </div>
      </div>
    </div>
  </div>
				
	<script>
// Set the date we're counting down to

var countDownDate = new Date("2019-06-19 23:20:12").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> 					
						
						
						
						
						
						
						
						
						
						
						
						
						
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
