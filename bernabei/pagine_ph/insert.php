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
    $codattore = $_POST["codattore"];
    $nome = $_POST["nome"];
    $annoNascita = $_POST["annonascita"];
    $nazionalita = $_POST["nazionalita"];

    // Metto la query di INSERT in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
    // L'ordine che bisogna seguire nella tabella ATTORI è CodAttore, Nome, AnnoNascita, Nazionalita
    $sql = "INSERT INTO ATTORI VALUES ($codattore, '$nome', $annoNascita, '$nazionalita')";
    
    // Esecuzione della query di tipo INSERT
    if ($conn->query($sql)) {
        echo "<p>Inserimento andato a buon fine</p>";
    } else {
        echo "<p style='color:red'>Errore</p>";
    }

    /* Due possibili casi:
    - La query va a buon fine: il metodo query() restituisce TRUE
    - La query NON va a buon fine (es. duplicato, sintassi errata): il metodo query() restituisce FALSE
    */

    ?>
    <a href="index.html">Torna alla home page</a>
</body>
</html>