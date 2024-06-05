<?php
require_once 'connection.php';
$msg="";
if(isset($_POST['upload'])) {
    $nume=$_POST['nume'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO login(nume, username, email, password )VALUES ('$nume','$username','$email','$password')";
    $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $msg="Inregistrarea a fost adaugata cu succes!";
    header('location:users.php');
}