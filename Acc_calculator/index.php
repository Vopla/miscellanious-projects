<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>osu! Accuracy calculator</title>
    </head>
    <body style="font-family: arial;">
    <div style="margin:auto; width:50%; max-width: ">
        <h1>osu! Accuracy calculator</h1>
        <p>Type in the 300s, 100s and 50s you got in a score and find out what
        out what your accuracy would have been!</p>
        
        <form action="calc.php" method="post">
            <h3 style="color:lightblue;">300s</h3>
            <input type="number" name="kolmesataa" required><br>
            <h3 style="color:lightgreen;">100s</h3>
            <input type="number" name="sata" required><br>
            <h3 style="color:orange;">50s</h3>
            <input type="number" name="viiskyt" required><br>
            <h3 style="color:red">Misses</h3>
            <input type="number" name="misses" required><br>
            <input style="min-width:200px; margin-top:10px;" type="submit" value="Send">
            </div>
        </form>
        
    </body>
</html>
