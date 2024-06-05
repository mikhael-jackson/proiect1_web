<?php
$servername="mysql_db";
$username="root";
$password="toor";
$db_name="users";
$conn=mysqli_connect($servername, $username, $password, $db_name, 3306);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
?>