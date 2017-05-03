<?php
$config = parse_ini_file('../../databaseTest');

$conn = mysqli_connect($config['dbaddr'], $config['username'], $config['password'], $config['dbname']);

if (!mysqli_set_charset($conn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
    exit();
}

if (!$conn) {
    
    die("Connection failed: ".mysqli_connect_error());   
                
}
 