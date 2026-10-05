
<html>

<head>
    <title>VERIFICA CODICE</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>


<body>

<form name="frmCodice" method="POST" action="chkCode.php" class="form" style="height: fit-content;">

    <fieldset>

        <legend class="subtitle">Inserisci il codice di verifica</legend>

        <input type="text" name="txtVerifica" class="subtitle">
        <input type="submit" value="Clicca per verificare il codice" class="submit"/>

    </fieldset>

    
</form>

</body>


</html>

<?php 

    if(isset($_POST ['txtVerifica']))
    {
        $utente = $_SESSION['utente'];
        $code = $_POST['txtVerifica'];

        include_once "connessione.php";

        //Estraggo il codice di autenticazione dell'utente dalla tabella 
        $str = "SELECT vcode 
                FROM credenziali 
                JOIN utenti ON credenziali.idCredenziali = utenti.FK_ID_Credenziali
                WHERE utenti.Email = '".$utente."'";
        
        $risultato = $conn->query($str);

        while($row = $risultato->fetch_assoc())
        {
            //Controllo se il codice che l'utente inserisce è uguale a quello che si trova nella tabella
            if($row['vcode'] == $code)
                //Se il confronto va a buon fine, l'utente viene reindirizzato alla pagina di login
                header('Location: login.php');
            else
                echo "Codice inserito non corretto";
        }
        
    }

?>


