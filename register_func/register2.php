<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<!--<link rel="stylesheet" href="css/concise.min.css">
	<link rel="stylesheet" href="css/masthead.css">
-->
	<style type="text/css" media="screen">
		.error { color: red; }
	</style>
</head>
<body>
<h1>Register</h1>
<?php // Script 11.6 - register.php
/* This script registers a user by storing their information in a text file and creating a directory for them. */

// Identify the directory and file to use:
$dir = '../users/';
$file = $dir . 'users.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	$problem = FALSE; // No problems so far.

	// Check for each value...
	if (empty($_POST['username'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a username!</p>';
	}

	if (empty($_POST['password1'])) {
		$problem = TRUE;
		print '<p class="error">Please enter a password!</p>';
	}

	if ($_POST['password1'] != $_POST['password2']) {
		$problem = TRUE;
		print '<p class="error">Your password did not match your confirmed password!</p>';
	}

	if (!$problem) { // If there weren't any problems...

		if (is_writable($file)) { // Open the file.

			// Create the data to be written:
			$subdir = time() . rand(0, 4596);
			$data = $_POST['username'] . "\t" . sha1(trim($_POST['password1'])) . "\t" . $subdir . PHP_EOL;

			// Write the data:
			file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

			// Create the directory:
			mkdir ($dir . $subdir);

			// Print a message:
			print '<p>You are now registered!</p>';

		} else { // Couldn't write to the file.
			print '<p class="error">You could not be registered due to a system error.</p>';
		}

	} else { // Forgot a field.
		print '<p class="error">Please go back and try again!</p>';
	}

} else { // Display the form.

// Leave PHP and display the form:
?>

<form action="register.php" method="post">
	<p>Username: <input type="text" name="username" size="20"></p>
	<p>Email Address: <input type="email" name="email" size="30"></p>
	<p>Password: <input type="password" name="password1" size="20"></p>
	<p>Confirm Password: <input type="password" name="password2" size="20">
	</p>

	<p>Date of Birth:

<?php $month = [
	1 =>'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
		];
$days = range(1,31);
$years = range(date('Y'), 1900);

	print '<select name="month">';
		foreach ($month as $key => $value) {
			print "<option value=\"$key\">
			$value</option>\n";
		}
	print '</select>';

	print '<select name="day">';
		foreach ($days as $value) {
			print "<option value=\"$value\">
			$value</option>\n";
		}
	print '</select>';

	print '<select name="year">';
		foreach ($years as $value) {
			print "<option value=\"$value\">
			$value</option>\n";
		}
	print '</select></p>';
?>
	<p>Favorite Color:
	<select name="color">
		<option value="">Pick One</option>
		<option value="red">Red</option>
		<option value="yellow">Yellow</option>
		<option value="green">Green</option>
		<option value="blue">Blue</option>
	</select></p>

	<p><label for="terms">
	<input type="checkbox" name="terms" value="Yes" required> I agree to the terms.</label></p>

	<input type="submit" name="submit" value="Register">
</form>

<?php } // End of submission IF. ?>
</body>
</html>
