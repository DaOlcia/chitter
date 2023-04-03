<?php
session_start();
require_once "conn.php";

if (!isset($_SESSION['gebruikersnaam'])) {

}

$tweet_id = $_POST['tweet_id'];
$user_id = $_SESSION['account_id'];


$check_author = $db->prepare("SELECT account_id FROM tweets WHERE id = ?");
$check_author->execute([$tweet_id]);
$author_id = $check_author->fetch(PDO::FETCH_COLUMN);

if ($author_id != $user_id) {

}

$delete_tweet = $db->prepare("DELETE FROM tweets WHERE id = ? AND account_id = ?");
$delete_tweet->execute([$tweet_id, $user_id]);


header("Location: tweet_posten.php");
?>