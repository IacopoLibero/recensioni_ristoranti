<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    // Ottengo i valori della form
    $nome = $_POST["nome"];
    $annoNascita = $_POST["annonascita"];
    $nazionalita = $_POST["nazionalita"];

    $sql = "INSERT INTO attori (Nome,AnnoNascita,Nazionalita) VALUES ('$nome', $annoNascita, '$nazionalita')";

    // Esecuzione della query di tipo INSERT
    if ($conn->query($sql)) 
    {
        header("Location: ..\status\success.html");
    } 
    else 
    {
        header("Location: ..\status\\fail.html");
    }
?>