<!doctype html>
<html id="html" lang="de" class=dn>

<head>
  <link rel="icon" href="../img/icon.ico">
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

    echo " 
    <script type=\"text/javascript\">
    
    window.open('sign-in.php', '_self'); 
    
    </script>
    ";

  }

  if (!isset($_SESSION["loggedin"])) {

    echo " 
    <script type=\"text/javascript\">
    
    window.open('sign-in.php', '_self'); 
    
    </script>
    ";
  }


  $host = "localhost:3306";
  $dbname = "dronestd_account";
  $username1 = "db_access";
  $password = "aYOKWhS2lVntnAsB";

  //Connection wird gespeichert
  $conn = mysqli_connect($host, $username1, $password, $dbname);



  if (mysqli_connect_errno()) {
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
  }

  $sqlCheck = "SELECT username, xp FROM user_account";
  $result = $conn->query($sqlCheck);

  $returnS = "<table><tr><td><b>Name</b></td><td><b>XP</b></td></tr>";


  for ($i = 0; $i < $result->num_rows; $i++) {

    $row = $result->fetch_assoc();
    $returnS .= "<tr><td>" . $row["username"] . "</td> ";
    if ($row["xp"] == NULL) {
      $returnS .= "<td><code>0</code></td></tr>";
    } else {
      $returnS .= "<td><code>" . $row["xp"] . "</code></td></tr>";
    }
  }

  $returnS .= "</tr></table>";

  echo $returnS;


  /*<tr>
  <td>Account</td>
  <td>0</td>
  </tr>
  <tr>
  <td>Account1</td>
  <td>1</td>*/



  ?>


</body>

</html>