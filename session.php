<?php
include "dbsome.php";

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql="SELECT * FROM register WHERE username='$user_check'";
$result = $conn->query($ses_sql);
$row = $result->fetch_assoc();
$login_session =$row['id'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
}
?>