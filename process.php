<?php 
		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		include "dbsome.php";
		if (isset($_POST['button'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
		}
	
	else{
		//TODO mysqli_real_escape!!!! SQL injection
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql = "SELECT * FROM register WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		

		if ($result->num_rows == 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['login_user']=$username;
			$_SESSION['login_userid']=$row["id"];
			$_SESSION['login_usergroup']=$row["groupid"];
			header("Location: login2.php");
		}
		else{
			$error = "Username or Password is invalid";
		}
		mysqli_close($conn);
	}
}