<!-- #region HTML-->
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

  <body>
<!-- #endregion -->
<!-- #region PHP-->
    <?php

    session_start();

    /*
    $encryption = $_COOKIE["user"];
    $decryption_iv = '1234567891011121';
    // Entschlüsselungsschlüssel
    $decryption_key = "aylEwhyjpK2j21Ih1L";
    $ciphering = "AES-128-CTR";
    $decryption=openssl_decrypt ($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
    */

    if ($_SESSION["loggedin"] == 0) {

      die("Sie sind nicht angemeldet. <br> <br>
  <a href='https://www.dronestd.de/down/sign-in.php'>-><b>Startseite</b></a></p>");

    }






    echo "
<h1> Profil </h1>
<br> 
<p> Nutzername: " . $_SESSION["username"] . "
<br> 
Email: " . $_SESSION["email"] . "
<p> <br> 
<h2> Hier wird bald die Stats-Seite sein </h2>
";

    ?>
    <!-- #endregion -->

    <form action='log_out.php' method='post'>
      <br>
      <label>
        <input type='checkbox' name='check' required>
        Wirklich abmelden?
      </label>
      <br>
      <button>Abmelden</button>
    </form>










  </body>

</html>