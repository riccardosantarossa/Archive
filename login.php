
<head>
<link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<form method="POST" action="login.php" class="form" style="height: fit-content;">

<p class="subtitle">INSERISCI LE CREDENZIALI PER ACCEDERE</p>

    
<div class="input-container ic1">

    <input type="text" name="txtMail" class="input" id="mail" placeholder=" "> 

    <label for="mail" class="placeholder"> Mail </label>

    </div>

    <div class="input-container ic1">

    <input type="password" name="txtPassword" class="input" id="psw" placeholder=" "> 

    <label for="psw" class="placeholder"> Password </label>

    </div>

    <input type="submit" value="ACCEDI" class="submit"/>



</form>

<?php 
	
if(isset($_POST ['txtMail']))
{
    //Connessione al database
    include_once "connessione.php";

    //Estraggo la lista di credenziali dal database
    $ricerca = "SELECT utenti.Email, credenziali.psw FROM utenti JOIN credenziali ON utenti.FK_ID_Credenziali = credenziali.idCredenziali ";
    $risultato = $conn->query($ricerca);
    $mail = $_POST['txtMail'];
    $password = $_POST['txtPassword'];
    $checkPsw = false;
    $checkmail = false;

    while($row = mysqli_fetch_array($risultato))
    {   
        //Controllo se la mail salvata nel database corrisponde a quella inserita dall'utente e confronto gli HASH delle password
        if($row['Email'] == $mail && sha1($password) == $row['psw'])
        {
            $checkmail = true;
            $checkPsw = true;
        }           
    }

    //Se entrambe le credenziali sono valide faccio avanzare l'utente alla pagina principale
    if($checkmail && $checkPsw)
    {
        echo "<p>LOGIN EFFETTUATO CON SUCCESSO</p>";
        session_start();
        $_SESSION['utente'] = $mail;
        header('Location: mainPage.php');
        exit;
    }
    //Altrimenti faccio reinserire l'utente avvisandolo dell'errore
    else    
        echo "<p>NOME UTENTE O PASSWORD NON CORRETTI</p>";
}

?>