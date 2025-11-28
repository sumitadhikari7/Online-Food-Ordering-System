<?php
$host = "127.0.0.1";
$user ="root";
$pass = '';
$db = "wt_db";
$port= 3308;
$conn = mysqli_connect($host, $user, $pass, $db, $port);
if(!$conn){
    die('Database is not connected');
}
?>