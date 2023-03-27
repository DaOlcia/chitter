<?php

require_once "conn.php";

$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
$wachtwoord = strip_tags($_POST["wachtwoord"]);

SELECT * FROM users WHERE Gebruikersnaam AND Wachtwoord = :$_POST['Gebruikersnaam'], $_POST['Wachtwoord'];
//Schrijf een query die de user uit de database haalt
//SELET * FROM account WHERE username = :$_POST['username']


//dan krijg je de user ALS die bestaat (+ zijn/haar wachtwoord)

//Dan vergelijk je. Is het wachtwoord $wachtwoord gelijk aan het wachtwoord in de database?
//Zo ja? Ingelogd! (Echo voor nu even echo ïngelogd")

?>

