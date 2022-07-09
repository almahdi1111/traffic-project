<?php 
require("DatabaseOpreation.php");


if (isset($_GET['pagenumber']))
{
    $pagenumber=$_GET['pagenumber'];
}


if($_GET['pageName']=="index.php")
{
$results=pagination::ShowPage("monitoring.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, monitoring.Date as Date, monitoring.ImagePath as ImagePath","camera, provinces, plate, monitoring, typeviolation, location "," ( typeviolation.Id = monitoring.Id_violation AND provinces.Id = monitoring.Id_provinces AND plate.Id = monitoring.Id_plate AND camera.Id = monitoring.Id_camera AND camera.Id_location = location.Id) order by Date desc",null,$pagenumber);
$vStyle="";
if(count($results)==0)
{
    echo "
    <div class='col' style='color:red'>
    <h1>لا يوجد اي رصد بهذا الرقم</h1>
    </div>
    ";

}
foreach ($results as $result)
{

  
  if($result["Type"]!="لايوجد مخالفة")
      $vStyle="style='background: rgba(237,77,93,0.57);'";
  else $vStyle="";

   echo "
    <tr $vStyle>
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
       data-bs-target='#exampleModal'>الصورة</button>
</div>
</td>
</tr>";
}
}
else if ($_GET['pageName']=="Detials.php")
{
$results=pagination::ShowPage(" violation.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, violation.Date as Date, violation.ImagePath as ImagePath","camera, provinces, plate, violation, typeviolation, location "," ( typeviolation.Id = violation.Id_violation_Type AND provinces.Id = violation.Id_provinces AND plate.Id = violation.Id_plate AND camera.Id = violation.Id_camera AND camera.Id_location = location.Id) order by Date desc",null,$pagenumber);

if(count($results)==0)
{
    echo "
    <div class='col' style='color:red'>
    <h1>لا يوجد اي مخالفة بهذا الرقم</h1>
    </div>
    ";

}
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



?>