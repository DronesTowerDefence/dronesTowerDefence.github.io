<?php

session_start();

$check = filter_input(INPUT_POST, "check", FILTER_VALIDATE_BOOLEAN);


if (!$check) {
  die("Bitte Hacken für Abmelden setzen");
}

//Datenbank-Infos
$host = "localhost:3306";
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

//Verbindung wird hergestellt
$conn = mysqli_connect($host, $username1, $password, $dbname);



if (mysqli_connect_errno()) {
  die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Email, die in den Session-Cookies gespeichert ist.
$delEmail = $_SESSION["email"];

$sql = "DELETE FROM user_account WHERE email = '$delEmail'";

//Direkte Weiterleitung zur Homepage durch JavaScript
if ($conn->query($sql) === TRUE) {
  echo "
  <script type=\"text/javascript\">
  
  window.open('../index.html', '_self'); 
  
  </script>
  ";
} else {
  echo "Kapputt: " . $conn->error;
}

$conn->close();



$_SESSION["loggedin"] = 0;
unset($_SESSION["username"]);
unset($_SESSION["email"]);
unset($_SESSION["admin"]);

$conn->close();

?>