<?php
    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
    session_start();
    // Ottengo i valori della form
    $codice_rist = $_POST["ristorante"];
    $voto = $_POST["voto"];
    $data = $_POST["data"];

    $sql = "SELECT id FROM utente WHERE username = '".$_SESSION['user']."'"; // Ottengo il codice dell'utente
    $utente = $conn->query($sql);
    $utente = $utente->fetch_assoc();
    $utente = $utente['id'];

    // Controllo se l'utente ha già recensito il ristorante
    $sql="SELECT COUNT(*) as numero FROM 'recensione' WHERE idutente = '".$utente."' AND codiceristorante = '".$codice_rist."'"; // Controllo se l'utente ha già recensito il ristorante
    $n_rec = $conn->query($sql);

    if($n_rec> 0)
    {
        $Message = urlencode("Hai già recensito questo ristorante");
        header("Location: ../front-end/inserisci_recensione_rist.php?Message=".$Message);
    }
    else if($voto < 1 || $voto > 5)
    {
        $Message = urlencode("Il voto deve essere compreso tra 1 e 5");
        header("Location: ../front-end/inserisci_recensione_rist.php?Message=".$Message);
    }
    else
    {
        $sql = "INSERT INTO RECENSIONE (voto, data, idutente, codiceristorante) VALUES ('$voto', '$data', '$utente', '$codice_rist')";
        $conn->query($sql);
        $Message = urlencode("Recensione inserita con successo");
        header("Location: ../front-end/inserisci_recensione_rist.php?Message=".$Message);
    }
?>