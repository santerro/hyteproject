	<?php 
	session_start();
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>hytehtml</title>
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
							<!--<div class="dropdown-content">
								<a class="green nappi"  href="#harj1">Harjoitus 1</a>
								<a class="green nappi" href="#harj2">Harjoitus 2</a>
								<a class="green nappi" href="#harj3">Harjoitus 3</a>
							</div>-->
						</a></li>
						<li><a class="green nappi" href="yhteystiedot.html">Yhteystiedot</a></li>
						<li><a class="green nappi" href="login.php">Login</a></li>
					</ul>
				</nav>
			</header>

			<div id="content-wrapper" class="green shadow">

				<main class="highlight checkbox">


					<?php
					if($_SESSION['login_user']){
						
					
					?>
						<form action="login2.php" method="POST">
						<!--<div class="mySlides fade">

							<div class="numbertext">1 / 3</div>-->

							<!--<ul>-->
								<?php 
						include "dbsome.php";
								$sql = "SELECT * FROM strength";
								$result = $conn->query($sql);

								
								while ($row = $result->fetch_assoc()) {
						    		echo '<input type="checkbox" id="checkbox'.$row['id'].'"name="checkbox_btns[]" value="'.$row['id'].'"> <label for="checkbox'.$row['id'].'"class="btn">'.$row['name'].'</label>';
						}?>
							<br>
							<br>
						<input type="submit">
						</form>
						

						<!--<button onclick="myFunction()">Try it</button>-->

						<!--<p id="demo"></p>-->

						<!--<script type="text/javascript">
							/*function myFunction() {
							    document.getElementById("myCheck").value;
							    var z = document.getElementById("myCheck").value;
							    document.getElementById("demo").innerHTML = z;
							  
							}*/
							function myFunction() {
							    var checkbox_btns = document.forms[0];
							    var txt = "";
							    var i;
							    for (i = 0; i < checkbox_btns.length; i++) {
							        if (checkbox_btns[i].checked) {
							            txt = txt + checkbox_btns[i].value + " ";
							        }
							    }
							    document.getElementById("order").value = "Vahvuutesi: " + txt;
							}
		
						</script>-->
					<?php 

						}
					else{
						echo "Pitää kirjautua!";
								}
					?>
								

							<!--</ul>-->
						<!--</div>-->

						<!--<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>-->


						<!--<br>

						<div style="text-align:center">
							<span class="dot" onclick="currentSlide(1)"></span> 
							<span class="dot" onclick="currentSlide(2)"></span> 
							<span class="dot" onclick="currentSlide(3)"></span> 
						</div>

						<script>
						var slideIndex = 1;
						showSlides(slideIndex);

						function plusSlides(n) {
							showSlides(slideIndex += n);
						}

						function currentSlide(n) {
							showSlides(slideIndex = n);
						}

						function showSlides(n) {
							var i;
							var slides = document.getElementsByClassName("mySlides");
							var dots = document.getElementsByClassName("dot");
							if (n > slides.length) {slideIndex = 1}    
								if (n < 1) {slideIndex = slides.length}
									for (i = 0; i < slides.length; i++) {
										slides[i].style.display = "none";  
									}
									for (i = 0; i < dots.length; i++) {
										dots[i].className = dots[i].className.replace(" active", "");
									}
									slides[slideIndex-1].style.display = "block";  
									dots[slideIndex-1].className += " active";
								}
								</script>-->


						
					</main>
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
