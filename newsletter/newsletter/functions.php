<?php
// SUBSCRIBE function
function subscribe($email,$fname,$lname) {
	//create file handler, if file does not exist php will create it.
	//r - read, w - write, a - append
	$fh = fopen('../subscribers.txt',"a");
	fwrite($fh,$email.' '.$fname.' '.$lname."\n");
	fclose($fh);
	echo $fname.' '.$lname.', Thank you for subscribing.';
}
//UNSUBSCRIBE function
function unsubscribe($email) {
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
