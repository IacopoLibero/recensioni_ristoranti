<!DOCTYPE html>
<?php
include('..\script_php\connessione.php');  // Questo include la connessione in modo da poter utilizzare $conn in questa pagina
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
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
    <div class=" text-light bg-dark">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" id="profilo" fill="currentColor" class="mx-3 my-3 bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg>
        <h1 class="text-center">Pagina di accesso al database recensioni</h1>
        <br>
        <div style="display:none;" id="prof" class="mx-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php
                            echo "<p>Ciao @".$_SESSION['user']."</p>";
                            $sql="SELECT count(*) FROM recensione JOIN utente ON recensione.idutente=utente.id WHERE username='".$_SESSION['user']."'";
                            
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            $count = $row[0];
                            if ($count == 0) {
                                echo "Nessuna recensione presente";
                            }
                            else
                            {
                                echo "Numero di recensioni effettuate: ".$count;
                            }
                            
                        ?>
                    </h5>
                    <a href="../login/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div> 
            <br>
        </div>
    </div>

    <div class="row px-5 py-5">
        <div class="text-center px-5 py-5 col-lg-4 col-md-6 col-12">
            <div class="card" sty text-centerle="width: 18rem;" style="border-color: blue; border-style: solid;">
                <div class="card-body mx-auto">
                    <h5 class="card-title ">Visualizza le tue recensioni</h5>
                    <a href="..\front-end\visualizza_recensioni_utente.php" class="btn btn-primary">go</a>
                </div>
            </div>
        </div>

        <div class="text-center px-5 py-5 col-lg-4 col-md-6 col-12">
            <div class="card" sty text-centerle="width: 18rem;" style="border-color: blue; border-style: solid;">
                <div class="card-body">
                    <h5 class="card-title">Cambia password</h5>
                    <a href="..\front-end\cambio_password.php" class="btn btn-primary">go</a>
                </div>
            </div>
        </div>
        <div class="text-center px-5 py-5 col-lg-4 col-md-6 col-12">
            <div class="card" sty text-centerle="width: 18rem;" style="border-color: blue; border-style: solid;">
                <div class="card-body">
                    <h5 class="card-title">Inserisci recensione</h5>
                    <a href="..\front-end\inserisci_recensione.php" class="btn btn-primary">go</a>
                </div>
            </div>
        </div>
        
        <div class="text-center px-5 py-5 col-lg-6 col-md-6 col-12">
            <div class="card" sty text-centerle="width: 18rem;" style="border-color: blue; border-style: solid;">
                <div class="card-body">
                    <h5 class="card-title">Gestisci recensione</h5>
                    <a href="..\front-end\gestisci_recensioni.php" class="btn btn-primary">go</a>
                </div>
            </div>
        </div>
        
        <div class="text-center px-5 py-5 col-lg-6 col-md-6 col-12">
            <div class="card" sty text-centerle="width: 18rem;" style="border-color: blue; border-style: solid;">
                <div class="card-body">
                    <h5 class="card-title">Visualizza recensioni ristorante</h5>
                    <a href="..\front-end\visualizza_recensioni_rist.php" class="btn btn-primary">go</a>
                </div>
            </div>
        </div>        
    </div>
</body>
</html>
<script>
    document.getElementById("profilo").addEventListener("click", function () 
    {
        let y = document.getElementById("prof");
        
        if (y.style.display == "none") 
        {
            y.style.display = "block";
        } 
        else 
        {
            y.style.display = "none";
        }
        
    });
</script>