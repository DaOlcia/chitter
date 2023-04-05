<?php 
session_start();
require_once "conn.php";

$sql = "UPDATE * FROM tweets WHERE";
$stmt = $conn->prepare($sql);
$stmt->execute();

$ingelogdAls = "userid";

while ($row = $stmt->fetch(POD::FETCH_OBJ)) {

    $lnk = "<br><a href='proclick.php?wid=" . $row->id . "&userid=$inlogdAls'>Like dit bericht</a> aantal keren geliked: " . $row->likes . ".";
   
    echo "<br>" . $row->id . ") " . $row->berichttekst 
    . "<strong>likes: " . $row->likes . "</strong> $lnk";
    echo "<hr>";
}