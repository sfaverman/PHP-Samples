<?php
session_start();
//Connect to database

$dbh = new PDO("mysql:host=localhost:8889;dbname=webd166", 'root', 'root');
if(isset($_POST['submit']) && $_POST['submit'] == 'Log in'){
	$username = $_POST['username'];
	$userpass = $_POST['password'];

	$checksql = $dbh->prepare("select password from tbadmin where username = '$username' ");
	$checksql->execute();
	$row = $checksql->fetch();
	$password = $row[0];
	if (password_verify($userpass, $password)) {
    	//echo 'Password is valid!';
		$_SESSION['username'] = $username;
		$_SESSION['auth'] = 'wdfdfggfgfgfg';
		header ("Location: registration2.php");
	} else {
    	echo '<h4>Invalid password. Please try again.</h4>';
	}
  //check the records in the database
  //set a session
  //redirect to registration

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<style>
		h1 {
			text-align: center;
		}
		form {
			max-width: 400px;
			margin: 0 auto;
		}
		h1 {
			color: darkcyan;
		}
		input {
			width: 100%;
			margin-bottom: 1em;
			background-color: #f1f1f1;
		}
		input[type='submit'] {
			color: #fff;
			background-color: darkcyan;
			width: 100px;
			padding: 3px;
		}

		h4 {
			color: red;
		}

   </style>
</head>
<body>
	<h1>Welcome to CMS</h1>
	<form action="login.php" method="post">
	<fieldset><legend>Please login</legend>
		Username: <input type="text" name="username">
		Password: <input type = "password" name="password">
		<input type="submit" name="submit"  value="Log in">
	</fieldset>
</form>
</body>
</html>
