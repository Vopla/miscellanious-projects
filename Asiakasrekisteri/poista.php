<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
      
        try{
            $tietokanta = new PDO('mysql:host=localhost;dbname=asiakasrekisteri;charset=utf8','root', '');
            $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $kysely = $tietokanta->prepare('DELETE FROM asiakas WHERE id=:id');
            
            $kysely->bindValue(':id', $id, PDO::PARAM_INT);
        
        if($kysely->execute()) {
                    print('<p>Asiakkaan tiedot poistettu!</p>');
                }
                else {
                    print '<p>';
                    print_r($tietokanta->errorInfo());
                    print '</p>';
                }
                print("<a href= 'index.php'>Etusivulle</a>");
        } catch (PDOException $pdoex) {
            print '<p>Tietokannan avaus epäonnistui.' . $pdoex->getMessage(). '</p>';
        } 
        ?>
    </body>
</html>
