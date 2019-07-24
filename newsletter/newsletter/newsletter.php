<?php
//newsletter subscription
if (isset($_POST['submit']) && $_POST['submit'] == 'Subscribe'){
	$email = trim($_POST['email']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	//create file handler, if file does not exist php will create it.
	//r - read, w - write, a - append
	$fh = fopen('../subscribers.txt',"a");
	fwrite($fh,$email.' '.$fname.' '.$lname."\n");
	fclose($fh);
	echo $fname.' '.$lname.', Thank you for subscribing.';

	//additional - confirm via e-mailing to user
	/*
	$emailarray = file('../subscribers.txt');
    //we need to loop around this array of email addresses
    foreach ($emailarray as $email){
        //need to trim off the \n so that the mail goes to the right place!
        //$email = trim($email);
		$email = strtok($email, " ") // if containd name and lastname also
        //below, we are emailing our subscribers
        $unsubscribelink = 'http://sfaverman.com/unsubscribe.php?unsubscribe='.$email;

        mail($email,'Did you subscribe to sfaverman.com?','PLease click this link if you didn\'t: '.$unsubscribelink,"Content-type: text/html");
    }*/
}
//unsubscribe
if (isset($_POST['submit']) && $_POST['submit'] == 'Unsubscribe'){
	$email = $_POST['email'];
	// create an array of subscriers and assign to $cur_subscribers variable
	$cur_subscribers = file('../subscribers.txt');
	$newlist = "";
	/*foreach ($cur_subscribers as $email_address) {
		if ($email."\n" != $email_address) {
		$newlist .= $email_address; // it contains carrage control
		}
	}*/
	foreach ($cur_subscribers as $email_record) {
		if ($email != strtok($email_record, " ")) {
		$newlist .= $email_record; // it contains carrage control
		}
	}
	//now use file handling to rewrite the new list
	$fh = fopen('../subscribers.txt',"w");
	fwrite($fh,$newlist);
	fclose($fh);
	echo ' You are unsubscribed. We are sorry to see you go!<br> ';

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
