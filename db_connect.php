<?php 

$servername = "localhost";
$username = "root";
$password = "Aclan*2020";
$db_name = "abpoctms_db";

$conn = new mysqli($servername,$username,$password,$db_name) or die("Could not connect to mysql").mysqli_error($conn);

?>