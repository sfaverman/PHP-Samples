<?php

/* PHP 166 SUMMER

   Sofia Faverman - 07/14/19
   Week 4 assignment :
     1. Make sure the only file type that can be uploaded are images: jpeg,jpg, gif, png
	 2. Also make sure no jpeg can be uploaded that is more than 1 MB
	 3. Multiple files upload
*/
$phpFileUploadErrors = array (
	0 => 'There is no error, the file uploaded with success',
	1 => 'The uploaded file exceeds the upload_maxfilesize directive in php.ini',
	2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
	3 => 'The uploaded file was only partially uploaded',
	4 => 'No file was uploaded',
	6 => 'Missing a temporary folder',
	7 => 'Failed to write file to disk',
	8 => 'A PHP extension stopped the file to upload.'
);
function reArrayFiles( $file_post ) {
	$file_ary = array();
	$file_count = count($file_post['name']);
	$file_keys = array_keys($file_post);

	for ($i=0; $i<$file_count; $i++) {
		foreach ($file_keys as $key) {
			$file_ary[$i][$key] = $file_post[$key][$i];
			}
	}
	return $file_ary;
}
function pre_r( $array ) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';

}
if (isset($_FILES['filestoupload'])) {
	//$_FILES
	//var_dump($_FILES);
	//$_FILES['filetoupload']['tmp_name'];

	/* 	pre_r($_FILES); */

	$file_array = reArrayFiles( $_FILES['filestoupload']);

	/* 	pre_r($file_array); */
	if (count($file_array) > 5) {
		echo "Please select Maximum 5 files to upload at once";
	} else {
		for ($i=0; $i<count($file_array); $i++) {

			if($file_array[$i]['error']) {
				echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']].'<br>';
			}
			else {
				$extensions = array('jpeg','png','gif','jpg');
				$file_ext = explode('.',$file_array[$i]['name']);
				$file_ext = end($file_ext);
				/*echo $file_ext;*/
				if (!in_array($file_ext, $extensions)) {
					echo $file_array[$i]['name'].' - Invalid file extension<br>';
				}
				else {
					if ($file_array[$i]['size'] > 1048576 ) {
						echo $file_array[$i]['name'].' - File too big - over 1MB - Not Uploaded! <br>';
					}

					else {
						 move_uploaded_file($file_array[$i]['tmp_name'],'uploads/'.$file_array[$i]['name']);
						 echo 'You have successfully uploaded '.$file_array[$i]['name'].'<br>';

					}
				}

			}

		}
	}
}
?>


<form action="" method="post" enctype="multipart/form-data">
File: <input type="file" name="filestoupload[]" value="" multiple><br>
<input type="submit" name="submit" value="Upload!">

</form>
