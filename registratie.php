<?php

session_start();

require_once "conn.php";




/// Strip tags betekend weghalen van ingevoerde code in de formulier/input

$voornaam = strip_tags($_POST["voornaam"]);

$achternaam = strip_tags($_POST["achternaam"]);

$email = strip_tags($_POST["email"]);

$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);

$wachtwoord = strip_tags($_POST["wachtwoord"]);




// HIER Bereid je je db voor om te kijken of de email al bestaat

$_SESSION["gebruikersnaam"] = $gebruikersnaam;

$sql = "SELECT COUNT(*) AANTAL FROM users WHERE email = :un";

$stmt = $conn->prepare($sql);

$stmt->execute(["un" => $_POST['email']]);

$aantal = $stmt->fetchColumn();

//-----------------------------------------------------



$_SESSION["gebruikersnaam"] = $gebruikersnaam;




// als $aantal 1 is dan bestaat de email al en wordt de door gestuurd naar een zelf gemaakte fail page

if ($aantal == 1) {

    header("location : fail_pagina");

} else {

    // hier pas voer je de ingetypte data op in je database

    $insert_user = $conn->prepare("INSERT INTO users(voornaam,achternaam,email,gebruikersnaam, wachtwoord) VALUES( :voornaam, :achternaam, :email, :gebruikersnaam, :wachtwoord)");




    $insert_user->bindParam(":voornaam", $voornaam);

    $insert_user->bindParam(":achternaam", $achternaam);

    $insert_user->bindParam(":email", $email);

    $insert_user->bindParam(":gebruikersnaam", $gebruikersnaam);

    $insert_user->bindParam(":wachtwoord", $hashed_wachtwoord);




    //voor betere incryptie// // cost 12 = default incryptie //

    $password_difficulty = ['difficulty' => 11];

    $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT, $password_difficulty);

    $_SESSION["gebruikersnaam"] = $gebruikersnaam;
    //--------------------------------------------------------------------------------------




    $insert_user->execute(header("location: logged_in_user.php"));

}






?>