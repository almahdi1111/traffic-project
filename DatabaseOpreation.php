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

class displayfromTable
{
   public static function displayviolation()
   {
      
      $results=DatabaseOpreation::selectSelection(" violation.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, violation.Date as Date, violation.ImagePath as ImagePath","camera, provinces, plate, violation, typeviolation, location "," ( typeviolation.Id = violation.Id_violation_Type AND provinces.Id = violation.Id_provinces AND plate.Id = violation.Id_plate AND camera.Id = violation.Id_camera AND camera.Id_location = location.Id ) order by Date desc");
      foreach ($results as $result)
      {
         echo "
          <tr>
          <td>1</td>
         <td>".$result["Plate_Number"]."</td>
         <td>".$result["Type"]."</td>
         <td>".$result["TypePlate"]."</td>
         <td>".$result["Address"]."</td>
         <td>".$result["provincesName"]."</td>
         <td>".$result["Date"]."</td>
         <td>
             <div id='modal-open'>
                 <div class='modal fade' role='dialog' tabindex='-1' id='exampleModal'
                     aria-labelledby='exampleModalLabel'>
                     <div class='modal-dialog modal-lg' role='document'>
                         <div class='modal-content'>
                             <div class='modal-header'><button type='button'
                                     class='btn-close' data-bs-dismiss='modal'
                                     aria-label='Close'></button></div>
                             <div class='modal-body' style='height: 100%;width: 100%;'><img
                                     src='".$result["ImagePath"]."'
                                     style='height: 100%;width: 100%;'></div>
                             <div class='modal-footer'><button class='btn btn-warning'
                                     style='background-color:rgb(255,139,160);' type='button'
                                     data-bs-dismiss='modal'>اغلاق</button></div>
                         </div>
                     </div>
                 </div><button class='btn btn-warning' type='button' data-bs-toggle='modal'
                     data-bs-target='#exampleModal'>عرض صورة المخالفة</button>
             </div>
         </td>
     </tr>";
      }
  }
  public static function displaymonitoring()
   {
      
      $results=DatabaseOpreation::selectSelection("monitoring.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, monitoring.Date as Date, monitoring.ImagePath as ImagePath","camera, provinces, plate, monitoring, typeviolation, location "," ( typeviolation.Id = monitoring.Id_violation AND provinces.Id = monitoring.Id_provinces AND plate.Id = monitoring.Id_plate AND camera.Id = monitoring.Id_camera AND camera.Id_location = location.Id ) order by Date desc");
      $vStyle="";
      foreach ($results as $result)
      {

        
        if($result["Type"]!="لايوجد مخالفة")
            $vStyle="style='background: rgba(237,77,93,0.57);'";
        else $vStyle="";

         echo "
          <tr $vStyle>
         <td>".$result["Plate_Number"]."</td>
         <td>".$result["Type"]."</td>
         <td>".$result["TypePlate"]."</td>
         <td>".$result["Address"]."</td>
         <td>".$result["provincesName"]."</td>
         <td>".$result["Date"]."</td>
         <td>
         <div id='modal-open'>
         <div class='modal fade' role='dialog' tabindex='-1' id='exampleModal'
             aria-labelledby='exampleModalLabel'>
             <div class='modal-dialog modal-lg' role='document'>
                 <div class='modal-content'>
                     <div class='modal-header'><button type='button'
                             class='btn-close' data-bs-dismiss='modal'
                             aria-label='Close'></button></div>
                     <div class='modal-body' style='height: 100%;width: 100%;'><img
                             src='".$result["ImagePath"]."'
                             style='height: 100%;width: 100%;'></div>
                     <div class='modal-footer'><button class='btn btn-warning'
                             style='background-color:rgb(255,139,160);' type='button'
                             data-bs-dismiss='modal'>اغلاق</button></div>
                 </div>
             </div>
         </div><button class='btn btn-warning' type='button' data-bs-toggle='modal'
             data-bs-target='#exampleModal'>الصورة</button>
     </div>
 </td>
</tr>";
      }

  }
}
class pagination
{
   //public static int $RowsCount;
   public static int $pageNumber;
   public static int $RowsCountPerPage;


   public static function RowsCount($tableName)
   {
    $result=DatabaseOpreation::select($tableName);
    $RowsCount=count($result);
    return $RowsCount;
   }

}





?>