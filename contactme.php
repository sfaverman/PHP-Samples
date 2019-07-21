<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Page</title>
</head>
<body>


<?php
if (isset($_POST['submit']) && $_POST['submit'] == 'Contact Me') {

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];

	$content = $first_name.' '.$last_name.'<br><a href="mailto:'.$email.'">'.$email.'</a><br>'.$comments;


	/* get sample from php.net, search mail, example 2 */
	/*
		$to      = 'nobody@example.com';
		$subject = 'the subject';
		$message = 'hello';
		$headers = 'From: webmaster@example.com' . "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
	*/

	/* send mail and verify if mail executed */

	$bool =	mail('sofiasd@yahoo.com', 'Message from Sofia', $content, "Content-type: text/html");

	if ($bool) {
		echo "Thank you, we will be in touch!<br>";
		exit(); //exit script
	}

} // end if-submit

?>

<div><p> Please contact me:</p>
<!-- you never want to make contact form a sticky form -->
<form action="contactme2.php" method="post">

<p>First Name: <input type="text"
	 name="first_name" size="20"></p>
<p>Last Name: <input type="text"
	 name="last_name" size="20"></p>
<p>Email Address: <input type="email"
	 name="email" size="30"></p>
<p>Comments: <textarea name="comments" rows="9" cols="30"></textarea></p>
<input type="submit" name="submit" value="Contact Me">

</form>
</div>
</body>
</html>
