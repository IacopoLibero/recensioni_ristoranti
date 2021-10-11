<!doctype html>
<html>
    <head></head>
    <body>
        
        <?php
            
            //VARIABILI GESTITI IN PHP
            //NUMERO INTERO
            //STRINGA
            //NUM DECIMAlI
            //VALORI LOGICI
            //ARRAY
            //OGGETTO
            
            $valore = 5;
            $nome = "Giovanni ";
            $saluto = " Ciao " . $nome . $valore;
        
            if($valore > 10){
                echo "<b>";
            }else{
                echo "<i>";
            }
        
            echo "$saluto"; //stampa ciao giovanni
            
            if($valore > 10){
                echo "</b>";
            }else{
                echo "</i>";
            }
        
            
        ?>
    
    </body>



<html>