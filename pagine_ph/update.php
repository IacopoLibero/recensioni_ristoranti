<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    // Ottengo i valori della form
    $idRecensione = $_POST["idrecensione"];
    $voto = $_POST["voto"];

    // Verifica se l'idRecensione esiste nel database
    $query = "SELECT * FROM recensioni WHERE idRecensione = $idRecensione";
    $result = $conn->query($query);

    if ($result->num_rows > 0) 
    {
        // L'idRecensione esiste nel database, esegui l'aggiornamento
        $sql = "UPDATE recensioni SET Voto = $voto WHERE idRecensione = $idRecensione";

        if ($conn->query($sql)) 
        {
            // Aggiornamento riuscito, redirect a success.html
            header("Location: ..\status\success.html");
        } 
        else 
        {
            // Errore nell'esecuzione dell'aggiornamento, redirect a fail.html
            header("Location: ..\status\\fail.html");
        }
    } 
    else 
    {
        // L'idRecensione non esiste nel database, redirect a fail.html
        header("Location: ..\status\\fail.html");
    }