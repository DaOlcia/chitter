<?php
    session_start();
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
  
    $sql = "SELECT COUNT(*) AANTAL FROM account WHERE email = :un";
    $stmt = $conn->prepare($sql);
    $stmt->execute(["un" => $_POST['email']]);
    $aantal = $stmt->fetchColumn();
    //-----------------------------------------------------
    
    // begin van if stmt
    if ($aantal == 1) {
        // $_SESSION['err']; // = "<h3 style='color:#900'>Deze gebruikersnaam is al aanwezig in de database. Probeer opnieuw ///De h1 tag doet niks</h3>";
        header("location: retry_register.php");
    } else {
        // $_SESSION['err']; //  = "<h3>REGISTRATIE VOLTOOID</h3>";
        // dit is om de ingetypte data in de database te zetten
        $insert_user = $conn->prepare("INSERT INTO users(voornaam,achternaam,email,gebruikersnaam, wachtwoord) VALUES( :voornaam, :achternaam, :email, :gebruikersnaam, :wachtwoord)");
        $insert_user->bindParam(":voornaam", $voornaam);
        $insert_user->bindParam(":achternaam", $achternaam);
        $insert_user->bindParam(":email", $email);
        $insert_user->bindParam(":gebruikersnaam", $gebruikersnaam);
        $insert_user->bindParam(":wachtwoord", $hashed_wachtwoord);
        //-----------------------------------------------------
    
        //voor betere incryptie// // cost 12 = default incryptie // 
        $password_difficulty = ['difficulty' => 11];
        $hashed_wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT, $password_difficulty);
        $_SESSION["gebruikersnaam"] = $gebruikersnaam;
        // strip_tags($_POST['username']);
        $stmt->execute(header("location: logged_in_user.php")); 
    };
?>