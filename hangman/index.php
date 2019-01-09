<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <?php
        /* sanat */
        $sanat = array('oulu', 'koodi', 'koulu', 'pyörä', 'rengas', 'sana',
            'jazz', 'rock', 'techno', 'lan', 'kaiutin');
        //muuttujat
        $sana ='';
        $piilotettu = '';
        $arvattu = '';
        
        //if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'GET'){
            //arvo sana taulukosta
            $sana = $sanat[rand(0,count($sanat)-1)];
            //muunna sanan merkit *
            $piilotettu = str_repeat('*', strlen($sana));
        }
        
        elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') {
            $kirjain = filter_input(INPUT_POST, 'kirjain', FILTER_SANITIZE_STRING);
            $sana = filter_input(INPUT_POST, 'sana', FILTER_SANITIZE_STRING);
            $arvattu = filter_input(INPUT_POST, 'arvatut', FILTER_SANITIZE_STRING);
            $piilotettu = filter_input(INPUT_POST, 'piilotettu', FILTER_SANITIZE_STRING);
            
            //onko yksi merkki
            if (strlen($kirjain) == 1){
                //arvottujen merkkien jono
                $arvattu .= $kirjain . "&nbsp;";
                
                //löytyykö kirjain valitusta sanasta
                for ($i = 0; $i < strlen($piilotettu); $i++) {
                    $paikka = stripos($sana, $kirjain, $i);
                    if ($paikka !== false) {
                        $piilotettu = substr_replace($piilotettu, $kirjain, $paikka, 1);
                    }
                    
                }
            }
            
            //useampia merkkejä
            else {
            if    ($kirjain == $sana){
                $piilotettu = $sana;
                $kirjain = '';
                }
            }
        }
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hangman</title>
        
        <style>
            label,input {font-size:20px;}
        </style>
        
    </head>
    <body>
        <form action="<?php print($_SERVER['PHP_SELF']);?>"
              method="post">
            <?php print "<input name='arvatut' type='hidden' value='$arvattu'>";
            print "<input name='sana' type='hidden' value='$sana'>";
            print "<label>Arvattava sana:</label>";
            print "<input name='piilotettu' value='$piilotettu'>";
            
            ?>
            <br>
            <label>Kirjain tai sana:</label>
            <input name="kirjain" maxlength="20" size="22" autocomplete="off">
            <input type="submit" value="Arvaa">
            <?php
            print "<p>Arvatut kirjaimet:<br/>" . $arvattu . "</p>";
            if (stripos($piilotettu, '*') === false) {
                print "<p>Arvasit oikein</p>";
                print "<a href='index.php'>Uusi peli</a>";
            }
            ?>            
        </form>
    </body>
</html>
