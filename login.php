<?php
    session_start();
    $invalidLogin = false;

    $dbhost = "localhost";
    $dbname = "seanmbed_fcn";
    $dbusername = "seanmbed_admin";
    $dbpass = "HackRPI2015";

    $mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Error: Could not connect to database.";
        die();
    }

    //Check if they're already logged in.
    if (isset($_SESSION['username']) && isset($_SESSION['loggedIn'])) {
        header("location: dashboard.php");
        exit();
    }

    //Check if the user has submitted the form.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    	//Let's check if it's a valid user/pass combination.

    	$username = $mysqli->real_escape_string($_POST['username']);
    	$password = md5($mysqli->real_escape_string($_POST['password']));

    	$sql = "SELECT * FROM Users WHERE username = '" . $username . "' AND password='" . $password . "'";

    	if (!$result = $mysqli->query($sql)) {
            //Error running query.
            die("There was an error running the query: ". $mysqli->error);
        }

        if ($mysqli->affected_rows == 1) {
        	//There's a match. Valid user/pass combination.
        	$_SESSION['username'] = $username;
        	$_SESSION['loggedIn'] = true;

        	header("location: dashboard.php");
        	exit();
        } else {
        	$invalidLogin = true;
        }
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Login |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/default.css">
		<style type="text/css"> 
			
	
			
		</style>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
		<div class="body">
			<!--[if lt IE 8]>
				<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
				<div align=center>
					<style>
						p{
							class: pure-control-group;
							font-size:22pt;
							color:#54A636;
						}
						#error {
							class: pure-control-group;
							font-size:14pt;
							color: #5A3B1A;
						}
					</style>


					<form class="pure-form pure-form-aligned" method="POST" action="login.php">

						<fieldset>
							<legend><p><b>Login</b></p></legend>
							
							<div class="pure-control-group">
							<label for="username"><p>Username</p></label>
							<input id="username" type="text" name="username" placeholder="Username" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['username'] . "'"; } ?> />
							</div>
							<div class="pure-control-group">
							<label for="password"><p>Password</p></label>
							<input id="password" type="password" name="password" placeholder="Password" />
							</div>
							
							
							<style>
							
								label{
									font-size: 14pt
								}
							
							</style>
							
							<label for="remember" class="pure-checkbox">
							<input id="remember" type="checkbox"> Remember me
							</label>
							

							<?php 
								if ($invalidLogin == true) {
									echo '<p id="error">Invalid username and/or password. Please try again.</p>';
								}
							?>

							<style scoped>
								.button-xlarge{
									font-size: 135%;
								}
							</style>
							<input type="submit" name="submit" class="button-xlarge pure-button" value="Submit"/>
						</fieldset>
					</form>
				</div>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
			<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

			<script src="js/main.js"></script>
        </div>
		
        <footer>
			<div class="pure-g">
				<div class="pure-u-8-24">
					<img src='http://www.hackrpi.com/assets/logo.png'>
				</div>
				<div class="pure-u-5-24">
					<p>
						Created by:<br>
						Nathan Holt<br>
						Maranda DeStefano<br>
						Marissa Ballantyne<br>
						Sean Levorse
					</p>
				</div>
				<div class="pure-u-5-24">
					<a href="about.php">About Us</a>
				</div>
				<div class="pure-u-5-24">
					<a href="contact.php">Contact Us</a>
				</div>
		</footer>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        -->
    </body>
    
</html>
