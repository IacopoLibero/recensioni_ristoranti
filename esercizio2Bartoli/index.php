<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
        
</head>
    <body>
        
        <div class="container" style="background-color: bisque;">
        <h1 style="text-align: center">Gioco dell' indovina numero</h1>
        <div style="margin-left: 40%;">
    <?php
        
        if(empty($_GET)){

        $numeroTentativi=1;
        $numeroRandom=rand(0,99);
        $numeroUtente=0;
        
        echo "<form action='index.php' method='get'>
          <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
          <p>Tentativo numero $numeroTentativi</p>
          <input type='number' name='numeroUtente' max='99' min='0'><br> 
          <input type='hidden' name='nRandom' value='$numeroRandom'><br> 
          <input type='hidden' name='nTentativi' value='$numeroTentativi'><br>       
          <input type='submit' value='tenta'>
      </form>";
     
        }else{
            if($_GET["nTentativi"]<5){

            
            $_GET["nTentativi"]++;
            $tentativi=$_GET["nTentativi"];
            $random=$_GET["nRandom"];
            $nUtente=$_GET["numeroUtente"];
            
            if($nUtente==$random){//vittoria

        echo "<form action='index.php' method='get'>
            <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
            <p>Tentativo numero  $tentativi</p>
            <input type='number' name='numeroUtente' max='99' min='0'><br> 
            <input type='hidden' name='nRandom' value='$random'><br> 
            <input type='hidden' name='nTentativi' value=' $tentativi'><br>       
            <button type='button'><input type='submit' value='tenta'><button>
        </form>";
            echo "<h1>HAI INDOVINATO IL NUMERO!!!!!</h1>";
            }elseif($nUtente<$random){//perdita numero che cerco piu alto
                echo "<form action='index.php' method='get'>
            <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
            <p>Tentativo numero  $tentativi</p>
            <input type='number' name='numeroUtente' max='99' min='0'><br> 
            <input type='hidden' name='nRandom' value='$random'><br> 
            <input type='hidden' name='nTentativi' value=' $tentativi'><br>       
            <input type='submit' value='tenta'>
        </form>";    
        echo "<h1>NON HAI INDOVINATO IL NUMERO RITENTA SARAI PIU' FORTUNATO(il numero che cerchi è più alto)</h1>";
            }elseif($nUtente>$random){//perdita numero che cerco piu basso
                echo "<form action='index.php' method='get'>
                <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
                <p>Tentativo numero  $tentativi</p>
                <input type='number' name='numeroUtente' max='99' min='0'><br> 
                <input type='hidden' name='nRandom' value='$random'><br> 
                <input type='hidden' name='nTentativi' value=' $tentativi'><br>       
                <input type='submit' value='tenta'>
            </form>";    
            echo "<h1>NON HAI INDOVINATO IL NUMERO RITENTA SARAI PIU' FORTUNATO(il numero che cerchi è più basso)</h1>";
                
            }
            }else{

                echo"<h1>Hai perso</h1><br><button type='button'><a href=index.php>rigioca</a></button>";
                $_GET[]=array();
            }
        }   
        
    ?>
        </div>
        </div>
    </body>

</html>