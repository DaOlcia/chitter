<?php
session_start()
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
        $_SESSION["gebruikersnaam"] = $gebruikersnaam;
        $insert_user->execute(header("location: logged_in_user.php"));
    
    echo "<div class='inloggen'>ingelogd als: " . $gebruikersnaam . "</div>";
    echo $_SESSION['account_id'];
    } else {
    echo "<div class='inloggen'> " . "wachtwoord onjuist" . "</div>";
    }
    
    }

    

?>

