<?php
session_start();
include "connection.php";
$sql="SELECT * FROM login";
if(isset($_POST["username"])){
    $search_term= mysqli_real_escape_string($conn, $_POST["username"]);
    $sql.=" WHERE username='{$search_term}' ";
}
$query= mysqli_query($conn, $sql)or die(mysqli_error($conn));
$row= mysqli_fetch_array($query);
if(isset($_POST['captcha']))
{
    if($_POST['captcha']==$_POST['captcha-rand'])
    {
        if((isset($_POST['username'])) && (isset($_POST['password']))) {
            if ($row) {
                if(($_POST['username']==$row['username']) && (md5($_POST['password'])==$row['password'])) {
                    if(isset($_POST['rememberme'])) {
                        setcookie('username', $_POST['username'], time()+60*60*24*365);
                        setcookie('password', md5($_POST['password']), time()+60*60*24*365);
                        setcookie('nume', $row['nume'], time()+60*60*24*365);
                        setcookie('email', $row['email'], time()+60*60*24*365);
                    } else {
                        setcookie('username', $_POST['username'], false);
                        setcookie('password', md5($_POST['password']), false);
                        setcookie('nume', $row['nume'], false);
                        setcookie('email', $row['email'], false);
                    }
                    header('location:index.php');
                    $_SESSION['message']='';
                    exit();
                } else {
                    $_SESSION['message']="Parola introdusa este gresita!";
                    header('location:login_form.php');
                    exit();
                }
            } else {
                $_SESSION['message']="Nu exista un cont cu acest nume de utilizator!";
                    header('location:login_form.php');
                    exit();
            }
        } else {
            $_SESSION['message']="Username/password necompletat!";
            header('location:login_form.php');
            exit();
        }
    }else {
    $_SESSION['message']="Captcha failed! Codul introdus nu corespunde cu imaginea!";
    header('location:login_form.php');
    exit();
    }
} else {
    $_SESSION['message']="Captcha failed! Nu ati completat codul captcha!";
    header('location:login_form.php');
    exit();
}

?>