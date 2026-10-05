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
$filtro = $_POST ['cmbServizio'];
$str = "SELECT s1.cognome AS cognomeRicevente, s2.cognome AS cognomeOfferente, tipi_servizio.Descrizione AS TipoServ, servizi.Descrizione AS DescServ, prestazioni.dataP AS Data, prestazioni.oreP AS Ore 
        FROM prestazioni 
        JOIN soci s1 ON prestazioni.FK_id_socioRiceve=s1.id_Socio 
        JOIN soci s2 ON prestazioni.FK_id_SocioDa=s2.id_Socio 
        JOIN servizi ON prestazioni.FK_id_Servizio=servizi.id_Servizio 
        JOIN tipi_servizio ON servizi.FK_id_TipoServizio=tipi_servizio.id_TipoServ 
        WHERE prestazioni.FK_id_Servizio=?";

$query = $conn->prepare($str);
$query->bind_param('i',$filtro);
$query->execute();

$output = $query->get_result();

//Stampo la tabella
echo "<p>VISUALIZZAZIONE PRESTAZIONI DEL SERVIZIO SCELTO</p> <br/>";
echo "<table>";
echo "<tr>";
echo "<th>Ricevente</th><th>Offerente</th><th>TipoServizio</th><th>Descrizione</th><th>Data</th><th>Ore</th>";

//$riga è un vettore associativo che contiene il risultato della query
while ($riga=mysqli_fetch_array($output,MYSQLI_ASSOC))
{
    //Popolo la tabella
    echo"<tr>";
    echo"<td>".$riga['cognomeRicevente']."</td>";
    echo"<td>".$riga['cognomeOfferente']."</td>";
    echo"<td>".$riga['TipoServ']."</td>";
    echo"<td>".$riga['DescServ']."</td>";
    echo"<td>".$riga['Data']."</td>";
    echo"<td>".$riga['Ore']."</td>";
    echo"</tr>";
} 
echo"</tr>";
echo"</table>";

?>