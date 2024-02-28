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
        <link rel="stylesheet" href=".\stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="..\stylesheet.css">
</head>
    <body>
        <div class="text-center">
            <?php
                // Verifica se è stato inviato un modulo
                if (isset($_POST['submit'])) 
                {
                    $campi="";
                    // Verifica quali campi sono stati selezionati
                    if(isset($_POST['CodFilm']) && $_POST['CodFilm'] != "")
                    {
                        $campi = $campi . "CodFilm, ";
                    }
                    if(isset($_POST['Titolo']) && $_POST['Titolo'] != "")
                    {
                        $campi = $campi . "Titolo, ";
                    }
                    if(isset($_POST['AnnoProduzione']) && $_POST['AnnoProduzione'] != "")
                    {
                        $campi = $campi . "AnnoProduzione, ";
                    }
                    if(isset($_POST['Nazionalita']) && $_POST['Nazionalita'] != "")
                    {
                        $campi = $campi . "Nazionalita, ";
                    }
                    if(isset($_POST['Regista']) && $_POST['Regista'] != "")
                    {
                        $campi = $campi . "Regista, ";
                    }
                    if(isset($_POST['Genere']) && $_POST['Genere'] != "")
                    {
                        $campi = $campi . "Genere, ";
                    }
                    $campi = substr($campi, 0, -2); // Rimuove l'ultima virgola e lo spazio
                    $query = "SELECT $campi FROM film";
                    $result = mysqli_query($conn, $query);
                }
                // Se non è stato inviato un modulo, esegui una query standard
                else 
                {
                    $query = "SELECT * FROM film";
                    $result = mysqli_query($conn, $query);
                }

                // Verifica se ci sono righe restituite dalla query
                if (mysqli_num_rows($result) > 0) 
                {
                    // Inizia la tabella HTML
                    echo "<table class='mx-auto text-center'>";
                    
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
        <div class="row">
            <div class="text-center col-6">
                <a href="../index.html" class="btn btn-primary text-center my-2">home</a>
            </div>
            <div class="text-center col-6">
                <a href="..\pagine_html\film_e_scelta_campi.html" class="btn btn-primary text-center my-2">seleziona campi</a>
            </div>
        </div>
    </body>
</html>