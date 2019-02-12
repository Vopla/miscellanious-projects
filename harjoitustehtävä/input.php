<?php

	$sahkoposti = test_input($_POST[email]);
	
	if (!filter_var($sahkoposti, FILTER_VALIDATE_EMAIL)) {
	
		$sahkoposti_virhe = "Virheellinen sähköposti";	
	}



?>