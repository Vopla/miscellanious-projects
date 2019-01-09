<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Asiakasrekisteri</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h3>Asiakkaat</h3>
        <a href="asiakas.php">Lisää uusi</a>
        <a href="#" onclick="document.forms[0].submit();">Poista kaikki</a>
        <?php
        try {
            $tietokanta = new PDO('mysql:host=localhost;dbname=asiakasrekisteri;charset=utf8','root','');
            
            $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT * FROM asiakas ORDER BY sukunimi';
            
            $kysely = $tietokanta->query($sql);
            
            if ($kysely) {
                print '<form method="post" action="poistakaikki.php">';
                print '<table>';
                print '<tr>';
                print '<th>Sukunimi</th>';
                print '<th>Etunimi</th>';
                print '<th>Email</th>';
                print '<th></th>';
                print '<th></th>';
                print '<th><input type="checkbox" onclick="valitse_kaikki(this);" name="valitsekaikki"></th>';
//                print '<th>Tapaamiset</th>';
                print '</tr>';
                
                
                while ($tietue = $kysely->fetch()) {
                    print '<tr>';
                    print '<td>' . $tietue['sukunimi'] . '</td>';
                    print '<td>' . $tietue['etunimi'] . '</td>';
                    print '<td>' . $tietue['email'] . '</td>';
                    print '<td><a href="poista.php?id=' . $tietue['id']. '" onclick="return confirm(\'Jatketaanko?\');">Poista</a></td>';
                    print '<td><a href="muokkaa.php?id=' . $tietue['id']. '">Muokkaa</a></td>';
                    print '<td><input type="checkbox" name="poistettavat[]" value="' . $tietue['id'] . '" /></td>';
//                    if($tietue["tapaamisia"]>0){
////                    print "<td><a href='tapaamiset.php?id=" . $tietue['id'] . "'>Näytä</a></td>";   
////                    }
////                    else {
////                        print "<td><a href='tapaamiset.php?id+" . $tietue['id'] . "'></td>";
////                    }
                    print '</tr>';
                }
                print '</table>';
                print '</form>';
                
            }
            else {
                print '<p>';
                print_r($tietokanta->errorInfo());
                print '</p>';
            }
        } catch (PDOException $pdoex) {
            print '<p>Tietokannan avaus epäonnistui' . $pdoex->getMessage(). '</p>';
        }
        ?>
        <script src="js/asiakas.js" type="text/javascript"></script>
    </body>
</html>
