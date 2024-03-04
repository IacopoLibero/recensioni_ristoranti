<?php

include('../pagine_ph/connessione.php');  // Questo include il file di connessione in modo da poter utilizzare $conn in questa pagina
session_start();
$username = $_POST['username'];
$password = $_POST['pw'];

// Imposta il login a false e l'utente a vuoto
$_SESSION['log'] = false;
$_SESSION['user'] = "";
// Verifica se l'username esiste nel database
$checkQuery = "SELECT * FROM utente WHERE username = '$username'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) 
    {
        // Reindirizza alla pagina del dashboard se la password è corretta
        header("Location: ..\pagine_ph\dashboard.php");
        $_SESSION['log'] = true;
        $_SESSION['user'] = $username;
    }
    else 
    {
        // Imposta il messaggio di stato e reindirizza alla pagina di indice se la password è incorretta
        $_SESSION['status'] = "Password errata";
        header("Location: ..\index.php");
    }
}
else 
{
    // Imposta il messaggio di stato e reindirizza alla pagina di indice se l'username non viene trovato
    $_SESSION['status'] = "Username non trovato";
    header("Location: ..\index.php");
}
?>