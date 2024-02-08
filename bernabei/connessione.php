<?php
    // Definizione delle variabili per la connessione al database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cinemafinale";

    // Creazione della connessione al database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controllo della connessione
    if ($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
    }
?>