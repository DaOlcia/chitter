<?php
    require_once "conn.php";


    $voornaam = strip_tags($_POST["voornaam"]);
    $achternaam = strip_tags($_POST["voornaam"]);
    $email = strip_tags($_POST["email"]);
    $gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
    $wachtwoord = strip_tags($_POST["wachtwoord"]);

    $insert_user = $conn->prepare("INSERT INTO users(voornaam,achternaam,email,gebruikersnaam, wachtwoord) VALUES( :voornaam, :achternaam, :email, :gebruikersnaam, :wachtwoord)");

    $insert_user->bindParam(":voornaam", $voornaam);
    $insert_user->bindParam(":achternaam", $achternaam);
    $insert_user->bindParam(":email", $email);
    $insert_user->bindParam(":gebruikersnaam", $gebruikersnaam);
    $insert_user->bindParam(":wachtwoord", $hashed_wachtwoord);

    $password_difficulty = ['difficulty' => 11];
    $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT, $password_difficulty);
    $insert_user->execute(header("location: registreren_succes.html"));


    ?>
