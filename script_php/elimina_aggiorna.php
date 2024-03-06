<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
?>

<?php
    $idRecensione = $_POST["idrecensione"];
    $voto = $_POST["voto"];
    if(isset($_POST["agg"]))
    {
        // L'idRecensione esiste nel database, esegui l'aggiornamento
        $sql = "UPDATE RECENSIONI SET Voto = $voto WHERE IDRecensione = $idRecensione";

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
        // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
        $sql = "DELETE FROM RECENSIONI WHERE IDRecensione = $idRecensione";
        if ($conn->query($sql)) 
        {
            header("Location: ..\status\success.html");
        } 
        else 
        {
            header("Location: ..\status\\fail.html");
        }
    }
?>