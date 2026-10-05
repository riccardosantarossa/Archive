<html>

<head>
    <title>Banca Del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php
session_start();

if (!isset($_SESSION['utente']))
{     
    header('Location:login.php');    
    exit;
} 
else 
{    
    echo "Benvenuto utente ".$_SESSION['utente'];
}
?>


<body>

<p>PAGINA DELLE FUNZIONI DEL SITO</p>

</body>

    <form name="frm1" method="POST" action="qryPrestazioni.php">

    <fieldset>

        <legend align="left">
            Visualizza i dati delle prestazioni relative a un servizio dato
        </legend>

        Seleziona il servizio 
        
        <select name="cmbServizio">
            <?php
                
                //connetto al database utilizzando PHP dentro al codice HTML
                include_once "connessione.php";
                //query che seleziona i campi della tabella servizi
                $ricerca = "SELECT id_Servizio,Descrizione FROM servizi";
                $risultato = $conn->query($ricerca);

                //stampo il risultato come array associativo
                while ($riga=mysqli_fetch_array ($risultato))
                {
                    //la combobox è popolata con i dati trovati dalla query
                    echo "<option value=".$riga['id_Servizio'].">"; 
                    echo  $riga['Descrizione'];                           
                    echo "</option>";
                }
            ?>

        </select>
        
        <br/>

        <!--pulsante che punta alla pagina PHP definita nell'action della form-->
        <input type="submit" value="Visualizza" />

    </fieldset>

    </form>

    <form name="frm2" method="POST" action="qryZone.php">

    <fieldset>

        <legend align="left">
            Visualizza i servizi offerti in una zona selezionata 
        </legend>

        Seleziona la zona 
        
        <select name="cmbZone">
            <?php
                
                //connetto al database utilizzando PHP dentro al codice HTML
                include_once "connessione.php";
                //query che seleziona i campi della tabella servizi
                $ricerca = "SELECT id_Zona,Descrizione FROM zone";
                $risultato = $conn->query($ricerca);

                //stampo il risultato come array associativo
                while ($riga=mysqli_fetch_array ($risultato))
                {
                    //la combobox è popolata con i dati trovati dalla query
                    echo "<option value=".$riga['id_Zona'].">"; 
                    echo  $riga['Descrizione'];                           
                    echo "</option>";
                }
            ?>

        </select>
        
        <br/>

        <!--pulsante che punta alla pagina PHP definita nell'action della form-->
        <input type="submit" value="Visualizza" />

    </fieldset>

    </form>

    <form name="frm3" method="POST" action="qryPrestazioniPerZona.php">

    <fieldset>

        <legend align="left">
            Visualizza i soci che possono erogare la prestazione scelta in quella zona 
        </legend>

        Seleziona il servizio 
        
        <select name="cmbServ">
            <?php
                
                //connetto al database utilizzando PHP dentro al codice HTML
                include_once "connessione.php";
                //query che seleziona i campi della tabella servizi
                $ricerca = "SELECT id_Servizio,Descrizione FROM servizi";
                $risultato = $conn->query($ricerca);

                //stampo il risultato come array associativo
                while ($riga=mysqli_fetch_array ($risultato))
                {
                    //la combobox è popolata con i dati trovati dalla query
                    echo "<option value=".$riga['id_Servizio'].">"; 
                    echo  $riga['Descrizione'];                           
                    echo "</option>";
                }
            ?>

        </select>
        
        <br/>

        Seleziona la zona 
        
        <select name="cmbZone2">
            <?php
                
                //connetto al database utilizzando PHP dentro al codice HTML
                include_once "connessione.php";
                //query che seleziona i campi della tabella servizi
                $ricerca = "SELECT id_Zona,Descrizione FROM zone";
                $risultato = $conn->query($ricerca);

                //stampo il risultato come array associativo
                while ($riga=mysqli_fetch_array ($risultato))
                {
                    //la combobox è popolata con i dati trovati dalla query
                    echo "<option value=".$riga['id_Zona'].">"; 
                    echo  $riga['Descrizione'];                           
                    echo "</option>";
                }
            ?>

        </select>
        
        <br/>

        <!--pulsante che punta alla pagina PHP definita nell'action della form-->
        <input type="submit" value="Visualizza" />

    </fieldset>

    </form>
0

    <fieldset>

        <legend align="left">
            Visualizza le prestazioni in ordine di ore decrescente
        </legend>        

    <input type="submit" value="Visualizza"/>
    </fieldset>
    </form>

    <form name="frm4" method="POST" action="qrySegreteria.php">

    <fieldset>

        <legend align="left">
            Visualizza i soci che sono in grado di offrire sevizio di segreteria e altro 
        </legend>        

    <input type="submit" value="Visualizza"/>
    </fieldset>
    </form>
    
    <form name="frm6" method="POST" action="qryDebito.php">

    <fieldset>

        <legend align="left">
            Visualizza i dati dei soci che sono in debito di ore
        </legend>        

    <input type="submit" value="Visualizza"/>
    </fieldset>
    </form>
    
    <form name="logout" action="logout.php">

    <input type="submit" value="LOGOUT"/>
  
    </form>

</html>