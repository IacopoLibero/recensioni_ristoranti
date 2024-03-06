<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    // Ottengo il valore della form
    $codproiezione = $_POST["codproiezione"];

    // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
    $sql = "DELETE FROM proiezioni WHERE CodProiezione = $codproiezione";
    if ($conn->query($sql)) 
    {
        if ($conn->affected_rows > 0) 
        {
            header("Location: ..\status\success.html");
        }
        else 
        {
            header("Location: ..\status\\fail.html");
        }
    }
    else 
    {
        header("Location: ..\status\\fail.html");
    }
?>