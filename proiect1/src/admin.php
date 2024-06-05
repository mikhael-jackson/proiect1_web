<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin</title>
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
					<div id="form" class="alt">
                        <h3> Pagina administratorului </h3>
                    <ul class="alt">
                        <li><a href="imagini.php">Operatii produse</a></li>
                        <li><a href="users.php">Operatii utilizatori</a></li>
                    </ul>
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