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

        try{
            if (isset($_POST['poistettavat'])){
            $tietokanta = new PDO('mysql:host=localhost;dbname=asiakasrekisteri;charset=utf8','root', '');
            $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $idt = $_POST['poistettavat'];
        
        $sql = "delete from asiakas where";
        $kriteeri ="";
        foreach ($idt as $id) {
            if (strlen($kriteeri)>0){
                $kriteeri .= " or ";
            }
            $kriteeri .= " id = $id";
        }
        
        $sql .= $kriteeri;
        $kysely = $tietokanta->query($sql);
        if($kysely->execute()) {
                    print('<p>Valitut asiakkaat poistettu!</p>');
                }
                else {
                    print '<p>';
                    print_r($tietokanta->errorInfo());
                    print '</p>';
                }
                
//        echo $sql;
            }
            else {
                print "<p>Et valinnut yhtään asiakasta</p>";
            }
            print("<a href='index.php'>Etusivulle</a>");
        } catch (PDOException $pdoex) {
            print '<p>Tietokannan avaus epäonnistui.' . $pdoex->getMessage(). '</p>';
        } 
        ?>
    </body>
</html>
