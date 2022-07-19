<?php
require_once("DatabaseOpreation.php");
require_once("FTPSeverConnction.php");


$connection =new FTPConection(); 
$connection->ConnectedToServer();

 $files = ftp_nlist($connection->ftp,'');
 var_dump($files);

 foreach($files as $file)
 {
     if ($file == '.' || $file == '..' ) continue;
     $connection->ConnectedToServer();
     $fullPath = $file;
     $fileSize = ftp_size($connection->ftp, $fullPath);
     $values=array_map('intval',explode('-',$fullPath,-1));
     $values[6]="images/$fullPath"; 

     DatabaseOpreation::insertIntoTableDate('monitoring','Plate_Number, Id_violation, Id_plate, Id_camera, Id_provinces,Date,ImagePath',$values);
       
    if (ftp_get($connection->ftp,"images/$fullPath", $fullPath,FTP_BINARY)) {
       } 
       
       else {
             }

     if (ftp_delete($connection->ftp, $fullPath))
      {
       } 
       else 
       {
       }

     $connection->closeConnection();



 }




?>