<?php
    require_once "conn.php";

    $username = $_POST["username"];
    $password = $_POST["PASSWORD"];

    $insert_user = $conn->prepare("INSERT INTO Account(username, password) VALUES(:username, :password)");
    $insert_user->bindParam(":username", $username);
    $insert_user->bindParam(":password", $password);
    $insert_user->execute();

    ?>