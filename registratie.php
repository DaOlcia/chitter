<?php
    require_once "conn.php";

    strip_tags($_POST["username"];)
    Strip_tags($_POST["password"];)

    $insert_user = $conn->prepare("INSERT INTO Account(username, password) VALUES(:username, :password)");
    $insert_user->bindParam(":username", $username);
    $insert_user->bindParam(":password", $hashed_password);

    $password_difficulty = ['difficulty' => 11];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $password_difficulty);
    $stmt->execute(header("location: registreren_succes.html"));
    ?>