<html>
<head>
    <title>Indovina Numero</title>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">       
</head>
    <body>
        <h1 style="text-align: center">Gioco dell' indovina numero</h1>
    <?php
        if(empty($_GET)){

        $numeroTentativi=1;
        $numeroRandom=rand(0,99);
        $numeroUtente=0;
        echo $numeroRandom;
        echo "<form action='Es2.php' method='get'>
        <div class='Testo'>
          <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
          <p><b>Regole del gioco:</b> Si deve indovinare nel minor numero di tentativi<br> un numero comoreso fra 0 e 99 estratto casualmente dal sistema. </p>
          <p>Tentativo numero $numeroTentativi</p>
          <input type='hidden' name='nRandom' value='$numeroRandom'><br> 
          <input type='hidden' name='nTentativi' value='$numeroTentativi'><br>     
          </div>  
          <div class='input-group mb-3'>
  <input type='text' class='form-control' placeholder='' aria-label='Recipient s username' aria-describedby='button-addon2'>
</div>
<button class='btn btn-outline-secondary' type='button' id='button-addon2'>Tenta</button>
      </form>";
     
        }else{

            $_GET["nTentativi"]++;
            $tentativi=$_GET["nTentativi"];
            $random=$_GET["nRandom"];
            $nUtente=$_GET["numeroUtente"];
            if($nUtente==$random && $tentativi<6 ){//vittoria
                $tentativi--;
        echo "<form action='Es2.php' method='get'>
            <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
            <input type='submit' value='tenta'>
        </form>";
            echo "<h1>HAI INDOVINATO IL NUMERO!!!!! IN $tentativi </h1>";
            }
            if($nUtente<$random && $tentativi<6){
                echo "<form action='Es2.php' method='get'>
                <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
                <p>Tentativo numero  $tentativi</p>
                <input type='hidden' name='nRandom' value='$random'><br> 
                <input type='hidden' name='nTentativi' value=' $tentativi'><br>       
                <div class='input-group mb-3'>
  <input type='text' class='form-control' placeholder='' aria-label='Recipient s username' aria-describedby='button-addon2'>
</div>
<button class='btn btn-outline-secondary' type='button' id='button-addon2'>Tenta</button>
            </form>";
            echo "<h1>IL NUMERO E TROPPO PICCOLO</h1>";
            }
            if($nUtente>$random && $tentativi<6){
                echo "<form action='Es2.php' method='get'>
                <label for='numeroUtente'>Ecco le regole del gioco:</label><br>
                <p>Tentativo numero  $tentativi</p>
                <input type='hidden' name='nRandom' value='$random'><br> 
                <input type='hidden' name='nTentativi' value=' $tentativi'><br>  
                <input type='submit' value='tenta'>     
                <div class='input-group mb-3'>
  <input type='text' class='form-control' placeholder='' aria-label='Recipient s username' aria-describedby='button-addon2'>
</div>
<button class='btn btn-outline-secondary' type='button' id='button-addon2'>Tenta</button>
            </form>";
            echo "<h1>IL NUMERO E TROPPO GRANDE</h1>";
            }
            if($tentativi==6){
                echo "<h1>HAI RAGGIUNTO IL NUMERO MASSIMO DI TENTATIVI</h1>";
                "<form action='Es2.php' method='get'>
                <input type='submit' value='tenta'>
                <button type='button' class='btn btn-warning'>Gioca di nuovo</button>
                </form>";
            }
        }   
    ?>

    </body>

</html>