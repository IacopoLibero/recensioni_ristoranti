<?php
    include 'connessione.php';
    // Recupero dei dati dalla richiesta POST
    $voto = $_POST['voto'];
    $id = $_POST['id'];

    // Query per l'aggiornamento del record nel database
    $sql = "UPDATE recensioni SET Voto = $voto WHERE IDRecensione = $id";

    // Esecuzione della query e controllo del risultato se è stato inserito un record
    if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) 
    {
        echo "voto aggiornato";
    } 
    // Se non è stato inserito alcun record
    else if ($conn->affected_rows == 0) 
    {
        echo "Nessun record modificato";
    }
    // Se c'è stato un errore
    else
    {
        header("Location: error.php"); 
    }

    // Bottone per tornare alla pagina principale
    echo "<br>";
    echo "<button onclick=\"location.href='./index.html'\">Torna alla pagina principale</button>";

    // Chiusura della connessione al database
    $conn->close();
?>