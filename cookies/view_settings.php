<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Your Settings</title>
	<style type="text/css">
	body {
<?php // Script 9.2 - view_settings.php

/*
Read the cookie using $_Cookie['name_of_cookie].
For security purposes:
When displaying the value originated from cookie, wrap the cookie with htmlentities() in order to safeguard against potentially executable code containted within the cookie
*/

// Check for a font_size value:
// \t\t - 2 taps \n - new line
// if no cookie exist print the default values

if (isset($_COOKIE['font_size'])) {
	print "\t\tfont-size: " . htmlentities($_COOKIE['font_size']) . ";\n";
} else {
	print "\t\tfont-size: medium;";
}

// Check for a font_color value:
if (isset($_COOKIE['font_color'])) {
	print "\t\tcolor: #" . htmlentities($_COOKIE['font_color']) . ";\n";
} else {
	print "\t\tcolor: #000;";
}

?>
	}
	</style>
</head>
<body>
<p><a href="customize.php">Customize Your Settings</a></p>
<p><a href="reset.php">Reset Your Settings</a></p>

<p>Hello Hello Hello Hello Hello
Hello Hello Hello Hello Hello
Hello Hello Hello Hello Hello
Hello Hello Hello Hello Hello
Hello Hello Hello Hello Hello</p>

</body>
</html>
