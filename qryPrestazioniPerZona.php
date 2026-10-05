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
$filtroZona = $_POST ['cmbZone2'];
$filtroServizio = $_POST['cmbServ'];

$str = "SELECT soci.nome AS nome, soci.cognome AS cognome, soci.numeroTel AS numeroTel, soci.via AS via
        FROM zone 
        JOIN soci on soci.FK_id_Zona = zone.id_Zona
        JOIN ingrado ON ingrado.FK_id_Socio = soci.id_Socio
        JOIN servizi ON servizi.id_Servizio = ingrado.FK_id_Servizio
        WHERE servizi.id_Servizio=?  AND zone.id_Zona =? ";

$query = $conn->prepare($str);
$query->bind_param('ii', $filtroServizio, $filtroZona);
$query->execute();

$output = $query->get_result();

//Stampo la tabella
echo "<p>VISUALIZZAZIONE DEI DATI DEI SOCI IN GRADO DI OFFRIRE LA PRESTAZIONE DATA IN QUELLA ZONA</p> <br/>";
echo "<table>";
echo "<tr>";
echo "<th>Nome</th><th>Cognome</th><th>Telefono</th><th>Indirizzo</th>";

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