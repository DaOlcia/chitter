<?php 
require_once "conn.php";
$account_id = $_SESSION["account_id"]; 
// Bereid je voor om alle tweets te pakken .
$get_all_tweets = $conn->prepare("SELECT * from tweets");

//Voer het uit
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

//Pak alle tweets en laat ze een voor een zien.
foreach ($tweets as $tweet) {
    echo "<div class='post'>".  $tweet["content"] ."<form class='likebutton' action='like.php' method='post'><button name='like'>like</button></form> <button class='deletebutton' name='delete'>Delete</button></div> ";
}
?>