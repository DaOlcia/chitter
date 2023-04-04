<?php 

session_start(); 
require_once "conn.php";
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chirpify</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<section class="homepage homeregistratie">
  <div class="sidebar">
    <img class="logo" src="img/chitter.png" width="48px" height="48px" alt="chitterlogo">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php">Profiel</a></li>
    </ul>
    <div class="spacer"></div>
    </div>
  </div>

    <div class="feed">
    <h1>Profiel bijwerken</h1>
    <form action="" method="post">
    
    <?php 
       $gebruiker = $_SESSION['gebruikersnaam']; 
      $sql= "SELECT * FROM users WHERE gebruikersnaam ='$gebruiker'"; 

      $resultaat = mysql_query($connection,$sql)
       

      if ( $resultaat){
            if (mysql_num_rows( $resultaat)>0) {
                 while($row = mysql_fetch_array($resultaat)) {
                     // print_r($row);
                     ?>
                     <label for="voornaam">Voornaam</label>
                          <input type="text" id="voornaam" name="voornaam" value="<?php echo"$_SESSION[gebruikersnaam]"; ?>">
                     <label for="achternaam">Achternaam</label>
                         <input type="text" id="achternaam" name="achternaam">
                     <label for="email">Email</label>
                         <input type="email" id="email" name="email" >
                     <label for="gebruikersnaam">Gebruikersnaam</label>
                         <input type="text" id="gebruikersnaam" name="gebruikersnaam" >
                     <label for="wachtwoord">Wachtwoord</label>
                         <input type="password" id="wachtwoord" name="wachtwoord" >
                    <input type="submit" value="Profiel bewerken">
  </div>
</section>
</body>
</html>
                     <?php 
                 }
            }
      }

?>
        


