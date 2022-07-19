<?php
require_once("db_connection.php");


 class DatabaseOpreation
{
 public static function select($table)
 {
   global $con;
    $q=$con->prepare("select * from $table");
    $q->execute();
    $result=$q->fetchall(); 
    return $result;

 }
 public static function selectProjection($colums,$table)
 {
   global $con;
    $q=$con->prepare("select $colums from $table");
    $q->execute();
    $result=$q->fetchall(); 
    return $result;

 }
 public static function selectallSelection($table,$condition)
 {
   global $con;
    $q=$con->prepare("select * from $table where $condition");
    $q->execute();
    $result=$q->fetchall(); 
    return $result;

 }
 public static function selectSelection($colums,$table,$condition)
 {
   global $con;
    $q=$con->prepare("select $colums from $table where $condition");
    $q->execute();
    $result=$q->fetchall(); 
    return $result;

 }
 public static function selectLimtaion($colums,$table,$condition,$offset,$RowsCountPerPage)
 {
   global $con;
    $q=$con->prepare("select $colums from $table where $condition LIMIT $offset,$RowsCountPerPage");
    $q->execute();
    $result=$q->fetchall(); 
    return $result;

 }
 public static function insertIntoTable($table,$colums,$VALUES)
 {
   global $con;
    $q=$con->prepare("INSERT INTO $table ($colums) VALUES (:Plate_Number, :Id_violation, :Id_plate, :Id_camera, :Id_provinces, :ImagePath)");
    $q->execute(array('Plate_Number'=>$VALUES[0], 'Id_violation'=>$VALUES[1], 'Id_plate'=>$VALUES[2], 'Id_camera'=>$VALUES[3], 'Id_provinces'=>$VALUES[4], 'ImagePath'=>$VALUES[5]));
    //$result=$q->fetchall(); 
    //return $result;

 }
 public static function insertIntoTableDate($table,$colums,$VALUES)
 {
   global $con;
    $q=$con->prepare("INSERT INTO $table ($colums) VALUES (:Plate_Number, :Id_violation, :Id_plate, :Id_camera, :Id_provinces,CONVERT(:Date, datetime), :ImagePath)");
    $q->execute(array('Plate_Number'=>$VALUES[0], 'Id_violation'=>$VALUES[1], 'Id_plate'=>$VALUES[2], 'Id_camera'=>$VALUES[3], 'Id_provinces'=>$VALUES[4], 'Date'=>$VALUES[5],'ImagePath'=>$VALUES[6]));
    //$result=$q->fetchall(); 
    //return $result;

 }
 //INSERT INTO 'monitoring' ( 'Plate_Number', 'Id_violation', 'Id_plate', 'Id_camera', 'Id_provinces', 'Date', 'ImagePath') VALUES ('121424242', '5', '3', '1', '1', current_timestamp(), 'adsadadqa');

 

}






?>