<?php 

class BedRepo{
    
    private $con = null;
    function __construct(){
        $this->con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
    }
    function getAll(){
            $sql = "SELECT bed.sl_id,bed.bed_no,bed.room_id,bed.status,bed.bed_image,add_room.name,add_room.price,add_room.type from bed INNER JOIN add_room on bed.room_id = add_room.id";
    
            return mysqli_query($this->con,$sql);	
   }
    
}