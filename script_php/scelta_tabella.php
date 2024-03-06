<?php
include('connessione.php');  // Questo include la connessione in modo da poter utilizzare $conn in questa pagina
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
        <link rel="stylesheet" href="..\stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="text-center">
            <?php
                // Ottieni il valore dal form
                $scelta = $_POST['scelta'];
                
                // Query per recuperare tutte le righe dalla tabella scelta
                $query = "SELECT * FROM $scelta";
                $result = mysqli_query($conn, $query);

                // Verifica se ci sono righe restituite dalla query
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
                else 
                {
                    header("Location: ..\status\\fail.html");
                }
            ?>
        </div>
        
        <hr>
        <div class="text-center">
            <a href="..\front-end\dashboard.php" class="btn btn-primary text-center my-3">home</a>
        </div>
        
    </body>
</html>