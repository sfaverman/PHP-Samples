<?php
/* Script 8.14 - welcome.php
*  Sofia Faverman
*  This is the welcome page.
*  The user is redirected here after they successfully log in. */

//necessary on every page that is using session data
session_start();


// Set the page title and include the header file:
define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
include('templates/header.php');

//Concatenate the stored user's address to the rest of the string.
print '<h2>Welcome to the J.D. Salinger Fan Club!</h2>';
print '<p>Hello, '. $_SESSION['email'] . '!<p>';

date_default_timezone_set('America/Los_Angeles');
print '<p>You have been logen in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';

print '<p><a href="logout.php">Logout</a></p>'

// Leave the PHP section to display lots of HTML:
?>

<!--<h2>Welcome to the J.D. Salinger Fan Club!</h2>-->
<p>You've successfully logged in and can now take advantage of everything the site has to offer.</p>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos omnis illo quaerat et. Reprehenderit necessitatibus ratione modi rem enim facere sint? Provident assumenda repudiandae beatae quo. Veniam sapiente odit illum.</p>


<?php include('templates/footer.php'); // Need the footer. ?>
