<?php
    require_once "conn.php";

    $content = $_POST["content"];
    
    $insert_tweets = $conn->prepare("INSERT INTO tweets(content) VALUES( :content)");
    $insert_user->bindParam(":content", $content);
    
    $insert_user->execute();

    ?>