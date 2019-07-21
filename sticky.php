<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

//var_dump($_POST);
if (isset($_POST['submit']) && $_POST['submit'] == 'Enter Info'){

   $fullname = $_POST['fullname'];
   $email = $_POST['email'];

   if (isset($_POST['gender'])) {
   		$gender = $_POST['gender'];

   }
   $yearinschool = $_POST['yearinschool'];
   $comments = $_POST['comments'];
}
?>
<form action="sticky.php" method="post">

	<label for = "fullname">Fullname</label>
	<input type="text" name="fullname" id="fullname" value="<?php if(isset($fullname)) { echo $fullname;} ?>"><br><br>

	<label for = "email">Email</label>
	<input type="email" name="email" id="email" placeholder="
	Email Address Here" value="<?php if(isset($email)) { echo $email;} ?>"><br><br>

	<label for = "male">Male</label>
	<input type="radio" name="gender" id="male" value="male" <?php
		   if (isset($gender) && $gender == 'male')	{
			   echo 'checked="checked"';
			}
    ?>>

	<label for = "female">Female</label>
	<input type="radio" name="gender" id="female" value="female" <?php
		   if (isset($gender) && $gender == 'female')	{
			   echo 'checked="checked"';
			}
    ?>>
	<br><br>

	Hobbies:<br>
	<label for = "sports">Sports</label>
	<input type="checkbox" name="hobbies[]" id = "sports"
	 value="sports" <?php
          if (isset($_POST['hobbies']) && in_array('sports',$_POST['hobbies'])) echo ' checked ';
          ?>>
		<label for = "eating">Eating</label>
	<input type="checkbox" name="hobbies[]" id = "eating"
	 value="eating" <?php
          if (isset($_POST['hobbies']) && in_array('eating',$_POST['hobbies'])) echo ' checked ';
          ?>>
		<label for = "sleeping">Sleeping</label>
	<input type="checkbox" name="hobbies[]" id = "sleeping"
	 value="sleeping" <?php
          if (isset($_POST['hobbies']) && in_array('sleeping',$_POST['hobbies'])) echo ' checked ';
          ?>><br><br>

	Year in School
	<select name ="yearinschool">
		<option value ="">Choose below</option>
		<option value ="Freshman" <?php
		if (isset($yearinschool) && $yearinschool == "Freshman") {
			echo 'selected="selected"';
		}
		?>>Freshman</option>
		<option value ="Sophomore"  <?php
				if (isset($yearinschool) && $yearinschool == "Sophomore") {
					echo 'selected="selected"';
		}
		?>>Sophomore</option>
		<option value ="Junior"  <?php
				if (isset($yearinschool) && $yearinschool == "Junior") {
					echo 'selected="selected"';
		}
		?>>Junior</option>
		<option value ="Senior"  <?php
				if (isset($yearinschool) && $yearinschool == "Senior") {
					echo 'selected="selected"';
		}
		?>>Senior</option>

	</select> <br><br>

	Comments:<br>
	<textarea name="comments" cols="40" rows="10"><?php if(isset($comments)) { echo $comments;} ?></textarea><br><br>
	<input type="submit" name="submit" value="Enter Info">
</form>
