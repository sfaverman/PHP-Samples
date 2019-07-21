<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrays and order Form</title>
 </head>
<body>
   <!-- *** Sofia Faverman
      *** Date: 07/14/2019
      *** Class: PHP Web
      *** Assignment: 04 -->

   <h1>Order Form</h1>

<?php

 /* validate form if submit button pressed */
 if (isset($_POST['submit']) && $_POST['submit'] == 'Order!') {
   // Print the submitted information:
   if ( !empty($_POST['pizza']) || !empty($_POST['sandwich']) || !empty($_POST['more']) ) {
  		$message = "<p>Thank you for your order!<br>You ordered:<br>";
	    $total = 0;
	    if (!empty($_POST['pizza'])) {
		   $message .= "Pizza - $".$_POST['pizza']."<br>";
		   $total += $_POST['pizza'];
	    }
	    if (!empty($_POST['sandwich'])) {
		   $message .= "Sandwich - $".$_POST['sandwich']."<br>";
		   $total += $_POST['sandwich'];
	    }
	    if (!empty($_POST['more'])) {
		   $message .= "Additional - $".$_POST['more']."<br>";
		   $total += $_POST['more'];
	    }
	    $message .='Total order value: $'.$total.'</p>';

	    echo $message;



 /*echo "<p>Thank you for your order!</p>
          <p>You ontered: <br>
		  email address - <i>{$_POST['email']}</i><br>
		  phone number - <i>{$_POST['phone']}</i><br>
    	  favorite color - <i>{$_POST['color']}</i><br>
          favorite hobbies - <i>{$listHobbies}</i></br>
		  date of birth - <i>$bmonth / $bday / {$_POST['year']}</i></br>
		  family income - <i>{$_POST['income']}</i></br>
		  additional notes - <i>{$_POST['notes']}</i></br>
          </p>"; */


   } else { // Missing form value.
      echo '<p>You have not selected any items. <br> Please select the menu items you want to order  and submit the form again.</p>';
  } // end if
 }

 $pizzashop = array(
                            array(
                                array("Supreme", 12.95, 10.95, 7.95),
                                array("Pepperoni", 10.50, 9.75, 7.50),
                                array("Sausage", 10.99,9.99,8.99) ,
                                array("Cheese", 9.99,7.99,6.99)),
                            array(
                                array("Ham and Cheese",6.50,5.00),
                                array("Philly Steak", 7.00,6.00),
                                array("Turkey",5.99,4.99),
                                array("Tuna",5.99,4.99)),
                            array(
                                array("Cheese Sticks",3.99),
                                array("1 Slice Cheese", 2.99),
                                array("6 Wings", 4.99),
                                array("12 Wings", 4.99)
                                  )
                            );
	$pizza_size = array("X-Large","Large","Medium","Small");
	$sandw_size = array("Full","Half");


?>

   <form action="" method="post">
       <fieldset>
           <legend>Build your order:</legend>

                Choose pizza:<br>
                <label for="pizza">
                <select name="pizza" id="pizza">
                	<option value="">Select</option>
                	<?php
                            for ($i = 0; $i <= count($pizzashop[0])-1; $i++) {
								$pizza = $pizzashop[0][$i][0];
                            	print "<optgroup label=\"$pizza\">\n";

								for ($j = 1; $j <=  count($pizzashop[0][$i])-1; $j++) {
									    $price = $pizzashop[0][$i][$j];
										$choice = $pizza_size[$j].' - $'.$price;
									   	print "<option value=\"$price\">$choice<?option>\n";
								}

								print "<?optgroup>\n";
							}
					?>
                </select>
                </label><br><br>

                Choose Sandwich:<br>
                <label for="sandwich">
                <select name="sandwich" id="sandwich">
                	<option value="">Select</option>
                	<?php
                    		for ($i = 0; $i <= count($pizzashop[1])-1; $i++) {
								$sandwich = $pizzashop[1][$i][0];
                            	print "<optgroup label=\"$sandwich\">\n";

								for ($j = 1; $j <=  count($pizzashop[1][$i])-1; $j++) {
									    $price = $pizzashop[1][$i][$j];
										$choice = $sandw_size[$j-1].' - $'.$price;
									   	print "<option value=\"$price\">$choice<?option>\n";
								}

								print "<?optgroup>\n";
							}

                    ?>
                </select>
                </label><br><br>

				Choose More:<br>
                <label for="more">
                <select name="more" id="more">
                	<option value="">Select</option>
                	<?php
                    		for ($i = 0; $i <= count($pizzashop[2])-1; $i++) {
								$price = $pizzashop[2][$i][1];
								$choice = $pizzashop[2][$i][0].' - $'.$price;
							    print "<option value=\"$price\">$choice<?option>\n";

							}
                    ?>
                </select>
                </label><br><br>



   <label for="submit"></label>
   <input type="submit" name="submit" value="Order!">

       </fieldset>
   </form>

</body>
</html>
