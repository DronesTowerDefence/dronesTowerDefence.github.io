<?php



$emailpasswort = $_POST["email/passwort"];

echo "ok";

$hexKey = 0x2FD;


$email = substr($emailpasswort, 0, strpos($emailpasswort, "&"));
$passwort =substr($emailpasswort, strpos($emailpasswort, "&"));

$newPasswort = "";

for ($i = 0; $i <= strlen($passwort); $i++){

    $newPasswort[$i] = $passwort[$i] ^ $hexKey;

}

//db connection
$host = "localhost:3306";
$dbname = "dronestd_account";
$username1 = "db_access";
$password = "aYOKWhS2lVntnAsB";

$conn = mysqli_connect($host, $username1, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Verbindungsfehler: " . mysqli_connect_error() . "<br><br> Hier gehts zurück: 
    <a href='https://www.dronestd.de'>-><b>Startseite</b></a></p>");
}

//Checken nach Dopplungen

$sqlCheck = "SELECT username, email FROM user_account WHERE 
email = '$email' OR username = '$username'";

$result = $conn->query($sqlCheck);






?>