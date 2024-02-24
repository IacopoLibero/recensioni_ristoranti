<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    // Ottengo i valori della form
    $codattore = $_POST["codattore"];
    $nome = $_POST["nome"];
    $annoNascita = $_POST["annonascita"];
    $nazionalita = $_POST["nazionalita"];

    // Verifica se il codice attore esiste già nel database
    $checkQuery = "SELECT * FROM attori WHERE CodAttore = $codattore";
    $result = $conn->query($checkQuery);

    if ($result->affected_rows > 0) 
    {
        header("Location: ..\status\fail.html");
        exit;
    }
    else
    {
        $sql = "INSERT INTO attori VALUES ($codattore, '$nome', $annoNascita, '$nazionalita')";
    
        // Esecuzione della query di tipo INSERT
        if ($conn->query($sql)) 
        {
            header("Location: ..\status\success.html");
            exit;
        } 
        else 
        {
            header("Location: ..\status\fail.html");
            exit;
        }
    }   
    header("Location: ..\status\fail.html"); 
    exit;
?>