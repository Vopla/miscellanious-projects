<?php

$kolmesataa = filter_input(INPUT_POST, 'kolmesataa');
        
$sata = filter_input(INPUT_POST, 'sata');
        
$viiskyt = filter_input(INPUT_POST, 'viiskyt');

$misses = filter_input(INPUT_POST, 'misses');

$kolmesataa_score = $kolmesataa * 300;

$sata_score = $sata * 100;

$viiskyt_score = $viiskyt * 50;

$score = $kolmesataa_score + $sata_score + $viiskyt_score;

$hits = $kolmesataa + $sata + $viiskyt + $misses;

$acc = round($score / (300 * $hits)* 100, 2) ;


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>osu! Accuracy calculator</title>
    </head>
    <body style="font-family: arial;">
        <div style="margin:auto; width:50%;">
        <h1>osu! Accuracy calculator</h1>
        <?php// var_dump($score);
               // var_dump($hits);?>
        <p>Your accuracy for this score with<br><hr><b><?php print $kolmesataa ?></b> <span style="color: lightblue;">300s,</span>
        <br> <b><?php print $sata ?></b> <span style="color: lightgreen;">100s</span>,
        <br> <b><?php print $viiskyt ?></b> <span style="color: orange;">50s</span>
        <br> and <b><?php print $misses ?></b> <span style="color:red;">misses.</span>
        <hr></p>
        <p>The accuracy for this score is <b><?php print $acc ?>%</b></p>
        </div>
    </body>
</html>