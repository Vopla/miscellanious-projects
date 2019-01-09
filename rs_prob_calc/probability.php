<?php
	
	$enemies = filter_input(INPUT_POST, 'enemies');
	
	$rate = filter_input(INPUT_POST, 'drate');
	
	$result = (1-(1-1/$rate)**$enemies);
	


?>


<!DOCTYPE html>
<html>
<body>

<h1 style="font-family: arial; font-size: 24;">Probability calculator</h1>

<p style="font-family: arial; font-size: 16;">Did you go dry?</p>

<div style="font-family: arial; font-size: 72;">
	
	<p><?php print $result*100 ?> % </p>

</div>
</body>
</html>