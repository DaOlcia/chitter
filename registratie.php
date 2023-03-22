<?php
    require_once "conn.php";

    strip_tags($_POST["voornaam"]);
    Strip_tags($_POST["achternaam"]);
    strip_tags($_POST["email"]);
    strip_tags($_POST["gebruikersnaam"]);
    Strip_tags($_POST["wachtwoord"]);
   
   
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $gebruikersnaam= $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["wachtwoord"];
   


    $insert_user = $conn->prepare("INSERT INTO users(voornaam,achternaam,email,gebruikersnaam, wachtwoord) VALUES( :voornaam, :achternaam, :email, :gebruikersnaam, :wachtwoord)");
   
    $insert_user->bindParam(":voornaam", $voornaam);
    $insert_user->bindParam(":achternaam", $achternaam);
    $insert_user->bindParam(":email", $email);
    $insert_user->bindParam(":gebruikersnaam", $gebruikersnaam);
    $insert_user->bindParam(":wachtwoord", $wachtwoord);
   
    $password_difficulty = ['difficulty' => 11];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $password_difficulty);
    $stmt->execute(header("location: registreren_succes.html"));
    
   
    $insert_user->execute();


    ?>



