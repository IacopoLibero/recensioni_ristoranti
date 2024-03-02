
<?php

include('../pagine_ph/connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina
session_start();
$username = $_POST['username'];
$password = $_POST['pw'];
$_SESSION['log'] = false;
$_SESSION['user'] = "";
$checkQuery = "SELECT * FROM utente WHERE username = '$username'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) 
    {
        header("Location: ..\pagine_html\dashboard.php");
        $_SESSION['log'] = true;
        $_SESSION['user'] = $username;
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