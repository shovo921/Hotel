<?php include"header.php";?>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          All Hotels 
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "select * from hotel";
						$re = mysqli_query($con,$sql);
				?>
                <div class="row">
						<div class="panel panel-info">
                        <div class="panel-heading">
                           List of available hotels
                        </div>
                        <div class="panel-body">
				
				<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['id'];
												$name = $row['name'];
												$codename = $row['code_name'];
												$image = $row['feature_image'];
												$location = $row['location'];
												
											?>
												<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<img src="../images/hotel/<?php echo $image ;?>" height="100x;" width="150px;"/>
															<h3><?php echo $name;?></h3><br>
															
															<?php echo $location;?>
														</div>
														<div class='panel-footer back-footer-blue'>
															code Name: <?php echo $codename;?>

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
