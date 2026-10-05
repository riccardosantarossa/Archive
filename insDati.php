
<head>
    <title>SISTEMI</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">

</head>

<?php

//Connessione al database
include_once "connessione.php";

//Controllo se la mail inserita in registrazione è già presente
$ricerca = "SELECT utenti.Email FROM utenti";
$risultato = $conn->query($ricerca);
$mail = $_POST['txtMail'];
$check = false;

while($row = mysqli_fetch_array($risultato))
{
    if($row['Email'] == $mail)
        $check = true;
}

//Se non è presente procedo alla registrazione
if(!$check)
{
    //Recupero i dati dalla pagina precedente
    $mail = $_POST['txtMail'];
    $nome = $_POST['txtNome'];
    $cognome = $_POST['txtCognome'];
    $via = $_POST['txtVia'];
    $psw = $_POST['txtPassword'];

    //Cripto la password
    $cript = sha1($psw);

    //Genero il codice da inserire nel DB e da mandare via mail per conferma
    $uniqueCode = uniqid();

    //Inserimento nelle due tabelle
    $query1 = "INSERT INTO credenziali(psw,vcode) 
               VALUES (?,?)";

    //Query preparata con parametri
    $qry1 = $conn->prepare($query1);
    $qry1->bind_param('ss',$cript,$uniqueCode);
    $qry1->execute();
    
    $query2 = "INSERT INTO utenti(Nome,Cognome,Indirizzo,Email,FK_ID_Credenziali)
               VALUES (?,?,?,?,(SELECT idCredenziali FROM credenziali ORDER BY idCredenziali DESC LIMIT 1))";
    
    //Query preparata con parametri
    $qry = $conn->prepare($query2);
    $qry->bind_param('ssss', $nome,$cognome,$via,$mail);
    $qry->execute();

    echo "Registrazione avvenuta con successo, controlla la casella di posta per il link di conferma <br/>";
    
    //Attivo la sessione con la mail dell'utente come username
    session_start();
    $_SESSION['utente'] = $mail;
    
    //Invio della mail 
    $dest = $mail;
    $oggetto = "Verifica della registrazione";
    $testo = "Inserisci questo codice sul sito per poter fare il login: " . $uniqueCode;
    mail($dest,$oggetto,$testo,'From: phplocalsender@gmail.com');

}
else
    echo "Mail già inserita, riprovare";
    ?>

<!--Se la registrazione va a buon fine mostro il tasto per avanzare alla schermata successiva-->
<?php if(!$check) : ?>
<form name="frmNav" action="chkCode.php">
    <input type="submit" value="Clicca per navigare alla pagina di verifica del codice" />
</form>

<!--Se la registrazione non va a buon fine mostro il tasto per tornare alla home-->
<?php else :?>
<form action="registrazione.php">
    <input type="submit" value="Torna indietro" />
</form>
<?php endif; ?>





