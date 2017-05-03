<?php 
session_start();
include 'dbsome.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')";

$result = $conn->query($sql);
 header("Location: login.php");

?>