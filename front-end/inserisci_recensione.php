<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION['log']== false) 
        {
            $_SESSION['status'] = "Devi fare il login per accedere a questa pagina";
            header("Location: ..\index.php");
        }
    ?>
    <div class="row">
        <div class="card mx-auto my-5" style="width: 18rem; border-color: blue; border-style: solid;" >
            <div class="card-body text-center" >
            <h5 class="card-title">Inserisci attore</h5>
            <form method="POST" action="../script_php/inserisci_att.php">
                Nome: <br>
                <input type="text" name="nome" class="form-control" required placeholder="Mario"><br>
        
                Anno di nascita: <br>
                <input type="number" name="annonascita" class="form-control" required placeholder="1960"><br>
        
                Nazionalità: <br>
                <input type="text" name="nazionalita" class="form-control" required placeholder="italia">
                <hr>
                <input type="submit" class="btn btn-primary"  required value="Inserisci">
            </form>
            </div>
        </div>
    </div>
</body>
</html>