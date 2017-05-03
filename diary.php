<?php 
session_start();
include 'dbsome.php';

$comment = $_POST['comment'];
$userid = "SELECT id FROM register";
$result = $conn->query($userid);
$row = $result->fetch_assoc();
$id = $row['id'];

$sql = "INSERT INTO diary (comment, userid) VALUES ('$comment', '$id')";

$result = $conn->query($sql);

if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = ($_POST["comment"]);
  }
 header("Location: login2.php");
