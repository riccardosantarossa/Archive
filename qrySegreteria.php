<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php

session_start();

//Connessione al database
include_once "connessione.php";

$str = "SELECT soci.nome AS n, soci.cognome AS cn
        FROM soci 
        JOIN ingrado ON ingrado.FK_id_Socio = soci.id_Socio
        JOIN servizi ON ingrado.FK_id_Servizio = servizi.id_Servizio
        WHERE servizi.Descrizione = 'Segreteria' AND ingrado.FK_id_Socio IN
        (SELECT soci.id_Socio
         FROM soci 
         JOIN ingrado ON ingrado.FK_id_Socio = soci.id_Socio
         JOIN servizi ON ingrado.FK_id_Servizio = servizi.id_Servizio
         WHERE servizi.Descrizione <> 'Segreteria')";

$output = $conn->query($str);

//Stampo la tabella
echo "<p>VISUALIZZAZIONE DATI DEI SOCI CHE OFFRONO SERVIZIO DI SEGRETERIA E ALTRO</p> <br/>";
echo "<table>";
echo "<tr>";
echo "<th>Nome</th><th>Cognome</th>";

//$riga è un vettore associativo che contiene il risultato della query
while ($riga=mysqli_fetch_array($output,MYSQLI_ASSOC))
{
    //Popolo la tabella
    echo"<tr>";
    echo"<td>".$riga['n']."</td>";
    echo"<td>".$riga['cn']."</td>";
    echo"</tr>";
} 
echo"</tr>";
echo"</table>";

?>