    
    <?php
    //Cache wird deaktiviert, damir Profilbild immer aktualisiert wird.
    //Sonst wird der BrowserCache benutzt, der Bilder speichert auf längere Dauer und Änderungen demnach nicht anzeigt.
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    ?>

   
<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="utf-8">
  <link rel="stylesheet" href="../stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ae32d225a7.js" crossorigin="anonymous"></script>
  <title>Profil</title>
</head>

<body>

  <h1>
    <b>Drones TD</b>
  </h1>





  <p>Dronenspaß für den Single- und Multiplayer!</p>

  <br>
  <hr>



  <div class="navbar">
    <a href="../index.html" style="background-color: #222222;"><i class="fa
          fa-home" aria-hidden="true"></i> &nbsp; Home</a>
  </div>
  <br>


    <?php

    session_start();

    //Profilseite ohne loggedIN-Status nicht aufrufbar. (Softlock)
    if ($_SESSION["loggedin"] == 0) {

      die("Sie sind nicht angemeldet. <br> <br>
  <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>");

    }


//Bildname ist mit Username gespeichert. Da Sessions (Username ist dort gespeichert) nur mit PHP ausgelesen werden können,
//echost du die HTML-Anweisungen, und schiebst den Session-Username zwischen.
//Praktisch kann man mit PHP ganz einfach HTML echo'n und einschieben.

echo "<h1> Profil </h1> <img src='http://www.dronesClient.DronesTD.de/"; 
echo $_SESSION["username"];
echo ".png' style='float:right;width:250px;height:250px;> '";



//Der Punkt ist das Äquivalent zum '+' bei Strings in C++, damit fügst du Sachen zusammen.
echo "
<br> 
Nutzername: <code>" . $_SESSION["username"] . " </code> 
<br> 
Email: <code>" . $_SESSION["email"] . "</code>
<br> 
<br>
<h2> Hier werden bald die Statistiken angezeigt!</h2>
";
?>
 
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<!--Soll rechts unter dem Bild sein-->
<div id = rechts style="float:right;">
  <!--Datei wird hier uploadet/angenommen-->
  <form action="upload.php" method="post" enctype="multipart/form-data">
  Profilbild auswählen: (unter 1000KB) <br>
  Nur PNG!!!
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
  </form>
  </div>

  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <!--Abmelden PHP wird aufgerufen-->
    <form action='log_out.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich abmelden?
      </label>
      &emsp;
      <button><p style="color: red">Abmelden</button>
    </form>

    <!--Delete Account PHP wird aufgerufen-->
    <form action='deleteAcc.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich irreversibel löschen?
      </label>
      &emsp;
      <button><p style="color: red">Löschen</button>
    </form>
    <br>
    <hr>
    <br>
    <form action='updatePassword.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich Passwort ändern?
      </label>
      <br>
      <label for="new_name">Neues Passwort:</label>
    <input type="password" id="new_name" name="new_name" required maxlength="18" placeholder="Max 18">
    
      <button><p style="color: red">Ändern</button>
  </form>

    <br>
<!-- Erster Paypal Code-->
    <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'horizontal',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"Digitaler Shop-Pass für Ingame-Erweiterung","amount":{"currency_code":"EUR","value":2}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

   

  </body>

</html>