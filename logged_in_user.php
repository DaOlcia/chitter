<?php
session_start();
require_once "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Chirpify</title>
  <link rel="stylesheet" href="Main.css">
</head>

<body>
  <section class="homepage">
    <div class="sidebar">
      <img class="logo" src="img/chitter.png" width="48px" height="48px" alt="chitterlogo">
      <h1> Welkom  <?php echo "$_SESSION[gebruikersnaam]";  ?> </h1> 
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Profiel</a></li>
      </ul>


      <div class="spacer"></div>

      <div class="account">
        <img src="img/chitter.png" width="38px" height="38px" alt="chitterlogo">
        <div class="user-details">
          <?php
          echo "$_SESSION[gebruikersnaam]";
          ?>
        </div>
        <div class="menuicon">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <div class="feed">
      <div class="write-a-post">

        <img src="img/chitter.png" width="38px" height="38px" alt="chitterlogo">
        <form action="tweet_posten.php" class="tweet-input" method="post" > 
         <textarea rows="3" cols="50"  name="content" > </textarea>
         <input type="submit" value="Post je tweet!"> 
         </form> 
          <?php require_once('show_all_tweets.php')?>
          
        </div>
      </div>
    </div>
  </div>
  </section>
</body>

</html>
