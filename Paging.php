<?php 
require("pagination.php");


$pagenumber=$_GET['pagenumber'];


if($_GET['pageName']=="index.php")

{

    $PlateNumber= $_GET['PlateNumber'];
    $StartDate=$_GET['StartDate'];
    $EndDate=$_GET['EndDate'];
    $vStyle="";
echo"<div class='table-responsive' style='border-top-style: none;'>
                        <table class='table table-striped table tablesorter' id='ipi-table'>
                            <thead class='thead-dark'
                                style='background: rgb(33,37,48);border-width: 0px;border-color: rgb(0,0,0);border-bottom-color: #21252F;'>
                                <tr style='border-style: none;border-color: rgba(255,255,255,0);background: #21252f;'>
                                    <th>م</th>
                                    <th >رقم اللوحة</th>
                                    <th >المخالفة</th>
                                    <th >نوع اللوحة</th>
                                    <th>موقع الرصد</th>
                                    <th>المحافظة حسب اللوحة</th>
                                    <th>زمن الرصد</th>
                                    <th>عرض</th>
                                </tr>
                            </thead>
                            <tbody class='text-center' id='DataTable'>";


$WhereQuery =null;


if(!empty($PlateNumber) || $PlateNumber=="0")
{
    $WhereQuery=$WhereQuery." and Plate_Number like '%$PlateNumber%'";


}
if(!empty($StartDate))
{
    $WhereQuery=$WhereQuery." and Date between '$StartDate' and '$EndDate' ";


}

if (!empty($WhereQuery))
{
    $countRows=pagination::RowCountWithCondition("monitoring","1".$WhereQuery);
}
else
{
$countRows=pagination::RowsCount("monitoring");
}
echo "<h3 style='color: green;'>
عدد النتائج $countRows
</h3>";




$results=pagination::ShowPage("monitoring.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, monitoring.Date as Date, monitoring.ImagePath as ImagePath","camera, provinces, plate, monitoring, typeviolation, location "," ( typeviolation.Id = monitoring.Id_violation AND provinces.Id = monitoring.Id_provinces AND plate.Id = monitoring.Id_plate AND camera.Id = monitoring.Id_camera AND camera.Id_location = location.Id $WhereQuery) order by Date desc",null,$pagenumber);

                            
if(count($results)==0)
{
    echo "
    <div class='col' style='color:red'>
    <h1>لا يوجد اي رصد بهذا الرقم</h1>
    </div>
    ";

}
$i=0;
foreach ($results as $result)
{
    
$i++;
  
  if($result["Type"]!="لايوجد مخالفة")
      $vStyle="style='background: rgba(237,77,93,0.57);'";
  else $vStyle="";

   echo "
    <tr $vStyle>
    <td>".($pagenumber)*pagination::$RowsCountPerPage+$i."</td>
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
               src='"."images/".$result["ImagePath"]."'
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

echo "</tbody>
</table>
<ul class='pagination' >";
 


$pageCount=$countRows/pagination::$RowsCountPerPage;
for($i=0;$i<$pageCount;$i++)
{
    echo"<li class='page-item' onclick=\"paging($i,'index.php')\"><a class='page-link'>".($i+1)."</a></li>";
}


echo"</ul>";

}



else if ($_GET['pageName']=="Detials.php")
{
    $WhereQuery =null;
    $PlateType="";

    $PlateNumber= $_GET['PlateNumber'];
    $PlateType=$_GET['PlateType'];
    $Violation=$_GET['Violation'];
    $Location=$_GET['Location'];
    $StartDate=$_GET['StartDate'];
    $EndDate=$_GET['EndDate'];



echo "<div class='table-responsive' style='background: var(--bs-white);'>
<table class='table table-striped table tablesorter' id='ipi-table'>
    <thead class='thead-dark'>
        <tr>
        <th>م</th>
        <th>رقم اللوحة</th>
            <th>
                <select  id='Violation' class='border rounded-pill form-select-sm' onchange='paging(0,\"Detials.php\")'>";
                   echo" <option value='undefined' selected disabled>نوع المخالفة</option>";
                    $result1=DatabaseOpreation::select('typeviolation');
                    foreach($result1 as $result)
                        {
                            
                            echo '<option ';
                            if($Violation==$result['Id'])
                            echo "selected";
                            echo' value='.$result['Id'].'>'.$result['Type'].'</option>';
                        }
echo"
                </select>
            </th>
            <th class='text-center'>
            <select id='PlateType' class='border rounded-pill form-select-sm' onchange='paging(0,\"Detials.php\")'>
                    <option value='undefined' selected='' disabled>نوع اللوحة</option>
";
                    $result1=DatabaseOpreation::select('plate');
                    foreach($result1 as $result)
                        {
                            echo '<option ';
                            if($PlateType==$result['Id'])
                            echo "selected";
                            echo ' value='.$result['Id'].'>'.$result['TypePlate'].'</option>';
                        }
            echo"
                </select></th>
            <th><select id='Location' class='border rounded-pill form-select-sm' onchange='paging(0,\"Detials.php\")'>
                    <option value='' selected='' disabled>موقع المخالفة</option>
";
                    $result1=DatabaseOpreation::select('location');
                    foreach($result1 as $result)
                        {
                            echo '<option ';
                            if($Location==$result['Id'])
                            echo "selected";
                            echo ' value='.$result['Id'].'>'.$result['Address'].'</option>';
                        }
echo"
                </select>
            </th>
            <th>
                    المحافظة حسب اللوحة
                    </th>
            <th>زمن الرصد</th>
            <th>عرض</th>
        </tr>
    </thead>
 <tbody id='DataTable'>
 

";


if(!empty($PlateNumber) || $PlateNumber=="0")
{
    $WhereQuery=$WhereQuery." and Plate_Number like '%$PlateNumber%'";


}

if(!($Violation=="undefined"))
{
    $WhereQuery=$WhereQuery." and Id_violation_Type='$Violation'";


}
if(!($PlateType=="undefined"))
{
    $WhereQuery=$WhereQuery." and Id_plate='$PlateType'";


}
// if(!empty($Location))
// {
//     $WhereQuery=$WhereQuery." and location.Id='$Location'";


// }
if(!empty($StartDate))
{
    $StartDateEnter=true;
    $WhereQuery=$WhereQuery." and Date between '$StartDate' and '$EndDate' ";


}

if (!empty($WhereQuery))
{
    $countRows=pagination::RowCountWithCondition("violation","1".$WhereQuery);
}
else
{
$countRows=pagination::RowsCount("violation");
}
echo "<h3 style='color: green;'>
عدد النتائج $countRows
</h3>";
$results=pagination::ShowPage(" violation.Plate_Number as Plate_Number , typeviolation.Type as Type, plate.TypePlate as TypePlate, location.Address as Address, provinces.Name as provincesName, violation.Date as Date, violation.ImagePath as ImagePath","camera, provinces, plate, violation, typeviolation, location "," ( typeviolation.Id = violation.Id_violation_Type AND provinces.Id = violation.Id_provinces AND plate.Id = violation.Id_plate AND camera.Id = violation.Id_camera AND camera.Id_location = location.Id $WhereQuery ) order by Date desc",null,$pagenumber);
$i=0;


if(count($results)==0)
{
    echo "
    <div class='col' style='color:red'>
    <h1>لا يوجد اي مخالفة بهذا الرقم</h1>
    </div>
    ";

}

else
{
foreach ($results as $result)
{
    $i++;

   echo "
    <tr>
    <td>".($pagenumber)*pagination::$RowsCountPerPage+$i."</td>   <td>".$result["Plate_Number"]."</td>
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



echo"
</tbody>
</table>             
    <ul class='pagination' >";
                         
    $pageCount=$countRows/pagination::$RowsCountPerPage;
    for($i=0;$i<$pageCount;$i++)
       {
     echo"<li class='page-item' onclick=\"paging($i,'Detials.php')\"><a class='page-link'>".($i+1)."</a></li>";
      }
 echo" </ul> </div>";
}
}






?>