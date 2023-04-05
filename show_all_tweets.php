<?php 
require_once "conn.php";
 $_SESSION["account_id"]; 
 
// Bereid je voor om alle tweets te pakken .
$get_all_tweets = $conn->prepare("SELECT tweets.content, tweets.id ,  tweets.likes , users.Gebruikersnaam FROM tweets JOIN users ON tweets.account_id = users.id ");

//Voer het uit
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

//Pak alle tweets en laat ze een voor een zien.
foreach ($tweets as $tweet) {
    echo "<div class='post'>".  $tweet["Gebruikersnaam"] . $tweet["content"] ." <br> Likes: " . $tweet["likes"] . "
    <form class='likebutton' action='like.php' method='post'><button  value='" . $tweet['id'] . "'  name='like'>like</button></form>" .
   "<form action='delete.php' method='POST'><button class='deletebutton' name='delete'value='" . $tweet['id'] . "'>Delete</button> </form></div>" ;
}

?>