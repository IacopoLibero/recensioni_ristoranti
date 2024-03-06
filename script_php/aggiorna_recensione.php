<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    // Ottengo i valori della form
    $idRecensione = $_POST["idrecensione"];
    $voto = $_POST["voto"];

    // L'idRecensione esiste nel database, esegui l'aggiornamento
    $sql = "UPDATE recensioni SET Voto = $voto WHERE IDRecensione = $idRecensione";

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
?>