<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php

//Connessione al database
include_once "connessione.php";

$ricerca = "SELECT soci.mail FROM soci";
$risultato = $conn->query($ricerca);
$mail = $_POST['txtMail'];
$check = false;

while($row = mysqli_fetch_array($risultato))
{
    if($row['mail'] == $mail)
        $check = true;
}

if(!$check)
{
    $nome = $_POST['txtNome'];
    $cognome = $_POST['txtCognome'];
    $telefono = $_POST['txtTelefono'];
    $via = $_POST['txtVia'];
    $zona = $_POST['cmbregZona'];
    $psw = $_POST['txtPassword'];

    $cript = sha1($psw);

    $str = "INSERT INTO soci (nome,cognome,numeroTel,via,FK_id_Zona,mail,psw)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
                
    $query = $conn->prepare($str);
    $query->bind_param('ssssiss', $nome,$cognome,$telefono,$via,$zona,$mail,$cript);
    $query->execute();

    echo "Registrazione avvenuta con successo";
    header('Location:index.php');
}          
else
{
    echo "Mail già inserita, TORNARE INDIETRO <br/>";
}

?>

<form action="registrazione.php">

    <input type="submit"  value="TORNA INDIETRO" />

</form>






