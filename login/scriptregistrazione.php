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
            $_SESSION['status'] = "Registrazione effettuata";
            header("Location: ..\index.php");
        } 
        else 
        {
            $_SESSION['status'] = "Email gia esistente";
            header("Location: registrazione.php");
        }
    }
    else 
    {
        $_SESSION['status'] = "Utente gia esistente";
        header("Location: registrazione.php");
    }
    
?>
