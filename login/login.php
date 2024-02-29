
<?php

include('../pagine_ph/connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
session_start();
$username = $_POST['username'];
$password = $_POST['pw'];

$checkQuery = "SELECT * FROM utente WHERE username = '$username'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) 
    {
        echo "<script>alert('Login effettuato');</script>";
        header("Location: ..\pagine_html\dashboard.html");
    } 
    else 
    {
        $_SESSION['login'] = "Password errata";
        header("Location: stato.php");
    }
}
else 
{
    $_SESSION['login'] = "Username non trovato";
    header("Location: stato.php");
}
?>