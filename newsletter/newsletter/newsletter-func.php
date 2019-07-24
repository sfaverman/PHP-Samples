<?php
include 'functions.php';
//newsletter subscription
if (isset($_POST['submit']) && $_POST['submit'] == 'Subscribe'){
	$email = trim($_POST['email']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	subscribe($email,$fname,$lname);
}
//unsubscribe
if (isset($_POST['submit']) && $_POST['submit'] == 'Unsubscribe'){
	$email = $_POST['email'];
	unsubscribe($email);
}

// create an array of subscribers from a file
//print_r(file('../subscribers.txt'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		h1 {
			color: darkcyan;
		}
		input {
			margin-bottom: 1em;
		}
		input[type='submit'] {
			color: #fff;
			background-color: darkcyan;
			width: 100px;
			margin-top: 10px;
		}
		label, input {
			width: 100%;
		}
		input[type='submit']:last-of-type {
			float: right;

		}
	</style>
</head>
<body>


<h1>Sign up for our Newspaper!</h1>
<form action="" method="post">
  <fieldset><legend>Sign up!</legend>
  	<label for="fname">First Name:*</label>
	<input type="text" name="fname" id="fname" required>
	<label for="lname">Last Name:*</label>
	<input type="text" name="lname" id="lname" required>
	<label for="email">E-mail:*</label>
	<input type="email" name="email" id="email" required>
	<input type="submit" name="submit" value="Subscribe">
	<input type="submit" name="submit" value="Unsubscribe">
	<p>* Indicates required fields</p>
  </fieldset>
</form>
</body>
</html>
