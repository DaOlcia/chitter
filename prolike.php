<?php
   session_start(); 
   require_once "conn.php";

   $sql = "UPDATE tweets SET likes = likes + 1, 
           gelijkeddoor = :gd
           WHERE id = :wid";

    $stmt = $conn->prepare($sql);
    $stmt->execute([":wid"=> $_GET['wid']
                   ":gd" => $_GET['userid']]);

    header("location:like.php");