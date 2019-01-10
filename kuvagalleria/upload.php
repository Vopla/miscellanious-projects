<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Tiedoston tallennus</title>
</head>
<?php
include 'inc/ImageResize.php';
use \Eventviva\ImageResize;   /* ladataan Image Resize */
include_once 'inc/top.php';
if ($_FILES['kuva']['error'] == UPLOAD_ERR_OK)
{
	$kuva = $_FILES['kuva']['name'];
	
	if (empty($_FILES['kuva']['name'])){  //ei valittu mitään kuvaa
	
		print "Lataa kuva";
	}
	
	if ($_FILES['kuva']['size'] > 0)  //jos kuva on valittu
	{
		$tyyppi=$_FILES['kuva']['type'];	
		
		if (strcasecmp($tyyppi,"image/jpeg")==0||strcasecmp($tyyppi,"image/png")==0) /* vertaa tiedostomuotoja onko jpeg tai png */
		{
			$kuvannimi = basename($kuva);
			$kansio ='uploads';  
			
		
			if (move_uploaded_file($_FILES["kuva"]["tmp_name"], "$kansio/$kuvannimi")) //kuva siiretään /uploads/ kansioon
			{
				print "<p>Tiedosto on tallennettu palvelimelle.</p>";
				print "<a href='index.php'>Selaa tiedostoja</a>";
				$kuva = new ImageResize("$kansio/$kuvannimi");  /* tekee pikkukuvan joka tallennetaan /thumbs/ kansioon */
				$kuva->scale(50);
				$kuva->save("$kansio/thumbs/$kuvannimi");
				
			}
		}
		

		else
		{
			print "<p>Voit ladata vain jpg/jpeg/png-tiedostoja.</p>";
		}
	}
}

include_once 'inc/bottom.php';
?>


