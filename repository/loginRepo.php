<?php
session_start();

class LoginRepo{
    
    private $con = null;
    function __construct(){
        $this->con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
    }
    function getAll(){
            $id = $_SESSION["userId"];
            $tsql = "select * from marchant_login where id = $id";
    
            return mysqli_query($this->con,$tsql);	
   }
    function get(){
         $id = $_SESSION["userId"];
         $tsql = "select * from booking where user_id = $id AND statas = 0 ";
         return mysqli_query($this->con,$tsql);
        
    }
    
}


