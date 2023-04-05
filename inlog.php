
<?php
session_start();
require_once "conn.php";

$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
$wachtwoord = strip_tags($_POST["wachtwoord"]);

echo "$gebruikersnaam en $wachtwoord"; 
//$sql = 'SELECT * FROM users WHERE gebruikersnaam = $gebruikersnaam AND wachtwoord = $wachtwoord';
$query= $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam = :gebruikersnaam" );
$query->bindParam(":gebruikersnaam", $gebruikersnaam);
$query->execute();

if ($query -> rowCount() == 1){

    $result = $query -> fetch (PDO::FETCH_ASSOC);
    // echo "<pre>".print_r($result, true)."</pre>";
    

    if (password_verify ($wachtwoord, $result['wachtwoord'])) {
        $_SESSION["gebruikersnaam"] = $gebruikersnaam;
       // $insert_user->execute(header("location: logged_in_user.php"));
        header("location: logged_in_user.php");
    
       // echo "<div class='inloggen'>ingelogd als: " . $gebruikersnaam . "</div>";
        //echo $_SESSION['account_id'];
        
    } else {
        header("location: fout_inlog_formulier.php");
    }
    
    }
?>

