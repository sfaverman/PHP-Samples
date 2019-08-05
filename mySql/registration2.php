
<?php

//INSERT form registration form data into database

//Connect to database

$dbh = new PDO("mysql:host=localhost:8889;dbname=webd166", 'root', 'root');
//echo 'connected to webd166<br>';

$status = 'Register';
if (isset($_GET['deleteid'])) {
	$deleteid = $_GET['deleteid'];
}
if (isset($_GET['editid'])) {
	$editid = $_GET['editid'];}

if (isset($deleteid)) {
    $delsql = $dbh->prepare("delete from tbstudents where id = '$deleteid'");
	$delsql->execute();
	echo "<h4>Record Deleted for studentid = $deleteid.</h4>";
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Register'){
	//get the data and insert it!!!
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$comments = $_POST['comments'];

	//tbstudents is a table name created in phpMyAdmin for databases webd166

	$insert = $dbh->prepare("insert into tbstudents (
	fullname,gender,yearinschool,comments) values (
	'$fullname','$gender','$year','$comments')");

	$insert->execute();
	//print_r($insert->errorInfo());
	echo "<h4>Record added for student $fullname !</h4>";
}

if (isset($_POST['submit']) && $_POST['submit'] == 'Update'){
	//get the data and insert it!!!
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$comments = $_POST['comments'];

	//tbstudents is a table in phpMyAdmin for databases webd166

	$updatesql = $dbh->prepare("UPDATE tbstudents SET fullname = '$fullname', gender = '$gender', yearinschool = '$year', comments = '$comments!' WHERE id = '$editid';");

	$updatesql->execute();
	//print_r($updatesql->errorInfo());
	echo "<h4> Record Updated for $fullname!</h4>";
}

if (isset($editid)) {
    $editsql = $dbh->prepare("select fullname, gender, yearinschool, comments from tbstudents where id = '$editid'");
	$editsql->execute();
	$editrow = $editsql->fetch();
	$upfullname = $editrow[0];
	$upgender = $editrow[1];
	$upyear = $editrow[2];
	$upcomments = $editrow[3];
	$status = 'Update';
	echo '<a href="registration2.php"> Click to go back to add mode</a>';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>School Registration Form</title>
	<style>
		form {
			width: 500px;
		}
		h1 {
			color: darkcyan;
		}
		input, select, textarea {
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
		input[type='radio'] {
			width: 50%;
		}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}

		ul li {
			display: inline-block;
		}
		a {
			text-decoration: none;
			border: solid 1px darkcyan;
			background-color: beige;
			color: darkcyan;
			padding: 2px 5px;
			border-radius: 5px;
		}

		a:hover {
			background-color: darkcyan;
			color: #fff;
		}
		.studentName {
			display: inline-block;
			min-width: 180px;
			margin-bottom: 10px;
		}
		h4 {
			color: red;
		}
		fieldset {
			margin-bottom: 20px;
		}
   </style>
</head>
<body>
<h1>List of Students</h1>
<section>
<?php
//display records ... just the name

$display = $dbh->prepare("SELECT id, fullname FROM tbstudents ORDER BY id DESC");
$display->execute();
while ($row = $display->fetch()){
	//$fullname = $row['fullname']; or
	$id = $row[0];
	$fullname = $row[1];

	echo '<span class="studentName">'.$fullname.'</span> <a href="registration2.php?deleteid='.$id.
	'">Delete</a>  <a href="registration2.php?editid='.$id.
	'">Edit</a><br>';
}
?>

</section>

<!--need to prepopulate the inputs with the selected record if edit is clicked. -->
<h1>Register for school</h1>
<form action ="registration2.php?
<?php
	echo $_SERVER['QUERY_STRING']; //it is $editid if edit
?>" method="POST">
	<fieldset><legend>Registration form</legend>
		<label for="fullname">Name:</label>
		<input type="text" name="fullname" id="fullname" value="<?php if (isset($upfullname)) {echo $upfullname;} ?>" required>


	  <fieldset><legend>Gender:</legend> <ul>
	   		  <!--<li>
	   		  	<p>Gender:</p>
	   		  </li>	-->
	   			  <li>
	   	   			<label for="male"> Male
	   			<input type="radio" name="gender" id="male" value="Male" <?php
	   			   			if (isset($upgender) && $upgender == 'Male') {
	   							echo ' checked="checked" ';} ?>></label>
	   			  </li>
	   			  <li>
	   			   	<label for="female">Female <input type="radio" name="gender" value="Female" <?php
	   					if (isset($upgender) && $upgender == 'Female') {
	   					 echo ' checked="checked" ';} ?>></label>
	   			  </li>
	   			</ul>	</fieldset>

		<label for="year">Year in School</label>
		<select name ="year" id="year" required>
			<option value ="" required>- Please select -</option>
			<option value ="Freshman" <?php if (isset($upyear) && $upyear == 'Freshman') {echo ' selected="selected" ';} ?>>Freshman</option>
			<option value ="Sophomore" <?php if (isset($upyear) && $upyear == 'Sophomore') {echo ' selected="selected" ';} ?>>Sophomore</option>
			<option value ="Junior" <?php if (isset($upyear) && $upyear ==
			'Junior') {echo ' selected="selected" ';} ?>>Junior</option>
			<option value ="Senior" <?php if (isset($upyear) && $upyear ==
			'Senior') {echo ' selected="selected" ';} ?>>Senior</option>
		</select>

		<label for="comments">Comments:</label>
		<textarea name="comments" id="comments"><?php if (isset($upcomments)) {echo $upcomments;} ?></textarea>

		<input type="submit" name ="submit" value="<?php echo $status;?>">
	</fieldset>

</form>
</body>
</html>
