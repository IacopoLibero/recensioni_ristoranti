<?php
    include 'connessione.php';
    // Recupero dell'ID dalla richiesta POST
    $id = $_POST['CodProiezione'];

    // Creazione della query di eliminazione
    $sql = "DELETE FROM proiezioni WHERE CodProiezione=$id";

    // Esecuzione della query e controllo del risultato se è stato inserito un record
    if ($conn->query($sql) === TRUE && $conn->affected_rows > 0)
    {
        echo "proiezione eliminata";
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

    // Pulsante per tornare alla pagina principale
    echo "<br>";
    echo "<button onclick=\"location.href='./index.html'\">Torna alla pagina principale</button>";

    // Chiusura della connessione al database
    $conn->close();
?>