
<!DOCTYPE HTML>
<html>
	<head>
		<title>Administrare produse</title>
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
    <?php
//session_start();
include 'connection.php';
$sql="SELECT * FROM images";
if(isset($_POST["search"])){
    $search_term= mysqli_real_escape_string($conn, $_POST["nume"]);
    $sql.= " WHERE title='{$search_term}'";
}
$query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>

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
                    <form  id="form" name="search" method="POST" action="imagini.php" width="50%">
<div class="row gtr-uniform"> 

    <div class="col-6 col-12-small">
        <input type="text" name="nume" placeholder="Introduceti numele produsului">
    </div>
    <div class="col-6 col-12-small">
        <input type="submit" name="search" value="Cauta produsul"/>
    </div>
    <div class="col-12" >
    <input type="submit" value="Reset"/>
</div>
</form>
<table class="alt">
    <thead>
    <tr>
        <th> Nume </th>
        <th> Culoare </th>
        <th> Imagine </th>
        <th> Pret(lei/buc)</th>
        <th>Actions</th>
    </tr>
    </thead>
<tbody>
    <?php
    while($row=mysqli_fetch_array($query)){ 
    ?>
        <tr style="border-bottom:1px solid black;">
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['culoare'];?></td>
        <td><img src="<?php echo $row['image'];?>" style="width:300px;height:300px;"> </td>
        <td><?php echo $row['pret'];?></td>
        <td>
            <?php echo "<a href=\"view.php?id=".$row['id']."\">View</a><br>
            <a href=\"edit.php?id=".$row['id']."\">Edit</a><br>
            <a href=\"delete.php?id=".$row['id']."\" onclick=\"return confirm('Are you sure?')\">Delete</a><br>"?>
        </td>
        </tr>
<?php
    }
    ?>
    </tbody>
    </table>
    <br><br>
    <div align="center" class="col-12">
    <a href="upload.php" class="button large">Adaugati un produs</a>
</div>
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