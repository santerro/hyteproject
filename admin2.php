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
					<li class="dropdown"><a class="green nappi" href="harjoitukset.html">Harjoitukset
						<div class="dropdown-content">
						<a class="green nappi"  href="harjoitukset.html #harj1">Harjoitus 1</a>
    					<a class="green nappi" href="harjoitukset.html #harj2">Harjoitus 2</a>
    					<a class="green nappi" href="harjoitukset.html #harj3">Harjoitus 3</a>
					</div>
					</a></li>
					<li><a class="green nappi" href="yhteystiedot.html">Yhteystiedot</a></li>
					<li><a class="green nappi" href="login.php">Login</a></li>
				</ul>
			</nav>
			</header>
			<main class="highlight">
			
						<?php 
						if (isset($_SESSION['admin'])) {
							
							echo '<h1>Admin: '.$row["username"]."'s Profile</h1>";
								echo "<table>";
								echo "Info:";
								echo "<tr><td>Email: ".$row['email']."</td></tr>";
								echo "<tr><td>Userid: ".$row['id']."</td></tr>";
								echo "<tr><td>Groupid: ".$row['groupid']."</td></tr>";
								echo "</table";

						}else{
							echo "You are not logged in!";
							header("Location: login.php");
						}
					?>	
					<form action="logout.php">
						<button>LOG OUT</button>
					</form>
				
						<div>
						<ul>
							<li><a class="group2" href="#"><h2>All users</h2></a>
								<ul class="group">
		                <li class="group2"><?php
		                	include "dbsome.php";
							$sql = "SELECT * FROM register";
        
					        $result = $conn->query($sql);
					        
					        if ($result->num_rows > 0) {
					   
					            while($row = $result->fetch_assoc()) {
					                
					                echo '<hr />';
					                echo '<table>';
					                echo '<tr><td>Userid:</td><td>'.$row["id"].'</td></tr>';
					                echo '<tr><td>Username:</td><td>'.$row["username"].'</td></tr>';
					                echo '<tr><td>Groupid:</td><td>'.$row["groupid"].'</td></tr>';
					                echo '</table>';
					                
					            }
					        }
					        else {
					           echo "0 results";
					        }
						 ?>
		                </li>
		                <li><a href="#"></a>
		                </li>
		                <li><a href="#"></a>
		                </li>
		            </ul>
							
							<li><a class="group2" href="#"><h2>Groups</h2></a>
					<ul class="group">
		                <li class="group2"><?php
						
						$query = "SELECT register.id,register.username,register.groupid,groups.id,groups.name,groups.type,groups.location FROM register INNER JOIN groups ON register.groupid=groups.id";
						$result = mysqli_query($conn, $query);
						$categories = array();
						while ($row = $result->fetch_assoc()) {
							$categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']][] = "Username: ".$row['username']."<br>";
						}

						foreach($categories as $key => $category){
						    echo '<hr />'.$key.'<br/>';
						     echo "<br>Users:";
						    foreach($category as $rowdata){ 
						    	 echo '<table>';
						        echo '<tr><td>'.$rowdata.'</tr></td>';
						         echo '</table>';
						    }
						}
						 ?>
		                </li>
		            </ul>
						</li>	
					</ul>
					
				</div>
			</main>
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
	<script>
				$(document).ready(function () {
		    $("li").click(function () {
		        $('li > ul').not($(this).children("ul").toggle()).hide();
		        
		    });
		});
	</script>
	</body>
</html>
