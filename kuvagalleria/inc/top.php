<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Kuvagalleria</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="source/jquery.fancybox.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Kuvagalleria</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="upload_lomake.php"><span class="glyphicon glyphicon-camera"></span></a>
				</ul>
			</div>
		</div>
	</nav>
				
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
					
		<div>
			<p class="lasku"></p>		
		
			<?php /* 
			    // integer starts at 0 before counting
			    $i = 0; 
			    $dir = 'uploads/';
			    if ($handle = opendir($dir)) {
			        while (($file = readdir($handle)) !== false){
			            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
			                $i++;
			        }
			    }
			    // prints out how many were in the directory
			    echo "<b>Kuvia:</b> $i";*/
			?>
			</div>
	
					<?php
					$hakemisto="uploads";
					$osoitin=opendir($hakemisto);
					if ($osoitin) // avataan hakemisto.	
					{
						while (false !== ($tiedosto=readdir($osoitin)))
						{
							$tiedostoPolunOsat=explode('.',$tiedosto);
							$paate=end($tiedostoPolunOsat);
							
							
							if (strcasecmp($paate,"jpg")==0||strcasecmp($paate,"png")==0||strcasecmp($paate,"jpeg")==0)
							{
								$polku=$hakemisto . "/$tiedosto";
								
								print "<div class='kuva'><a data-fancybox='single_image' href='$polku'><img src='$hakemisto/thumbs/$tiedosto' alt='$tiedosto' onclick=''/></a><p>$tiedosto</p></div>";
								
							}
						}
						
						closedir($osoitin);
					}
					?>	
					
								
			</div>
		</div>
	</div>
