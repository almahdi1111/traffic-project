
<?php

class pagination
{
   //public static int $RowsCount;
   public static int $RowsCountPerPage=5;


   public static function RowsCount($tableName)
   {
    $result=DatabaseOpreation::select($tableName);
    $RowsCount=count($result);
    return $RowsCount;
   }
   public static function RowCountWithCondition($tableName,$condition)
   {
    $result=DatabaseOpreation::selectallSelection($tableName,$condition);
    $RowsCount=count($result);

    return $RowsCount;
   }

   public static function ShowPage($colums,$table,$condition,$offset,$pageNumber)
   {
    $offset=$pageNumber*self::$RowsCountPerPage;
    $result=DatabaseOpreation::selectLimtaion($colums,$table,$condition,$offset,self::$RowsCountPerPage);
    return $result;
   }



}

?>

