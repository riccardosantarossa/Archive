<head>
    <title>Banca del Tempo</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
</head>

<form name="frm1" method="POST" action="insDati.php">

    <fieldset>

        <legend align="left">
            Inserisci i tuoi dati per registrarti
        </legend>

        Inserisci il nome :

        <input type="text" name="txtNome"> <br/> <br/>

        Inserisci il cognome :

        <input type="text" name="txtCognome"> <br/> <br/>

        Inserisci il numero di telefono :

        <input type="text" name="txtTelefono"> <br/> <br/>

        Inserisci la via :

        <input type="text" name="txtVia"> <br/> <br/>

        Seleziona la zona 
        
        <select name="cmbregZona">
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
        
        <br/> <br/>


        Inserisci la mail  :

        <input type="text" name="txtMail"> <br/> <br/>

        Inserisci la password  :

        <input type="password" name="txtPassword"> <br/> <br/>

        <!--pulsante che punta alla pagina PHP definita nell'action della form-->
        <input type="submit" value="REGISTRATI" />

    </fieldset>

</form>

<form action="index.php">
    <input type="submit" value="Torna alla home" />
</form>

