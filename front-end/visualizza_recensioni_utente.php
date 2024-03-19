<?php
include('..\script_php\connessione.php');  // Questo include la connessione in modo da poter utilizzare $conn in questa pagina
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href=".\stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="..\stylesheet.css">
</head>
    <body>
        <?php
            session_start();
            if ($_SESSION['log']== false) 
            {
                $_SESSION['status'] = "Devi fare il login per accedere a questa pagina";
                header("Location: ..\index.php");
            }
        ?>
        <div class="text-center">
            <?php
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
                    $sql = "SELECT id FROM utente WHERE username = '".$_SESSION['user']."'"; // Ottengo il codice dell'utente
                    $id = $conn->query($sql);
                    $id = $id->fetch_assoc();
                    $id = $id['id'];

                    $query = "SELECT recensione.voto,recensione.data,ristorante.nome FROM recensione JOIN ristorante ON ristorante.codice=recensione.codiceristorante WHERE recensione.idutente = $id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) 
                    {
                        // Inizia la tabella HTML
                        echo "<table class='text-center mx-auto my-3'>";
                        
                        // Stampa la riga dell'intestazione con i nomi dei campi
                        echo "<tr>";
                        // Ottieni la prima riga del risultato per ottenere i nomi dei campi
                        //la funzione mysqli_fetch_assoc() restituisce la riga corrente del risultato come un array associativo
                        $row = mysqli_fetch_assoc($result);
                        foreach ($row as $key => $value) 
                        {
                            echo "<th>" . $key . "</th>";
                        }
                        echo "</tr>";
                    }
                    // Stampa tutte le righe della tabella
                    mysqli_data_seek($result, 0); // Reimposta il puntatore del risultato all'inizio
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        echo "<tr>";
                        foreach ($row as $value) 
                        {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    
                    // Chiude la tabella HTML
                    echo "</table>";
                    
                }
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="text-center col-12">
                <a href="dashboard.php" class="btn btn-primary text-center my-2">home</a>
            </div>
        </div>
    </body>
</html>