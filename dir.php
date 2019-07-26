<?php
// Best ways to list file directories in php

//METHOD 1

//need a function to recurse through subdirectories
function recurse($dir) {
	$handle = opendir($dir);
	while (false !== ($file = readdir($handle))) {
		//bypass hidden files
		If ($file == '.' || $file == '..' || $file == '.DS_Store') continue;
		//if it is a folder
		if (is_dir($file)) {
			echo '<b>'.$file.' -- is a folder</b><br>';
			//need to recurse here!!
			recurse($file);
			echo '-- end of folder: <b>'.$file.'</b><br>';
		} else {
			echo $file.' -- is a file!<br>';
		}
	}
}

recurse('./');
echo "<br><br>";

//METHOD 2
foreach (glob("*") as $filename) {
	echo $filename.' -- size ' . filesize($filename) . "<br>";
}
?>
