<?php
require_once 'connection.php';
$msg="";
if(isset($_POST['upload'])) {
    $target="./images/".md5(uniqid(time())). basename($_FILES['image']['name']);
    $text=$_POST['text'];
    $cantitate=$_POST['cantitate'];
    $culoare=$_POST['culoare'];
    $pret=$_POST['pret'];
    $sql="INSERT INTO images(title, image, cantitate, culoare, pret)VALUES ('$text','$target','$cantitate','$culoare','$pret')";
    mysqli_query($conn, $sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        header('location:imagini.php');
    } else {
        $msg="Imaginea nu a fost incarcata!";
        echo $msg;
    }
}