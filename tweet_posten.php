<?php
    session_start(); 
    require_once "conn.php";
    
    $content = strip_tags($_POST["content"]);
    $account_id = "$SESSION[id]"; 
    // Ik weet niet zeker of je user(tabelnaam)en dan id moet schrijven 
    // Of gelijk session [id]

        
        $insert_tweets = $conn->prepare("INSERT INTO tweets(Content,account_id) VALUES( :content,:account_id )");
        $insert_tweets->bindParam(":content", $content);
        $insert_tweets->bindParam(":account_id", $account_id);


        $insert_tweets->execute(header("location: logged_in_user.php"));
    
    ?>