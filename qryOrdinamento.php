<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php

session_start();


//Connessione al database
include_once "connessione.php";

$str = "SELECT servizi.Descrizione AS Descrizione, SUM(prestazioni.oreP) AS Ore
        FROM prestazioni 
        JOIN servizi ON prestazioni.FK_id_Servizio = servizi.Id_Servizio
        GROUP BY servizi.Descrizione
        ORDER BY Ore DESC";

$output = $conn->query($str);

//Stampo la tabella
echo "<p>VISUALIZZAZIONE DELLE PRESTAZIONI ORDINATE PER ORE EROGATE</p> <br/>";
echo "<table>";
echo "<tr>";
echo "<th>Descrizione</th><th>Ore erogate</th>";

//$riga è un vettore associativo che contiene il risultato della query
while ($riga=mysqli_fetch_array($output,MYSQLI_ASSOC))
{
    //Popolo la tabella
    echo"<tr>";
    echo"<td>".$riga['Descrizione']."</td>";
    echo"<td>".$riga['Ore']."</td>";
    echo"</tr>";
} 
echo"</tr>";
echo"</table>";

?>