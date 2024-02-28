
<?php

include('../pagine_ph/connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

$username = $_POST['username'];
$password = $_POST['pw'];


$checkQuery = "SELECT * FROM utenti WHERE username = $username";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) 
{
    echo "<script>username_o_pw_err()</script>";
} else 
{
    header("Location: ..\pagine_html\dashboard.html");
}
?>

<script type="text/javascript" src="..\script.js"></script>
