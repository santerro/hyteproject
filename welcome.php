<link rel="stylesheet" href="tyyli.css">
<?php 
/* welcome.php */

//$_SESSION variables become available on this page
session_start(); 
?>
<div>
<div>
<div><?= $_SESSION['message'] ?></div>
    
    Welcome <span><?= $_SESSION['username'] ?></span>
    <?php
    $mysqli = new mysqli("localhost", "root", "", "accounts");
    $sql = "SELECT username FROM users";
    //$result = mysqli_result object
    $result = $mysqli->query( $sql ); 
    ?>
    <div>
    <span><br>All registered users:</span>
    <?php
    //returns associative array of fetched row
    while( $row = $result->fetch_assoc() ){ 
        echo "<div class='userlist'><span>".$row['username']."</span><br />";
        
    }
?>  
</div>
</div>
</div>