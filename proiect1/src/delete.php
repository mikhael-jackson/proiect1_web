<?php
include 'connection.php';
$sql1="SELECT * FROM images WHERE id='{$_GET['id']}'";
$query=mysqli_query($conn, $sql1) or die (mysqli_error($conn));
$row=mysqli_fetch_array($query);
unlink($row['image']);
$sql2="DELETE FROM images WHERE id='{$_GET['id']}'";
$query=mysqli_query($conn, $sql2) or die(mysqli_error($conn));
header('location:imagini.php');
?>