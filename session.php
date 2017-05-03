<?php
include "dbsome.php";

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql="SELECT * FROM register WHERE username='$user_check'";
$result = $conn->query($ses_sql);
if(!$row = $result->fetch_assoc()){
	mysqli_error($conn);
}elseif ($row['userlevel'] == 0) {
	
	echo '<h1>'.$row["username"]."'s Profile</h1>";?>
	<h4 style="margin-left: 80%">Vahvuudet:</h4>
	<p style="margin-left: 80%"><?php 
							if (isset($_POST['checkbox_btns'])) { //to run PHP script on submit
								if (!empty($_POST['checkbox_btns'])) {

									$checkstr = $_POST['checkbox_btns'];
									$strin="INSERT INTO ";
						            // Loop to store and display values of individual checked checkbox.
									/*foreach ($_POST['checkbox_btns'] as $selected) {
										echo $selected."</br>";
									}*/
								}
							}
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
					$categories["Groupid: ".$row['groupid']."<br>Groupname: ".$row['name']."<br>"."Grouptype: ".$row['type']."<br>"."Location: ".$row['location']][] = "Username: ".$row['username']."<br>";
				}

				foreach($categories as $key => $category){
					echo '<br><hr />'.$key.'<br/>';
					echo "<br>Users:";
					foreach($category as $rowdata){ 
						echo '<table>';
						echo '<tr><td>'.$rowdata.'</tr></td>';
						echo '</table>';
					}
				}


			}
			if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
}
?>