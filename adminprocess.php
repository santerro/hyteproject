<?php 
session_start();
include 'dbsome.php';

$username = $_POST['username'];
$password = $_POST['password'];
$userlevel = $_POST['userlevel'];


$sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);


	if (!$row = $result->fetch_assoc()) {
		echo "Your username or password is inccorrect!";
		header("Location: login.php");
		}

		else{
			$_SESSION['admin'] = $row['username'];
			header("Location: admin2.php");
	}

?>