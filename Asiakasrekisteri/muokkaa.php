<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php
        $otsikko = 'Lisää asiakas';
        $id=0;
        $etunimi="";
        $sukunimi="";
        $email="";
        
         $tietokanta = new PDO('mysql:host=localhost;dbname=asiakasrekisteri;charset=utf8','root', '');
         $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         if ($_SERVER['REQUEST_METHOD']==='GET'){
             if (isset($_GET['id'])){
                 $id= filter_input(INPUT_GET,'$id', FILTER_SANITIZE_NUMBER_INT);
                 
                 try {
                     $sql = "SELECT * FROM asiakas WHERE ID =$id";
                     
                     $kysely = $tietokanta ->query($sql);
                     
                     if ($kysely){
                         $tietue = $kysely->fetch();
                         $etunimi=$tietue['etunimi'];
                         $sukunimi=$tietue['sukunimi'];
                         $email=$tietue['email'];
                         $otsikko = "Muuta asiakkaan $sukunimi, $etunimi tietoja";
                     }
                     
                     else {
                         print '<p>';
                         print_r($tietokanta->errorInfo());
                         print '<p>';
                     }
                 } catch (PDOException $pdoex) {
                     print '<p>Tietokannan avaus epäonnistui' . $pdoex->getMessage(). '</p>';
                 }
             }
             else if($_SERVER['REQUEST_METHOD']==='POST'){
                 try{
                    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 
                    $sukunimi = filter_input(INPUT_POST, 'sukunimi',FILTER_SANITIZE_STRING);
                    $etunimi = filter_input(INPUT_POST, 'etunimi',FILTER_SANITIZE_STRING);
                    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
                    
                    if($id == 0){
                        $kysely = $tietokanta->prepare('INSERT INTO asiakas(sukunimi,etunimi,email) VALUES (:sukunimi,:etunimi,:email)');
                    }
                    else {
                            $kysely = $tietokanta->prepare('UPDATE asiakas SET sukunimi=:sukunimi,etunimi=:etunimi,email=:email WHERE id=:id');
                            $kysely->bindValue(':id',$id, PDO::PARAM_INT);
                    }
                    
                    $kysely->bindValue(':sukunimi',$sukunimi, PDO::PARAM_STR);
                    $kysely->bindValue(':etunimi',$etunimi, PDO::PARAM_STR);
                    $kysely->bindValue(':email',$email, PDO::PARAM_STR);
                    
                    if ($kysely->execute()){
                        print('<p>Asiakkaan tiedot tallennettu!</p>');
                        $id = $tietokanta->lastInsertId();
                    }
                    else {
                        print '<p>';
                        print_r($tietokanta->errorInfo());
                        print'</p>';
                    }
                        print ("<a href='index.php'>Etusivulle</a>");
                    }
                    
                    catch (PDOException $pdoex) {
                        print '<p>Tietokannan avaus epäonnistui.' . $pdoex->getMessage(). '</p>';
                 }
             }
         }
        ?>
        <h3><?php print ($otsikko); ?></h3>
        <form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="id" value="<?php print($id);?>">
            <div>
                <label>Sukunimi:</label>
                <input name="sukunimi" maxlength="30" size="30" required="" value="<?php print ($sukunimi);?>">
            </div>
            <div>
                <label>Etunimi:</label>
                <input name="etunimi" maxlength="30" size="30" required="" value="<?php print ($etunimi);?>">
            </div>
            <div>
                <label>Sähköposti:</label>
                <input name="email" maxlength="255" size="50" type="email" value="<?php print ($email);?>">
            </div>
            <button>Tallenna</button>
            <button type="button" onclick="window.location='index.php';">Peruuta</button>
        </form>
    </body>
</html>
