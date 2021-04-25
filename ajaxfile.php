<?php

//count total files
$countfiles = count($_FILES['files']['name']);

//upload folder
$upload_location = "upload/";

$count = 0;

for($i=0;$i<$countfiles;$i++){

   //File name
   $filename = $_FILES['files']['name'][$i];
   
   //File path
   $path = $upload_location.$filename;
   
   //File extension
   $file_extension = pathinfo($path, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);
   
   //valid file extensions
   $valid_ext = array("pdf","doc","docx","jpg","jpeg","png");

   //check extension
   if(in_array($file_extension,$valid_ext)){


     //upload file
     if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $path))
        {
         $count+=1;
     }
   }
}
echo $count;
exit;