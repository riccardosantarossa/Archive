
<?php 

//Controllo lo stato della sessione
session_start();

if (!isset($_SESSION['utente']))
{     
    header('Location:login.php');    
    exit;
} 
else 
{    
    echo "Benvenuto utente ".$_SESSION['utente'] . "<br>"; 
}

?>


<html>

<head>
    <title>PAGINA PRINCIPALE</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="all">

</head>


<body>

<p>BENVENUTO, SEI LOGGATO</p>

<!--Pulsanti per navigare nel sito-->
<form action="index.php" class="form" style="height:fit-content;">

    <input type="submit" value="Torna alla home" class="submit" >

</form>

<form action="logout.php" class="form" style="height: fit-content;">

    <input type="submit" value="LOGOUT" class="submit" >

</form>

</body>