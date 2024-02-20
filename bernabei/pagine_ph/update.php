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
            // Ottengo i valori della form
            $idRecensione = $_POST["idrecensione"];
            $voto = $_POST["voto"];

            // Metto la query di UPDATE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
            $sql = "UPDATE RECENSIONI SET Voto = $voto WHERE idRecensione = $idRecensione";
            
            // Esecuzione della query di tipo UPDATE
            if ($conn->query($sql)) {
                if ($conn->affected_rows > 0) {
                    echo "<p>Aggiornamento andato a buon fine</p>";
                }
                else {
                    echo "<p>Non è stato aggiornato nulla</p>";
                }
            } else {
                echo "<p style='color:red'>Errore</p>";
            }

            /* Due possibili casi:
            - La query va a buon fine: il metodo query() restituisce TRUE
            - La query NON va a buon fine (es. sintassi errata): il metodo query() restituisce FALSE

            Tuttavia, anche quando la query aggiorna 0 elementi va a buon fine (non c'è nessun errore!!)
            Per vedere se è stata aggiornata almeno una riga, si usa il campo affected_rows che
            prende in considerazione l'ultima query eseguita e controlla quanto righe sono state "affette".
            */
        ?>
        <a href="index.html">Torna alla home page</a>
    </body>
</html>