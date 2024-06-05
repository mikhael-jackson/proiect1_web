<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Nume:</br><input type="text" name="username"/><br/>
    Parola:</br><input type="text" name="password"/><br/>
    <input type="submit" name="submit" value="Submit"/>
</form>

<?php
include "connection.php";
if(isset($_POST["submit"]))  {
    $sql="INSERT INTO login (username, password) VALUES ('{$_POST["username"]}', '{$_POST["password"]}' )";
    $query= mysqli_query($conn, $sql) or die (mysqli_error($conn));
    echo"Inregistrarea a fost adaugata cu succes!";
}
?>

