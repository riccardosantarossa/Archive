<html>

<head>
    <title>PAGINA PRINCIPALE</title>
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <link href="style.css" rel="stylesheet" type="text/css" media="all">
    <link type="text/css" rel="stylesheet" href="css/spid-sp-access-button.min.css" />
</head>


<body>

<p>Inquadra il QR code con il telefono</p>

<p>
<img src="qrvalido.png" style="height: 250px; width: 250px;">
</p> 

</body>

<form action="registrazione.php" class="form" style="height: min-content;">

    <fieldset style="width: auto;">

      <legend class="subtitle">Registrati al sito</legend>
      <input type="submit" value="Clicca per registrarti" class="submit"/>
    
    </fieldset>

</form>

<form action="login.php" class="form" style="height: min-content;">

    <fieldset style="width: auto;">

      <legend class="subtitle">Accedi</legend>
      <input type="submit" value="Clicca per accedere" class="submit" />
    
    </fieldset>

</form>

<form class="form" style="height: 163px; position:absolute; top: 395px; left: 420px;">

<!--Codice per mostrare il bottone ufficiale di google-->
<fieldset style="width: auto; height: 103px; align-content: center;"></">

      <legend class="subtitle">Accedi con Google</legend>
      <div id="my-signin2" style="position:absolute; top: 60px; left: 80px;"></div>
        <script>
          function onSuccess(googleUser) {
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
          }
          function onFailure(error) {
            console.log(error);
          }
          function renderButton() {
            gapi.signin2.render('my-signin2', {
              'scope': 'profile email',
              'width': 240,
              'height': 50,
              'longtitle': true,
              'theme': 'dark',
              'onsuccess': onSuccess,
              'onfailure': onFailure
            });
          }
        </script>
    
</fieldset>

</form>

<!--Codice per mostrare il bottone ufficiale di SPID-->
<form action="login.php" class="form" style="height: 163px; position:absolute; top: 573px; left: 420px;">

    <fieldset style="width: auto; height: 105px;">

      <legend class="subtitle">Accedi con spid</legend>
      
      <a href="#" class="italia-it-button italia-it-button-size-s button-spid" spid-idp-button="#spid-idp-button-small-get" aria-haspopup="true" aria-expanded="false">
        <span class="italia-it-button-icon"><img src="img/spid-ico-circle-bb.jpg" style="height: 94px; width: 94px; position:absolute; left: 150px;" onerror="this.src='img/spid-ico-circle-bb.png'; this.onerror=null;" alt="" /></span>
    </a>
    <div id="spid-idp-button-small-get" class="spid-idp-button spid-idp-button-tip spid-idp-button-relative">
    </div>
    
    </fieldset>

</form>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

