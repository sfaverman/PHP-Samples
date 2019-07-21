<?php

/* PHP 166 SUMMER

   Sofia Faverman - 07/10/19
   Week 3 assignment :
     1. Make sure the only file type that can be uploaded is a jpeg
	 2. Also make sure no jpeg can be uploaded that is more than 1 MB
*/

if (isset($_FILES['filetoupload'])) {
//$_FILES
//var_dump($_FILES);
//$_FILES['filetoupload']['tmp_name'];
$name = $_FILES['filetoupload']['name'];
$type = $_FILES['filetoupload']['type'];
$size = $_FILES['filetoupload']['size'];

// !!! create folder and call it uploads prior to running this php

//restrict uploads to certain types of files like jpeg in this example
//for images you can specify $type == 'application/jpeg'

if ($type == 'image/jpeg' && $size <= 1048576 ) {
   //move_uploaded_file(filename, destination);
   move_uploaded_file($_FILES['filetoupload']['tmp_name'],'uploads/'.$name);
 echo 'You have successfully uploaded '.$_FILES['filetoupload']['name'];
}
 else {
	 echo 'You only allowed to upload jpeg files, maximum 1MB in size';
 }
}
?>


<form action="upload_image.php" method="post" enctype="multipart/form-data">
File: <input type="file" name="filetoupload"><br>
<input type="submit" name="submit" value="Upload Me!">

</form>
