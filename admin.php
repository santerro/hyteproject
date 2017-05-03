<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>login</title>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href="tyyli.css" rel="stylesheet">
	</head>
	<body class="vaaleanruskea">
		<div id="wrapper">
			<header class="shadow">
			<nav id="top">
				<ul>
					<li><a class="green" id="menuNappi" href="#">Menu &#9776;</a></li>
				</ul>
				<ul id="menu">
					<li><a class="green nappi" href="index.html">Etusivu</a></li>
					<li class="dropdown"><a class="green nappi" href="harjoitukset.php">Harjoitukset
						<div class="dropdown-content">
						<a class="green nappi"  href="harjoitukset.php #harj1">Harjoitus 1</a>
    					<a class="green nappi" href="harjoitukset.php #harj2">Harjoitus 2</a>
    					<a class="green nappi" href="harjoitukset.php #harj3">Harjoitus 3</a>
					</div>
					</a></li>
					<li><a class="green nappi" href="yhteystiedot.html">Yhteystiedot</a></li>
					<li><a class="green nappi" href="login.php">Login</a></li>
				</ul>
				
			</form>
			</nav>
			</header>
			<div id="frm">
			<form action="process.php" method="POST">
				<p>
					<label>(Admin)<br>Username:</label>
					<input type="text" name="username" required/>

				</p>
				<p>
					<label>Password:</label>
					<input type="password" name="password" required/>
				</p>
				<p>
					<input type="submit" id="btn" value="login" />
				</p>
			</form>
			<br>
						<?php 
						if (isset($_SESSION['admin'])) {
							echo "Logged in as admin: ".$_SESSION['admin'];
							
						}else{
							echo "You are not logged in!";
						}
					?>	
			<p><a href="login.php">Login</a> | <a href="register.php"</a>Sing up</a></p>
			
			</div>
			<footer class="greenslide shadow">&#169; Fuutteri</footer>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
		$(function(){
			$('#menuNappi').click(function(evt){
				$('#menu').slideToggle(400);
			});
		});
	</script>
	</body>
</html>
