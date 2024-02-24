<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
?>

<?php

    if(isset($_POST["agg"]))
    {
       // Ottengo i valori della form
        $idRecensione = $_POST["id"];
        $voto = $_POST["voto"];

        // Verifica se l'idRecensione esiste nel database
        $query = "SELECT * FROM RECENSIONI WHERE idRecensione = $idRecensione";
        $result = $conn->query($query);

        if ($result->num_rows > 0) 
        {
            // L'idRecensione esiste nel database, esegui l'aggiornamento
            $sql = "UPDATE RECENSIONI SET Voto = $voto WHERE idRecensione = $idRecensione";

            if ($conn->query($sql)) 
            {
                // Aggiornamento riuscito, redirect a success.html
                header("Location: ../status/success.html");
            } 
            else 
            {
                // Errore nell'esecuzione dell'aggiornamento, redirect a fail.html
                header("Location: ../status/fail.html");
            }
        } 
        else 
        {
            // L'idRecensione non esiste nel database, redirect a fail.html
            header("Location: ../status/fail.html");
        }
    }
    else
    {
        // Ottengo il valore della form
        $codVoto = $_POST["id"];
        // Metto la query di SELECT in una stringa
        $sql = "SELECT * FROM recensioni WHERE IDRecensione = $codVoto";

        // Esecuzione della query di tipo SELECT
        $result = $conn->query($sql);

        // Controllo se ci sono risultati
        if ($result->num_rows >= 0) 
        {
            // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
            $sql = "DELETE FROM recensioni WHERE IDRecensione = $codVoto";
            if ($conn->query($sql)) 
            {
                if ($conn->affected_rows > 0) 
                {
                    header("Location: ..\status\success.html");
                }
                else 
                {
                    header("Location: ..\status\fail.html");
                }
            }
        } 
        else 
        {
            header("Location: ..\status\fail.html");
        }
    }
?>