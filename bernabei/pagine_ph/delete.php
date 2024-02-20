<?php
include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    // Ottengo il valore della form
    $codproiezione = $_POST["codproiezione"];

    // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
    $sql = "DELETE FROM PROIEZIONI WHERE CodProiezione = $codproiezione";
    
    // Esecuzione della query di tipo DELETE
    if ($conn->query($sql)) {
        if ($conn->affected_rows > 0) {
            echo "<p>Eliminazione andata a buon fine</p>";
        }
        else {
            echo "<p>Non è stato eliminato nulla</p>";
        }
    } else {
        echo "<p style='color:red'>Errore</p>";
    }

    /* Due possibili casi:
    - La query va a buon fine: il metodo query() restituisce TRUE
    - La query NON va a buon fine (es. sintassi errata): il metodo query() restituisce FALSE

    Tuttavia, anche quando la query elimina 0 elementi va a buon fine (non c'è nessun errore!!)
    Per vedere se è stata eliminata almeno una riga, si usa il campo affected_rows che
    prende in considerazione l'ultima query eseguita e controlla quanto righe sono state "affette".
    */

    ?>
    <a href="index.html">Torna alla home page</a>
</body>
</html>