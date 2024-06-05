<?php
include 'connection.php';
if(!isset($_POST["submit"])) {
    $sql="SELECT * FROM images WHERE id='{$_GET['id']}'";
    $result=mysqli_query($conn, $sql);
    $record=mysqli_fetch_array($result);
} else {
    $sql2="SELECT * FROM images WHERE id='{$_POST['id']}'";
    $result2=mysqli_query($conn, $sql2);
    $rec=mysqli_fetch_array($result2);
    $title=$_POST['title'];
    $cantitate=$_POST['cantitate'];
    $culoare=$_POST['culoare'];
    $pret=$_POST['pret'];
    if(isset($_POST['image'])) {
        $target="./images/". basename($_FILES['image']['name']);
    } else {
        $target=$rec['image'];
        //echo $target;
    }
    $sql1="UPDATE images SET title='{$title}', image='{$target}', cantitate='{$cantitate}', pret='{$pret}', culoare='{$culoare}' WHERE id='{$_POST['id']}'";
    mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

	$sql = "SELECT * FROM images WHERE id='{$_POST['id']}'";
    $result = mysqli_query($conn, $sql);
    $record = mysqli_fetch_array($result);
    header('location:imagini.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Modifica produs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/form_style.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <style>
            th, td {
            text-align: center; 
            vertical-align: middle;
        }
        </style>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header">
            <a href="index.php" class="logo"><strong>The Amethyst FlowerShop</strong> <span>by Mihaela Alina Flutur </span></a>
            <nav>
                <a href="#menu">Menu</a>
            </nav>
        </header>

        <!-- Menu -->
        <nav id="menu">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
                            <?php
                                if((isset($_COOKIE['username'])) && ($_COOKIE['username']=='ADMIN'))
                                    echo "<li><a href='admin.php'>Administrare</a></li>"; ?>
							<li><a href="others.php">Despre noi</a></li>
						</ul>
						<ul class="actions stacked">
                            <?php 
                            if((isset($_COOKIE['username'])) && (isset($_COOKIE['password'])))
                                echo "<li><a href='logout.php' class='button fit'>Log out</a></li>";
                            else
                                echo "<li><a href='login_form.php' class='button fit'>Log in</a></li>";
                            ?>
                        </ul>
    </nav>

				<!-- Main -->
					<div id="main" class="alt">
                    <h1>Editati inregistrarea:</h1>
                        <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                            <label>Titlu:</label>
                            <input type="text" id="title" name="title" value="<?php echo $record['title']; ?>"/> <br/>
                            <label>Culoare:</label>
                            <input type="text" name="culoare" value="<?php echo $record['culoare']; ?>"/> <br/>
                            <label>Cantitate:</label>
                            <input type="text" id="cantitate" name="cantitate" value="<?php echo $record['cantitate']; ?>"/> <br/>
                            <label>Pret:</label>
                            <input type="text" name="pret" value="<?php echo $record['pret']; ?>"/> <br/>
                            <label>Imagine:</label>
                            <input type="file" name="image"/> <br/>
                            <img src="<?php echo $record['image']; ?>" width="100px" height="100px"><br/>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                            <input type ="submit" name="submit" value="Edit"/>
                        </form>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>