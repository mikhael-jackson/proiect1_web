<?php
session_start();
include 'clase.php';
include 'connection.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body class="is-preload">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v20.0" nonce="8DMootv1"></script>
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
                if ((isset($_COOKIE['username'])) && ($_COOKIE['username'] == 'ADMIN'))
                    echo "<li><a href='admin.php'>Administrare</a></li>";
                ?>
                <li><a href="others.php">Despre noi</a></li>
            </ul>
            <ul class="actions stacked">
                <?php 
                if ((isset($_COOKIE['username'])) && (isset($_COOKIE['password'])))
                    echo "<li><a href='logout.php' class='button fit'>Log out</a></li>";
                else
                    echo "<li><a href='login_form.php' class='button fit'>Log in</a></li>";
                ?>
            </ul>
        </nav>

        <!-- Banner -->
        <section id="banner" class="major">
            <div class="inner">
                <header class="major">
                    <h1>Proiectul 1 - Florarie</h1>
                </header>
                <div class="content">
                    <p><?php
                        if ((isset($_COOKIE['username'])) && (isset($_COOKIE['password'])))
                            echo "Welcome back, " . $_COOKIE['nume'];
                    ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Flower Selection -->
        <section>
            <h2>Selecteaza flori pentru a crea un buchet</h2>
            <form method="POST" action="">
                <table>
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Nume</th>
                            <th>Culoare</th>
                            <th>Pret (lei/fir)</th>
                            <th>Imagine</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM images";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' id='checkbox' name='flowers[]' value='{$row['id']}'><label for='rememberme'>Selecteaza</label></td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['culoare'] . "</td>";
                            echo "<td>" . $row['pret'] . "</td>";
                            echo "<td><img src='" . $row['image'] . "' width='100px' height='100px'></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="create_bouquet" value="Create Bouquet">
            </form>
        </section>

        <!-- Display Bouquet -->
        <section>
            <?php
            if (isset($_POST['create_bouquet']) && isset($_POST['flowers'])) {
                $bouquet = new Bouquet();
                foreach ($_POST['flowers'] as $flower_id) {
                    $sql = "SELECT * FROM images WHERE id='$flower_id'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $flower = new Flower($row['title'], $row['culoare']);
                    $bouquet->addFlower($flower);
                }
                echo "<h2>Bouquet Contents:</h2>";
                $bouquet->displayBouquet();
            }
            ?>
        </section>

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