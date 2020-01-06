<?php
session_start();

class Payment{
    
    private $con = null;
    function __construct(){
        $this->con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
    }
    function getAll(){
           $userid = $_SESSION["userId"];
            $tsql = "select * from booking where user_id = $userid AND statas = 0 ";
    
            return mysqli_query($this->con,$tsql);	
   }
    function getAllDese(){
           $userid = $_SESSION["userId"];
           $tsql = "select * from booking where statas = 0 AND user_id = $userid ORDER BY id DESC";
    
            return mysqli_query($this->con,$tsql);	
   }
 
    
}


