<?php

    include('connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

    $username = $_POST['username'];
    $password = $_POST['pw'];

    $checkQuery = "SELECT * FROM utenti WHERE username = $username";
    $result = $conn->query($checkQuery);

    if ($result->affected_rows > 0) 
    {
        echo "<script>alertone()</script>";
    }
    else
    {
        header("Location: ..\pagine_html\dashboard.html");
    }
?>

<script>
    function alertone(){
        alert("mi sudano le palle");
    }
</script>