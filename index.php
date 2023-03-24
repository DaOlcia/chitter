<?php require_once('show_all_tweets.php') ?>


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
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Profiel</a></li>
      </ul>


      <div class="spacer"></div>

      <div class="account">
        <img src="img/chitter.png" width="38px" height="38px" alt="chitterlogo">
        <div class="user-details">
          <p>John doe</p>
          <p>@johndoe</p>
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
        <div class="tweet-input" data-placeholder="Typ iets..." contenteditable></div>
      </div>
      <div class="post"></div>
    </div>




      <div class="featured">
        <a class="login" href="">Login</a>
        <a class="registratie" href="registratie_formulier.php">Registreren</a>
      </div>
  </section>
</body>

</html>