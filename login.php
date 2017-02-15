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
			<header></header>
			<nav id="top">
				<ul>
					<li><a class="sininen" id="menuNappi" href="#">Menu &#9776;</a></li>
				</ul>
				<ul id="menu">
					<li><a class="sininen nappi" href="index.html">Etusivu</a></li>
					<li><a class="sininen nappi" href="harjoitukset.html">Harjoitukset</a></li>
					<li><a class="sininen nappi" href="yhteystiedot.html">Ýhteystiedot</a></li>
					<li><a class="sininen nappi" href="login.php">Oma</a></li>
				</ul>
			</nav>
			<div id="frm">
			<form action="process.php" method="POST">
				<p>
					<label>Username:</label>
					<input type="text" id="user" name="user" />

				</p>
				<p>
					<label>Password:</label>
					<input type="password" id="pass" name="pass" />
				</p>
				<p>
					<input type="submit" id="btn" value="login" />
				</p>
			</form>
			</div>
			<footer class="sininen">&#169; Fuutteri</footer>
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