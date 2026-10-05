<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php

session_start();


//Connessione al database
include_once "connessione.php";

$str = "SELECT s.*, SUM(oreP) AS orericevute
        FROM soci s, prestazioni p
        WHERE s.id_Socio = p.FK_id_socioRiceve
        GROUP BY s.id_Socio
        HAVING orericevute > (SELECT SUM(oreP)
                              FROM prestazioni p
                              WHERE s.id_Socio = p.FK_id_SocioDa)";

$output = $conn->query($str);

//Stampo la tabella
echo "<p>VISUALIZZAZIONE DATI DEI SOCI CHE SONO IN DEBITO DI ORE</p> <br/>";
echo "<table>";
echo "<tr>";
echo "<th>Nome</th><th>Cognome</th><th>Telefono</th>";

//$riga è un vettore associativo che contiene il risultato della query
while ($riga=mysqli_fetch_array($output,MYSQLI_ASSOC))
{
    //Popolo la tabella
    echo"<tr>";
    echo"<td>".$riga['nome']."</td>";
    echo"<td>".$riga['cognome']."</td>";
    echo"<td>".$riga['numeroTel']."</td>";
    echo"<td>".$riga['via']."</td>";
    echo"</tr>";
} 
echo"</tr>";
echo"</table>";

?>