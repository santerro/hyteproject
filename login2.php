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
			<main class="highlight">
				<form action="logout.php">
					<button>LOG OUT</button>
				</form>


				<?php
				include "session.php";
				if ($row['userlevel'] == 0) {

					echo '<h1>'.$row["username"]."'s Profile</h1>";?>
					<p style="margin-left: 80%"><?php 
							/*if (isset($_POST['checkbox_btns'])) { //to run PHP script on submit
								if (!empty($_POST['checkbox_btns'])) {

									$checkstr = $_POST['checkbox_btns'];
						            // Loop to store and display values of individual checked checkbox.
									foreach ($_POST['checkbox_btns'] as $selected) {
										echo $selected."</br>";
									}
								}
							}*/

							$checkstr = $_POST['checkbox_btns'];
							//$loginid = $_row['id'];
							if(is_array($checkstr)){
								$del = "DELETE FROM `user_strength` WHERE id = " .  $_SESSION['login_userid'];
								mysqli_query($conn, $del);
								$instr="INSERT IGNORE INTO user_strength (id,str_id) VALUES ";//('$loginid', '$checkstr')";
								foreach ($_POST['checkbox_btns'] as $selected) {
									$instr .= "('$login_session', '$selected')" . ($selected == end($_POST['checkbox_btns']) ? ";" : ",");
								}
								//echo "test? $instr";
								//here run the $instr
								mysqli_query($conn, $instr);
							}

							$stren = "SELECT strength.id, name FROM strength INNER JOIN user_strength on strength.id = user_strength.str_id WHERE user_strength.id = " . $_SESSION['login_userid'];
							$user_strengths = mysqli_query($conn, $stren);
							echo "your strengths: <br><br>";
							 while ($rowstren = mysqli_fetch_assoc($user_strengths)) {
						        echo $rowstren["name"] . "<br>";
						    }


							/*$btns="SELECT * FROM user_strength";
							$res = mysqli_query($conn, $btns);
							$ro = $res->fetch_assoc();
							if ($ro['id'] == $row['id']) {
								echo $ro['str_id'];
							}*/

							?></p><?php
							echo "<table>";
							echo "<tr><td>Email: ".$row['email']."</td></tr>";
							echo "<tr><td>Userid: ".$row['id']."</td></tr>";
							echo "<tr><td>Groupid: ".$row['groupid']."</td></tr>";
							echo "</table";
							?>
							<ul>
								<li><a class="group2 nappi" href="#">Diary</a>
									<ul class="group">
										<li class="group2"><form action="diary.php" method="POST">
											Comment: <textarea name="comment" rows="5" cols="40"></textarea>
											<input type="hidden" name="userid"/>
											<input type="submit" name="submit" value="Submit">
										</form>
										<?php


										$query = "SELECT *, diary.id AS 'diaryid' FROM diary INNER JOIN register ON diary.userid=register.id GROUP BY diary.id";
										$result = mysqli_query($conn, $query);

										while ($row = $result->fetch_assoc()) {
											echo "<br><br>Commentid: ".$row['diaryid']."<br>"."Date: ".$row['datetime']."<br>"."Userid: ".$row['userid']."<br>"."comment: ".$row['comment'];
										}

		/*foreach($comments as $com => $list){
		    echo $com.'<br/>';
		    foreach($list as $comdata){ 
		        echo $comdata.'<br/>';
		    }*/?>
		</li>
	</ul>
</li>

</ul>
<?php

		//}
}
else{
	echo '<h1>Admin: '.$row["username"]."'s Profile</h1>";
	echo "<table>";
	echo "Info:";
	echo "<tr><td>Email: ".$row['email']."</td></tr>";
	echo "<tr><td>Userid: ".$row['id']."</td></tr>";
	echo "<tr><td>Groupid: ".$row['groupid']."</td></tr>";
	echo "</table";
	?>



	<ul>
		<li><a class="group2" href="#"><h2>All users</h2></a>
			<ul class="group">
				<?php 
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
		</ul>
	</li>

	<li><a class="group2" href="#"><h2>Groups</h2></a>
		<ul class="group">
			<li class="group2">
				<?php
				$query = "SELECT register.id,register.username,register.groupid,groups.id,groups.name,groups.type,groups.location FROM register INNER JOIN groups ON register.groupid=groups.id";
				$result = mysqli_query($conn, $query);
				$categories = array();
				while ($row = $result->fetch_assoc()) {
					$group_stren = "SELECT strength.id, name FROM strength INNER JOIN user_strength on strength.id = user_strength.str_id INNER JOIN register ON user_strength.id = register.id WHERE register.groupid = " . $row['groupid'];
					//echo "Debug: $group_stren <br>";
					$res = mysqli_query($conn, $group_stren);
					$categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']]["users"][] = "Username: ".$row['username']."<br>";
					while ($rr = $res->fetch_assoc()) {
						//echo "ReallY? " . $row['groupid'] . " :: " . $rr["name"] . "<br>";
						if(!is_array($categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']]["strten"])){
							$categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']]["strten"] = array();
						}
						if(!in_array("strength: " . $rr["name"]."<br>", $categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']]["strten"], true)){
							$categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']]["strten"][] = "strength: " . $rr["name"]."<br>";
						}
					}
				}

				foreach($categories as $key => $category){
					echo '<br><hr />'.$key.'<br/>';
					echo "<br>Users:";
					foreach($category["users"] as $rowdata){ 
						echo '<table>';
						echo '<tr><td>'.$rowdata.'</tr></td>';
						echo '</table>';
					}
					echo "<br>Strengths:";
					if(is_array($category["strten"])){
						foreach($category["strten"] as $rowdata){ 
							echo '<table>';
							echo '<tr><td>'.$rowdata.'</tr></td>';
							echo '</table>';
						}
					} else {
						echo "<br>Empty.";
					}
				}


			}
			?>
		</li>
	</ul>
</li>

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
