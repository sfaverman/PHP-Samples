<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Directory Contents</title>
</head>
<body>
<?php // Script 11.5 - list_dir.php
/* This script lists the directories and files in a directory. */

// Set the time zone:
date_default_timezone_set('America/Los_Angeles');

// Set the directory name and scan it:
$search_dir = '.'; //Set the starting directory to search. '.' is a special reference it means "the current directory". Can be a relative or absolute path.

//Could be absolute path
//search_dir = 'C:\MAMP\htdocs\PHP-SUMMER';

$contents = scandir($search_dir);

print_r($contents);

// List the directories first...
// Print a caption and start a list:
print '<h2>Directories</h2>
<ul>';
foreach ($contents as $item) {
	if ( (is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {
		print "<li>$item</li>\n";
	}
}

print '</ul>'; // Close the list.

// Create a table header:
print '<hr><h2>Files</h2>
<table cellpadding="2" cellspacing="2" align="left">
<tr>
<th>Name</th>
<th>Size</th>
<th>Last Modified</th>
</tr>';

// List the files:
foreach ($contents as $item) {
	if ( (is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.') ) {

		// Get the file size:
		$fs = filesize($search_dir . '/' . $item);

		// Get the file's modification date:
		$lm = date('F j, Y', filemtime($search_dir . '/' . $item));

		// Print the information:
		print "<tr>
		<td>$item</td>
		<td>$fs bytes</td>
		<td>$lm</td>
		</tr>\n";

	} // Close the IF.

} // Close the FOREACH.

print '</table>'; // Close the HTML table.

?>
</body>
</html>
