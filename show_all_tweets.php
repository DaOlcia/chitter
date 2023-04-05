<?php 
require_once "conn.php";

// Bereid je voor om alle tweets te pakken .
$get_all_tweets = $conn->prepare("SELECT * from tweets");

//Voer het uit
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

//Pak alle tweets en laat ze een voor een zien.
foreach ($tweets as $tweet) {
    echo "<div class='post'>".  $tweet["content"] ." <button name='delete'>Delete</button></div> ";
}
?>