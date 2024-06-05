<?php
session_start();
include("connection.php");
$rand=rand(9999,1000);
?>
<!DOCTYPE HTML>
<html>
    
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/form_style.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <style>
        .captcha
        {
            width:25%;
            background: yellow;
            text-align:center;
            font-size: 24px;
            font-weight:700;
            color:black;
        }
        </style>
	</head>
    <body>
            
    <div id="form">
    <h2> Login </h2>
        <form name="form" method="POST" action="login.php">
            <div class="row gtr-uniform">
                <div class="col-6 col-12-xsmall">
                    <input type="text" name="username" id="username" value="" placeholder="Username" required data-parsley-trigger="keyup" />
                </div>
                <div class="col-6 col-12-xsmall">
                    <input type="password" name="password" id="password" value="" placeholder="Password" required data-parsley-trigger="keyup" />
                </div>
                <!-- Break -->
                <div class="col-6 col-12-small">
                    <input type="checkbox" id="rememberme" name="rememberme">
                    <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-6 col-12-small">
                <!-- <?php
                            if(isset($_SESSION['message']))
                                echo "<label>". $_SESSION['message']. "</label> </br>";
                            ?> -->
                </div>
                <!-- Break -->
                <div class="col-6 col-12-small">
                    <label>Introduceti codul din imagine:</label><br>
                    <input type="text" name="captcha" placeholder="Enter code" required data-parsley-trigger="keyup" />
                    <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                </div>
                <div class="col-6 col-12-small">
                        <div class="captcha">
                            <?php echo $rand; ?> 
                        </div><br>
                </div>
                <!-- Break -->
                <div class="col-12">
                <?php
                            if(isset($_SESSION['message']))
                                echo "<label>". $_SESSION['message']. "</label> </br>";
                            ?>
                </div class="col-12" align="center">
                    <ul class="actions">
                        <li><input type="submit" id="btn" value="Login" name="submit"/></li>
                    </ul>
                </div>
                <br>
                <div class="col-12" align="center">
                    <p> Nu aveti cont? <a href="register.php">Inregistrare!</s> </p>    
                </div>
            </div>
        </form>
    </div>
</body>
</html>
