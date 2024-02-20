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
        
            if(isset($_POST["voto"]))
            {
                // Ottengo i valori della form
                $idRecensione = $_POST["id"];
                $voto = $_POST["voto"];

                // Metto la query di UPDATE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
                $sql = "UPDATE RECENSIONI SET Voto = $voto WHERE idRecensione = $idRecensione";
                
                // Esecuzione della query di tipo UPDATE
                if ($conn->query($sql)) {
                    if ($conn->affected_rows > 0) 
                    {
                        header("Location: ..\status\aggiornamento_ok.html");
                    }
                    else 
                    {
                        header("Location: ..\status\aggiornamento_fail.html");
                    }
                } 
                else 
                {
                    header("Location: ..\status\aggiornamento_fail.html");
                }
            }
            else
            {
                // Ottengo il valore della form
                $codVoto = $_POST["id"];

                // Metto la query di DELETE in una stringa stando attendo alle stringhe (hanno bisogno degli apici)
                $sql = "DELETE FROM recensioni WHERE IDRecensione = $codVoto";
                
                // Esecuzione della query di tipo DELETE
                if ($conn->query($sql)) 
                {
                    if ($conn->affected_rows > 0) 
                    {
                        header("Location: ..\status\eliminazione_ok.html");
                    }
                    else 
                    {
                        header("Location: ..\status\eliminazione_fail.html");
                    }
                } 
                else 
                {
                    header("Location: ..\status\eliminazione_fail.html");
                }
            }

        ?>
    </body>
</html>