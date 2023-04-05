<?php
session_start();
require_once "conn.php";

if (!isset($_SESSION['Gebruikersnaam'])) {

}

$tweets_id = $_POST['tweets_id'];
$user_id = $_SESSION['account_id'];


$check_author = $conn->prepare("SELECT account_id FROM tweets WHERE id = ?");
$check_author->execute([$tweets_id]);
$author_id = $check_author->fetch(PDO::FETCH_COLUMN);

if ($author_id != $user_id) {

}

$delete_tweet = $conn->prepare("DELETE FROM tweets WHERE id = ? AND account_id = ?");
$delete_tweet->execute([$tweets_id, $user_id]);


header("Location:");
?>