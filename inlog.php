<?php

require_once "conn.php";



$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
$wachtwoord = strip_tags($_POST["wachtwoord"]);

//$sql = 'SELECT * FROM users WHERE gebruikersnaam = $gebruikersnaam AND wachtwoord = $wachtwoord';
$query= $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam = :gebruikersnaam" );
$query->bindParam(":gebruikersnaam", $gebruikersnaam);
$query->execute();





if ($query -> rowCount () == 1){

    $result = $query -> fetch (PDO::FETCH_ASSOC);
    if (password_verify ($wachtwoord, $result['Wachtwoord'])){
    $_SESSION['account_id'] = $result['id'];
    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
    echo "<div class='inloggen'>ingelogd als: " . $gebruikersnaam . "</div>";
    echo $_SESSION['account_id'];
    } else {
    echo "<div class='inloggen'> " . "wachtwoord onjuist" . "</div>";
    }
    
    }







//Schrijf een query die de user uit de database haalt
//SELET * FROM account WHERE username = :$_POST['username']

// $sql= $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam AND Wachtwoord) VALUES( :geruikersnaam, :wachtwoord)=:$_POST['Gebruikersnaam'], $_POST['Wachtwoord']");

//dan krijg je de user ALS die bestaat (+ zijn/haar wachtwoord)
//if (ingelogdeGebruiker( $inputGebruikersnaam, $inputWachtwoord) > 1) {
   //     echo "<br> Welkom!"; 
  //  }


//Dan vergelijk je. Is het wachtwoord $wachtwoord gelijk aan het wachtwoord in de database?
//Zo ja? Ingelogd! (Echo voor nu even echo ïngelogd")

?>

