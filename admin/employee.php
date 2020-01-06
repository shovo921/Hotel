<?php include"header.php";?>

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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Manage employee </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
                $total=0;
						include ('db.php');
						$sql = "select * from marchant_login where status = 0";
						$re = mysqli_query($con,$sql);
						
						$number = mysqli_num_rows($re);
						
									
									

						
				?>
				
				<?php
						include ('db.php');
						$sql = "select * from marchant_login where status = 1";
						$re = mysqli_query($con,$sql);
						
						$number2 = mysqli_num_rows($re);
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Employee
                            
                        </div>
                        <div class="panel-body">
						
						
						
						
						 <div class="row">
    <div class="col-md-12"> 
      <!-- Nav tabs -->
      <div class="card">
        <ul class="nav nav-tabs" role="tablist">
          
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>All employee</span> <span class="badge"></span></a></li>
         
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
		  
				
										 <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>Image</th>
                                            <th>Fullname</th>
                                            
											
                                           
											
											<th>Mobile</th>
											
											<th>Email</th>
											<th>address</th>
											<th>Joining Date</th>
											
											<th>Salary</th>
											
											
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$sl = 0;
									$tsql = "select * from employee  ORDER BY id DESC";
									$tre = mysqli_query($con,$tsql);
									while($row=mysqli_fetch_array($tre) )
									{	
										$id = $row['id'];
										
										$username = $row['username'];
										
										$email = $row['email'];
										$mobile = $row['mobile'];
										$address = $row['address'];
										
										$image = $row['image'];
										$salary = $row['salary'];
										$join_date = $row['join_date'];
										
										$sl++;
									?>
									<tr>
									<td> <?php echo $sl ;?> </td>
									<td> <img src="../images/employee/<?php echo $image;?>" height="70px"width="80px"  />  </td>
									
									<td> <?php echo $username;?> </td>
									
									<td> <?php echo $mobile;?> </td>
									
									<td> <?php echo $email;?> </td>
									<td> <?php echo $address;?> </td>
									
									<td> <?php echo $join_date;?> </td>
									<td> <?php echo $salary;?> </td>
									<?php 
                                        
                                        $total=$total+$salary;
                                        ?>
									
									<td>  <a href="?rid=<?php echo $id;?>" class="btn btn-danger" > Delete</a>   </td> 
									
									
									
									</tr>
									
									<?php }
									?>
                                        
                                    </tbody>
                                </table>
                                 <center> <h3>  Total Sallary  : BDT <?php echo $total; ?> </h3> </center>
								
                            </div>		
		  
		  <?php
		  if(isset($_GET["rid"]))
		  {
			  $id = $_GET["rid"];
			  
			  $sql ="DELETE FROM `employee` WHERE id = '$id'" ;
								
								if(mysqli_query($con,$sql))
								{
								 echo "
															<center> <div class='alert alert-success'>
																<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
																<b>employee deleted successfully</b>
															</div></center>";
																		?>
										<script type="text/javascript">
<!--
function Redirect() {
window.location="empolyee.php";
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
      </div>
    </div>
  </div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                            </div>
                        </div>
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
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>