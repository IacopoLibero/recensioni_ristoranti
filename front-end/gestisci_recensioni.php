<?php
include('..\script_php\connessione.php');  // Questo include la connessione in modo da poter utilizzare $conn in questa pagina
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="card mx-auto my-5" style="width: 18rem;border-color: blue; border-style: solid;">
            <div class="card-body text-center">
                <?php
                    session_start();
                    $sql="SELECT count(*) FROM recensione JOIN utente ON recensione.idutente=utente.id WHERE username = '".$_SESSION['user']."'";
                    
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $count = $row[0];
                    if ($count == 0) 
                    {
                        echo "<h1 class='text-center my-5'>Nessuna recensione presente</h1>";
                    }
                    else 
                    {
                        echo "<h5 class='card-title'>Elimina/aggiorna recensione</h5>";
                        echo "<form action='../script_php/elimina_aggiorna.php' method='post'>";
                        echo "Seleziona recensione:";
                        echo"<br>";

                        $sql = "SELECT id FROM utente WHERE username = '".$_SESSION['user']."'"; // Ottengo il codice dell'utente
                        $id = $conn->query($sql);
                        $id = $id->fetch_assoc();
                        $id = $id['id'];

                        $query = "SELECT recensione.voto,ristorante.nome,recensione.idrecensione FROM recensione JOIN ristorante ON ristorante.codice=recensione.codiceristorante WHERE recensione.idutente = $id";
                        $result = mysqli_query($conn, $query);

                        // Verifica se ci sono righe restituite dalla query
                        if (mysqli_num_rows($result) > 0) 
                        {
                            
                            echo "<div class='btn-group'> ";
                            
                            echo "<div class='btn-group'>";
                            echo "<select name='idrecensione' class='btn dropdown-toggle text-center' style='background-color: aqua;' data-bs-toggle='dropdown' aria-expanded='false'>";
                            // Stampa tutte le righe della tabella
                            mysqli_data_seek($result, 0); // Reimposta il puntatore del risultato all'inizio
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                echo "<option value='".$row['idrecensione']."'>".$row['voto'].' - '.$row['nome']."</option>";
                            }
                            
                            // Chiude la tabella HTML
                            echo "</select>";
                            echo "</div>";
                            echo "</div>";
                        }
                        
                    
                        echo"<br>";
                        echo"<label for='agg'>clicca qui se vuoi aggiornare il voto</label>";
                        echo"<input id='agg' type='checkbox' name='agg'>";
                        echo"<br>";
                        echo"<div style='display:none;' id='nv'>";
                        echo"<label for='voto'>nuovo voto:</label><br>";
                        echo"<input type='number'  class='form-control' min='1' max='5' name='voto' placeholder='5'>";
                        echo"</div>";
                        if(isset($_GET['Message']))
                        {
                            echo"<br>";
                            if (strpos($_GET['Message'], 'successo') !== false) 
                            {
                                echo "<label class='text-success'>".$_GET['Message']."</label>";
                            }
                            else
                            {
                                echo "<label class='text-danger'>".$_GET['Message']."</label>";
                            }
                        }
                        echo"<hr>";
                        echo"<input type='submit' class='btn btn-primary' value='elimina/aggiorna'>";
                        echo"</form>";
                    }
                ?>
                <div class="row">
                    <div class="text-center col-12">
                        <a href="dashboard.php" class="btn btn-primary text-center my-2">home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    document.getElementById("agg").addEventListener("click", () =>
    {
        let x = document.getElementById("agg");
        let y = document.getElementById("nv");
        if(x.checked)
        {
            y.style.display = "block";
        }
        else
        {
            y.style.display = "none";
        }
        
    }) 
</script>