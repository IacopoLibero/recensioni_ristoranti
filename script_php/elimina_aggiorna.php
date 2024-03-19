<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
?>

<?php
    $idRecensione = $_POST["idrecensione"];
    $voto = $_POST["voto"];
    if(isset($_POST["agg"]))
    {
        // L'idRecensione esiste nel database, esegui l'aggiornamento
        $sql = "UPDATE recensione SET voto = $voto WHERE idrecensione = $idRecensione";

        if ($conn->query($sql)) 
        {
            $Message = urlencode("Recensione aggiornata con successo");
            header("Location: ../front-end/gestisci_recensioni.php?Message=".$Message);
        } 
        else 
        {
            $Message = urlencode("Recensione non aggiornata");
            header("Location: ../front-end/gestisci_recensioni.php?Message=".$Message);
        }
    }
    else
    {
        // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
        $sql = "DELETE FROM recensione WHERE idrecensione = $idRecensione";
        if ($conn->query($sql)) 
        {
            $Message = urlencode("Recensione eliminata con successo");
            header("Location: ../front-end/gestisci_recensioni.php?Message=".$Message);
        } 
        else 
        {
            $Message = urlencode("Recensione non eliminata");
            header("Location: ../front-end/gestisci_recensioni.php?Message=".$Message);
        }
    }
?>