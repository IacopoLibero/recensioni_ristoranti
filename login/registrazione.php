<?php
    session_start();
    include('..\pagine_ph\connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pw'];

    $checkQuery = "SELECT * FROM utente WHERE username = '$username'";
    $result = $conn->query($checkQuery);
    
    if($result->num_rows == 0)
    {
        $query = "INSERT INTO utente (username,password,nome,cognome,email) VALUES ('$username','$password','$nome', '$cognome', '$email')";
        if ($conn->query($query)) 
        {
            $_SESSION['login'] = "Registrazione effettuata";
            header("Location: stato.php");
        } 
        else 
        {
            $_SESSION['login'] = "Email gia esistente";
            header("Location: stato.php");
        }
    }
    else 
    {
        $_SESSION['login'] = "Utente gia esistente";
        header("Location: stato.php");
    }
    
?>
