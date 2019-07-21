<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
 </head>
<body>
   <!-- *** Sofia Faverman
      *** Date: 02/14/2019
      *** Class: PHP MySQL
      *** Assignment: 02 -->

   <h1>Registration Form</h1>

<?php
   // Print the submitted information:
  if ( !empty($_POST['fName']) && !empty($_POST['email']) ) {

 $listHobbies = "";
 foreach ($_POST['hobbies'] as $key=>$item) {
  $listHobbies = $listHobbies.$item;
  if($key!=count($_POST['hobbies'])-1)
        $listHobbies=$listHobbies.', ';
     };
  $bday = str_pad($_POST['day'], 2, '0', STR_PAD_LEFT);
  $bmonth = str_pad($_POST['month'], 2, '0', STR_PAD_LEFT);

 echo "<p>Thank you, <strong>{$_POST['fName']} {$_POST['lName']}</strong>, for registration!</p>
          <p>You entered: <br>
		  email address - <i>{$_POST['email']}</i><br>
		  phone number - <i>{$_POST['phone']}</i><br>
    	  favorite color - <i>{$_POST['color']}</i><br>
          favorite hobbies - <i>{$listHobbies}</i></br>
		  date of birth - <i>$bmonth / $bday / {$_POST['year']}</i></br>
		  family income - <i>{$_POST['income']}</i></br>
		  additional notes - <i>{$_POST['notes']}</i></br>
          </p>";


   } else { // Missing form value.
      echo '<p>Please go back and fill out the form again.</p>';
  } // end if

?>

   <form action="register.php" method="post">
       <fieldset>
           <legend>Please complete this form to register:</legend>

           <label for="fName">First Name:</label>
           <input type="text" id="fName" name="fName" required autofocus>
           <br><br>

            <label for="lName">Last Name:</label>
            <input type="text" id="lName" name="lName" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
   <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>

            <label for="confirm">Confirm Password:</label>
            <input type="password" id="confirm" name="confirm" required>
            <br><br>

      <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="555-555-5555" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Please enter the valid phone number. Example: 555-555-5555">
      <br><br>


                    <!--
               <label for="year">Year born:</label>
               <input type="year" id="year" name="year" placeholder="YYYY">

    -->
                Date Of Birth:
                <label for="month">
                <select name="month" id="month">
                    <option value="">Month</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                </label>

                <label for="day">
                <select name="day" id="day">
                    <option value="">Day</option>
                        <?php
                            for ($i = 1; $i <= 31; $i++) {
                            print "<option value=\"$i\">$i<?option>\n";
                            }
                        ?>
                </select>
		        </label>

                <label for="year">
                <select name="year" id="year">
                    <option value="">Year</option>
                        <?php
                            $curYear = date("Y");
                            for ($i = $curYear - 100; $i <= $curYear; $i++) {
                            print "<option value=\"$i\">$i</option>\n";
                            }
                        ?>
                </select><br><br>
		        </label>


           Your favorite color?<br><br>
  <label for = "red">Red</label><input type="radio" name = "color" value="red" id="red">
  <label for = "yellow">Yellow</label><input type="radio" name = "color" value="yellow" id="yellow">
  <label for = "green">Green</label><input type="radio" name = "color" value="green" id="green">
  <label for = "blue">Blue</label><input type="radio" name = "color" value="blue" id="blue">
  <br><br>
    Your favorite hobbies?<br><br>
  <label for = "music">Music</label>
  <input type="checkbox" name = "hobbies[]" value="music" id="music">

  <label for = "hiking">Hiking</label>
  <input type="checkbox" name = "hobbies[]" value="hiking" id="hiking">

  <label for = "swimminhg">Swiiming</label>
  <input type="checkbox" name = "hobbies[]" value="swimming" id="swimming">

  <label for = "dancing">Dancing</label>
  <input type="checkbox" name = "hobbies[]" value="dancing" id="dancing">

  <label for = "singing">Singing</label>
  <input type="checkbox" name = "hobbies[]" value="singing" id="singing">

  <label for = "fishing">Fishing</label>
  <input type="checkbox" name = "hobbies[]" value="fishing" id="fishing">

  <label for = "traveling">Traveling</label>
  <input type="checkbox" name = "hobbies[]" value="traveling" id="traveling">
  <br><br>

  <label for = "income">Family Income</label>                                             <select name="income">
    <option value="low">0-50000</option>
    <option value="middle">51000-99000</option>
    <option value="high">100000+</option>
  </select><br><br>
  <label for="notes">Additional Notes:</label><br>
  <textarea name="notes" id="notes" placeholder="Enter additional info here ..." cols="50" rows="10" maxlength="500"></textarea><br><br>
  <label for="terms">
  <input type="checkbox" name="terms" value="Yes" required> I agree to the terms.</label>
  <br><br>
   <label for="submit"></label>
   <input type="submit" name="submit" value="Register">

       </fieldset>
   </form>

</body>
</html>
