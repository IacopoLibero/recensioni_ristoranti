<?php
    include 'connessione.php';
    // Recupero dei dati dalla richiesta POST
    $nome = $_POST['Nome'];
    $CodAttore = $_POST['CodAttore'];
    $annoNascita = $_POST['AnnoNascita'];
    $nazionalita = $_POST['Nazionalita'];

    // Creazione della query di inserimento
    $sql = "INSERT INTO attori (CodAttore, Nome, AnnoNascita, Nazionalita)
    VALUES ('$CodAttore', '$nome', '$annoNascita', '$nazionalita')";

    // Esecuzione della query e controllo del risultato
    if ($conn->query($sql) === TRUE) {
        echo "attore aggiunto";
        
    }
    // Se non è stato inserito alcun record
    else 
    {
        header("Location: error.php"); 
    }
    echo "<br>";
    echo "<button onclick=\"location.href='./index.html'\">Torna alla pagina principale</button>";
    $conn->close();

?>
