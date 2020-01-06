<?php
session_start();
class BookingRepo{
    
    private $con = null;
    function __construct(){
        $this->con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
    }
    function getAll(){
            $userid = $_SESSION["userId"];
            $sql1 = "select * from booking where statas = 1  AND user_id = $userid ";
            return mysqli_query($this->con,$sql1);	
   }
    function getdisc()
    {
        $userid = $_SESSION["userId"];
        $sql = "select * from booking where statas = 1  AND user_id = $userid ORDER BY id DESC";
        return mysqli_query($this->con,$sql);
    }
    
}


