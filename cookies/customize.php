<?php // Script 9.1 - customize.php

// Handle the form if it has been submitted:
if (isset($_POST['font_size'], $_POST['font_color'])) {

	/* Create two separate cookies.
	   Set a cookie parameters by specifying the name and the value and the exparation in the form of a timestamp. If expiration does not exist, cookies will exist until user closes the browser.
	*/
	setcookie('font_size', $_POST['font_size']);
	setcookie('font_color', $_POST['font_color']);

	/*setcookie('font_size', $_POST['font_size'], time()+10000000), '/', '', 0);
	setcookie('font_color', $_POST['font_color'],
	time()+10000000), '/', '', 0);*/

	// Message to be printed later:
	$msg = '<p>Your settings have been entered! Click <a href="view_settings.php">in action</a> to see them in action.</p>';

} // End of submitted IF.

//Create the following array for font_size. Chapter 7
$font_size = [
	'XX-Small',
	'X-Small',
	'Small',
	'Medium',
	'Large',
	'X-Large',
	'XX-Large'
	];
//Create the following array for font_color. Chapter 7
$font_color = [
	'999' => 'Gray',
	'0c0' => 'Green',
	'00f' => 'Blue',
	'c00' => 'Red',
	'000' => 'Black',
	];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Customize Your Settings</title>
</head>
<body>
<?php // If the cookies were sent, print a message.
if (isset($msg)) {
	print $msg;
}
?>

<p>Use this form to set your preferences:</p>

<form action="customize.php" method="post">
	<label for="font_size">Choose font size:</label>
	<select name="font_size">
	<option value="">Font Size</option>
		<?php foreach ($font_size as $size) {
			print "<option value=\"$size\">$size</option>\n";
			}
		?>
	</select>
	<br><br>
	<label for="font_color">Choose font color:</label>
	<select name="font_color">
	<option value="">Font Color</option>
		<?php
		//Sort the array by key using ksort(). Second parameter sorts the string in alphabeical order.
		ksort($font_color, SORT_STRING);
		foreach ($font_color as $code => $name) {
			print "<option value=\"$code\">$name</option>\n";
			}
		?>
	</select>
	<br><br>

	<input type="submit" name="submit" value="Set My Preferences">
</form>

<?php
// Use phpinfo function with the argument INFO_Fariable to be able to view cookie information.
	phpinfo(INFO_VARIABLES);
?>
</body>
</html>
