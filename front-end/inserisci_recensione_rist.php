<?php
include('..\script_php\connessione.php');  // Questo include la connessione in modo da poter utilizzare $conn in questa pagina
?>
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
            <h5 class="card-title">Inserisci recensione</h5>
            <form method="POST" action="../script_php/inserisci_recensione_ristorante.php">
                Nome ristorante: <br>
                <?php
                    $query = "SELECT nome FROM ristorante";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) 
                    {
                        echo "<div class='btn-group'> ";
                        echo "<div class='btn-group'>";
                        echo "<select name='ristorante' class='btn dropdown-toggle text-center' style='background-color: aqua;' data-bs-toggle='dropdown' aria-expanded='false'>";
                        mysqli_data_seek($result, 0); 
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            echo "<option value='".$row['codice']."'>".$row['nome']."</option>";
                        }
                        echo "</select>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                <br>
                <br>
                Voto: <br>
                <input type="number" name="voto" class="form-control" required placeholder="5"><br>
        
                Data recensione: <br>
                <input type="date" name="data" class="form-control" required><br>

                <?php
                        if(isset($_GET['Message']))
                        {
                            echo "<br>";
                            if($_GET['Message'] == "Recensione inserita con successo")
                            {
                                echo "<label class='text-success'>".$_GET['Message']."</label>";
                            }
                            else
                            {
                                echo "<label class='text-danger'>".$_GET['Message']."</label>";
                            }
                        }
                    ?>
                <hr>
                <input type="submit" class="btn btn-primary"  required value="Inserisci">
            </form>
            </div>
            <div class="row">
            <div class="text-center col-12">
                <a href="dashboard.php" class="btn btn-primary text-center my-2">home</a>
            </div>
            
        </div>
    </div>
</body>
</html>