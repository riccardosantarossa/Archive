<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php

session_start();

//Connessione al database
include_once "connessione.php";

//Contiene il valore dell'elemento selezionato nella combobox
$filtro = $_POST ['cmbZone'];
$str = "SELECT servizi.Descrizione AS Servizio 
        FROM servizi 
        JOIN ingrado ON servizi.id_Servizio = ingrado.FK_id_Servizio
        JOIN soci ON ingrado.FK_id_Socio = soci.id_Socio
        JOIN zone ON soci.FK_id_Zona = zone.id_Zona
        WHERE zone.id_Zona=?";

$query = $conn->prepare($str);
$query->bind_param('i',$filtro);
$query->execute();

$output = $query->get_result();

//Stampo la tabella
echo "<p>VISUALIZZAZIONE SERVIZI OFFERTI NELLA ZONA SELEZIONATA</p><br/>";
echo "<table>";
echo "<tr>";
echo "<th>Servizi offerti</th>";

//$riga è un vettore associativo che contiene il risultato della query
while ($riga=mysqli_fetch_array($output,MYSQLI_ASSOC))
{
    //Popolo la tabella
    echo"<tr>";
    echo"<td>".$riga['Servizio']."</td>";
    echo"</tr>";
} 
echo"</tr>";
echo"</table>";