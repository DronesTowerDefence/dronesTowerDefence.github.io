<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="../img/icon.ico">
  <meta charset="utf-8">
  <link rel="stylesheet" href="../stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ae32d225a7.js" crossorigin="anonymous"></script>
  <title>Anmelden</title>
</head>

<?php

session_start();


//Weiterleitung wenn eingeloggt

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == "1") {

  echo " 
  <script type=\"text/javascript\">
  
  window.open('profile.php', '_self'); 
  
  </script>
  ";

}



?>

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



  <p>


  <h3>Anmelden:</h3>
  <br>

  <form action="signin_process.php" method="post">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required maxlength="50" placeholder="max@mustermann.de"
      pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> <!--Beschränkung des Email Formats (DANKE INTERNET)-->

    <label for="passwort">Passwort:</label>
    <input type="password" id="passwort" name="passwort" required maxlength="18" placeholder="">


    <br>

    <button>Senden</button>
  </form>

  </p>
</body>

<br>

<h3>Noch keinen Account? | <i>Erstell ihn hier:</i></h3>
<h2><a href="registration.html">Registrieren</a></h2>
<!--Weiterleitung an Regristrieren PHP-->

</html>