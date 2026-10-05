<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>


<form name="frmLogin" method="POST" action="login.php">

    <p>INSERISCI LE CREDENZIALI PER ACCEDERE</p>

    
    Inserisci la mail  :

    <input type="text" name="txtMail"> <br/> <br/>

    Inserisci la password  :

    <input type="password" name="txtPassword"> <br/> <br/>

    <input type="submit" value="ACCEDI">

</form>

<form action="index.php">
    <input type="submit" value="Torna alla home" />
</form>

<?php

if(isset($_POST ['txtMail']))
{
    //Connessione al database
    include_once "connessione.php";

    $ricerca = "SELECT soci.mail, soci.psw FROM soci";
    $risultato = $conn->query($ricerca);
    $mail = $_POST['txtMail'];
    $password = $_POST['txtPassword'];
    $crypt = sha1($password);
    $checkPsw = false;
    $checkmail = false;

    while($row = mysqli_fetch_array($risultato))
    {
        if($row['mail'] == $mail && $row['psw']== $crypt)
        {
            $checkmail = true;
            $checkPsw = true;
        }           
    }

    if($checkmail && $checkPsw)
    {
        echo "<p>LOGIN EFFETTUATO CON SUCCESSO</p>";
        session_start();
        $_SESSION['utente'] = $mail;
        header('Location:menu.php');
        exit;
    }
    else    
        echo "<p>NOME UTENTE O PASSWORD NON CORRETTI</p>";

}
?>