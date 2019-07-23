<?php

// This script will incorporate all of my custom defined function for my register.php file

//This function makes three drop down menus that we are going to use in our register.php file

function make_date_menus() {
$month = [
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

	//Make the month pull-down menu
	print '<select name="month">';
		foreach ($month as $key => $value) {
			print "\n<option value=\"$key\">$value</option>";
		}
	print '</select>';

	//Make the day pull-down menu
	print '<select name="day">';
    for ($day = 1; $day <=31; $day++) {
		print "\n<option value=\"$day\">$day</option>";
	}
	print '</select>';

	//Make the year pull-down menu
	print '<select name="year">';
$start_year = date('Y');
	for ($y = $start_year; $y >= ($start_year - 100); $y--) {
		print "\n<option value=\"$y\">$y</option>";
	}
	print '</select></p>';
} //End of make_date_menus() function

/* Script 10.2 - sticky2.php
This script defines and calls a function that creates a sticky text input.
Upon form submission, the entered values will be remembered.
This function requires three arguments to be passed to it. I added in $type so that I could change the input attribute value */

function make_text_input($name, $label, $type, $size = 20) {
	//Begin a paragraph and a label
	print '<p><label>' . $label . ': ';

	//Modified this code to account for HTML input values
	print '<input type="'. $type . '" name="' . $name . '" size="' . $size . '"';

	//Add the value:
	if (isset($_POST[$name])) {
		print ' value="' .htmlspecialchars($_POST[$name]) . '"';
	}

	// Complete the input, the label and the paragraph:
	print ' /></label></p>';
} // End of make_text_input() function.
