<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Tiedostopalvelin</title>
</head>

<h3>Lisää tiedosto</h3>
		<form action="upload.php" method="post" enctype="multipart/form-data" role="form">
			<div>
				<label for="kuva">Kuva:</label>
				<input type="file" name="kuva" id="kuva">
			</div>
			<div>
				<button>Lataa</button>
				<button type="button" onclick="window.location='index.php';">
				Peruuta</button>
			</div>
		
		</form>

<?php
include_once 'inc/top.php'
?>		
<?php
include_once 'inc/bottom.php';
?>
