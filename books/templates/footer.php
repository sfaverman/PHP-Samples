 <!-- END CHANGEABLE CONTENT. -->
  </main>

  <footer container class="siteFooter">
    <p>Design uses <a href="http://concisecss.com/">Concise CSS Framework</a></p>

    <p class="float-right">
    	<!-- Print the current date and timezone -->
    	<?php
			date_default_timezone_set('America/Los_Angeles');
			print date('g:i a l, F j');
		   /* it will display -  6:18 pm Sunday, July 14 */

		?>

    </p>

  </footer>

</body>
</html>
<?php
//Turn off buffering
ob_end_flush();
?>
