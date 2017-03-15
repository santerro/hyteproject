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
					<li class="dropdown"><a class="green nappi" href="harjoitukset.html">Harjoitukset
						<div class="dropdown-content">
						<a class="green nappi"  href="harjoitukset.html #harj1">Harjoitus 1</a>
    					<a class="green nappi" href="harjoitukset.html #harj2">Harjoitus 2</a>
    					<a class="green nappi" href="harjoitukset.html #harj3">Harjoitus 3</a>
					</div>
					</a></li>
					<li><a class="green nappi" href="yhteystiedot.html">Yhteystiedot</a></li>
					<li><a class="green nappi" href="login.php">Oma</a></li>
				</ul>
			</nav>
			</header>
			<div id="frm">
			<form action="process.php" method="POST">
				<p>
					<label>Username:</label>
					<input type="text" id="user" name="user" required/>

				</p>
				<p>
					<label>Password:</label>
					<input type="password" id="pass" name="pass" required/>
				</p>
				<p>
					<input type="submit" id="btn" value="login" />
				</p>
			</form>
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
