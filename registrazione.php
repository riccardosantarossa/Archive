<head>
    <title>SISTEMI</title>
    <!-- Coollegamento al file CSS esterno-->
    <link href="style.css" rel="stylesheet" type="text/css" media="all">

    <script>

    //Controllo dell'input
    function checkData()
    {

        //REGEX per il formato della mail
        var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //var pswFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.[\W]).{8,}$/

        //Leggo i dati inseriti
        let nome = document.forms["frm1"]["txtNome"].value;
        let cognome = document.forms["frm1"]["txtCognome"].value;
        let via = document.forms["frm1"]["txtVia"].value;
        let email = document.forms["frm1"]["txtMail"].value;
        let psw = document.forms["frm1"]["txtPassword"].value;

        //Se un campo è lasciato vuoto faccio comparire un alert 
        if(nome == "" || cognome == "" || via == "" || email == "")
        {
            alert ("Compila tutti i campi del form");
            return false;
            event.preventDefault();
        }
        else
            return true;
        
        //Se la mail non è valida, ad esempio non contiene la chiocciola, compare un alert
        if(!email.match(mailformat))
        {
            alert ("Mail inserita non vailda");
            return false;
            event.preventDefault();
        }
        else
            return true;

        //Se la password è troppo corta compare un alert
        if(psw.length<6)
        {
            alert ("La password deve contenere almeno 6 caratteri");
            return false;
            event.preventDefault();
        }
        else
            return true;

    } 

    </script>

</head>

<!--Form di inserimento dati-->
<form name="frm1" method="POST" action="insDati.php" class="form" onsubmit="checkData();">


        <legend align="left" class="subtitle" style="width: fit-content;">
            Inserisci i tuoi dati per registrarti
        </legend>

        <div class="input-container ic1">

            <input type="text" name="txtNome" class="input" id="nome" placeholder=" "> 

            <label for="nome" class="placeholder"> Nome </label>

        </div>

        <div class="input-container ic1">

            <input type="text" name="txtCognome" class="input" id="cognome" placeholder=" "> 

            <label for="cognome" class="placeholder"> Cognome </label>

        </div>

        <div class="input-container ic1">

            <input type="text" name="txtVia" class="input" id="via" placeholder=" "> 

            <label for="via" class="placeholder"> Via </label>

        </div>

        <div class="input-container ic1">

            <input type="text" name="txtMail" class="input" id="mail" placeholder=" "> 

            <label for="mail" class="placeholder"> Mail </label>

        </div>

        <div class="input-container ic1">

            <input type="password" name="txtPassword" class="input" id="psw" placeholder=" "> 

            <label for="psw" class="placeholder"> Password </label>

        </div>

        <!--pulsante che punta alla pagina PHP definita nell'action della form-->
        <input type="submit" value="REGISTRATI" class="submit"/>

    

</form>

<form action="index.php">
    <input type="submit" value="Torna alla home" class="submit" style="width: 400px;"/>
</form>

