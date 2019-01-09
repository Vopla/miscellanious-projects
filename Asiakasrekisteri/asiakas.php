
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
        <?php
        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            try {
                $tietokanta = new PDO('mysql:host=localhost;dbname=asiakasrekisteri;charset=utf8','root', '');
                $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sukunimi = filter_input(INPUT_POST, 'sukunimi',FILTER_SANITIZE_STRING);
                $etunimi = filter_input(INPUT_POST, 'etunimi',FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
                
                $kysely = $tietokanta->prepare('INSERT INTO asiakas(sukunimi,etunimi,email) VALUES (:sukunimi,:etunimi,:email)');
                
                $kysely->bindValue(':sukunimi',$sukunimi, PDO::PARAM_STR);
                $kysely->bindValue(':etunimi',$etunimi, PDO::PARAM_STR);
                $kysely->bindValue(':email',$email, PDO::PARAM_STR);
                
                if($kysely->execute()) {
                    print('<p>Asiakkaan tiedot tallennettu!</p>');
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
        }
        ?>
        <h3>Lisää asiakas</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for='sukunimi'>Sukunimi:</label><br>
            <input type="text" name="sukunimi" required><br>

            <label for='etunimi'>Etunimi:</label><br>
            <input type='text' name="etunimi" required><br>

            <label for='email'>Sähköposti</label><br>
            <input type="email" name='email' required><br>

            <input style="margin-top: 5px;" type='submit' value="Tallenna">
        </form>
    </body>
</html>
