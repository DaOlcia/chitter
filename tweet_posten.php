<?php
    session_start(); 
    require_once "conn.php";
    
    $content = strip_tags($_POST["content"]);

        
        $insert_tweets = $conn->prepare("INSERT INTO tweets(Content) VALUES( :content)");
        $insert_tweets->bindParam(":content", $content);
    
        $insert_tweets->execute(header("location: logged_in_user.php"));
    
    ?>