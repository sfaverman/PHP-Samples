
<?php

//INSERT form registration form data into database

//Connect to database

$dbh = new PDO("mysql:host=localhost:8889;dbname=webd166", 'root', 'root');
//echo 'connected to webd166<br>';

if (isset($_POST['submit']) && $_POST['submit'] == 'Register'){
	//get the data and insert it!!!
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$comments = $_POST['comments'];

	//students-new is a table name created in phpMyAdmin for databases webd166 - table: tbstudents

	$insert = $dbh->prepare("insert into tbstudents (
	fullname,gender,yearinschool,comments) values (
	'$fullname','$gender','$year','$comments')");

	$insert->execute();
	//print_r($insert->errorInfo());
	//echo "Record Inserted<br>";
}

//display records ... just the name

$display = $dbh->prepare("select fullname, gender, yearinschool, comments from tbstudents order by id desc");
$display->execute();
while ($row = $display->fetch()){
	$fullname = $row[0];
	//could be $row['fullname'];
	$gender = $row[1];
	$year = $row[2];
	$comments = $row[3];
	echo $fullname.','.$gender.','.$year.','.$comments.'<br>';
}

?>

<h1>Register for school</h1>
<form action ="" method="POST">
Name: <input type="text" name = "fullname"><br>
Gender: Male: <input type="radio" name="gender" value="Male"> Female <input type="radio" name="gender" value="Female"><br>
Year in School <select name ="year">
<option value ="Freshman">Freshman</option>
<option value ="Sophomore">Sophomore</option>
<option value ="Junior">Junior</option>
<option value ="Senior">Senior</option>
</select><br>
    Comments:
<textarea name="comments"></textarea><br>
<input type="submit" name ="submit" value="Register">

</form>
