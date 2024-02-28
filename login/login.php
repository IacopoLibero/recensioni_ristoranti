
<?php

include('../pagine_ph/connessione.php');  // Questo richiama la connessione quindi possiamo usare $conn in questa pagina

$username = $_POST['username'];
$password = $_POST['pw'];


$checkQuery = "SELECT * FROM utenti WHERE username = $username";
$result = $conn->query($checkQuery);


while($row = $result->fetch_assoc()) 
{
    if ($row['password'] == $password) 
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['pw'] = $password;
        header("Location: ..\pagine_html\dashboard.html");
    } 
    else 
    {
        echo "<script language='JavaScript'>n"; 
        echo "alert('Username o password errati');n"; 
        echo "</script>"; 
        header("Location: ..\pagine_html\login.html");
    }
}    

?>

