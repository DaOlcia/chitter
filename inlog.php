<?php

require_once "conn.php";




$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
$wachtwoord = strip_tags($_POST["wachtwoord"]);

//$sql = 'SELECT * FROM users WHERE gebruikersnaam = $gebruikersnaam AND wachtwoord = $wachtwoord';
$sql= "SELECT * FROM users WHERE Gebruikersnaam AND Wachtwoord) VALUES( :geruikersnaam, :wachtwoord)=:$_POST['Gebruikersnaam'], $_POST['Wachtwoord']";

 
 
$row = mysqli_fetch_array($result,MYSQLI_ASSOC); 
$active = $row['active'];

$count = mysqli_num_rows($result);


if ($count == 1) {
    echo "Je bent ingelogd";
} else {
    echo "Foutmelding, iets was incorrect";
}



 
//Schrijf een query die de user uit de database haalt
//SELET * FROM account WHERE username = :$_POST['username']


//dan krijg je de user ALS die bestaat (+ zijn/haar wachtwoord)
//if (ingelogdeGebruiker( $inputGebruikersnaam, $inputWachtwoord) > 1) {
   //     echo "<br> Welkom!"; 
  //  }


//Dan vergelijk je. Is het wachtwoord $wachtwoord gelijk aan het wachtwoord in de database?
//Zo ja? Ingelogd! (Echo voor nu even echo ïngelogd")

?>

