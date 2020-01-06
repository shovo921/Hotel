



<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<html>

<head>
  <link rel="stylesheet" href="css/admin.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Admin Login</title>
</head>
<style>
body {
  background:url('../images/img_5.jpg' ");
  margin:0px;
  font-family: 'Ubuntu', sans-serif;
	background-size: 100% 110%;
}
    </style>

<body style='background-image: url("../images/hero_2.jpg"); background-position: 50% -25px;'>
  <div class="main">
    <p class="sign" align="center">Admin Login</p>
    <form class="form1" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
      <input class="un " type="text" align="center"  id="username" name="user" placeholder="Username" autocomplete="off">
      <input class="pass" type="password" align="center" id="password" name="pass" placeholder="Password" autocomplete="off">
        <button class="submit" type="submit" align="center"  name="sub">Log in</button>
       
       
        <p class="forgot" align="center" name="sub"><a href="index.php">Forgot Password?</a></p>
            
      </form>     
                
    </div>
    
     
</body>

</html>
<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: home.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
