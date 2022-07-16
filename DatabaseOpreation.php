<?php
require_once("DatabaseOpreation.php");


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




}







?>