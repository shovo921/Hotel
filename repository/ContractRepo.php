<?php

class LoginRepo{
    
    private $con = null;
    function __construct(){
        $this->con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
    }
    function getAll(){
            $sql1 = "INSERT INTO `contact`
													(`fullname`, `email`, `phoneno`, `msg`) 
																		VALUES ('$name','$email','$mobile','$msg')"; 
    
            return mysqli_query($this->con,$sql1);	
   }
    
}


