<?php
    session_start();
    $invalidUsername = false;
    $takenUsername = false;
    $invalidPassword = false;
    $mismatchedPassword = false;
    $invalidEmail = false;
    $takenEmail = false;
    $invalidName = false;

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

    //Check if the form has been submitted.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Save the variables from the form:
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['passwordVerify'];
        $email = $_POST['email'];
        $chapter = $_POST['chapter'];
        $name = $_POST['name'];

        //Check if username and password are the right length.
        if (strlen($username) < 5 || strlen($username) > 32) {
            $invalidUsername = true;
        }
        if (strlen($password) < 5 || strlen($password) > 32) {
            $invalidPassword = true;
        }

        if ($password != $password2) {
            $mismatchedPassword = true;
        }

        if (strlen($name) < 1 || strlen($name) > 64){
            $invalidName = true;
        }

        $sql1 = "SELECT * FROM Users WHERE username = " . $username;
        $sql2 = "SELECT * FROM Users WHERE email = " . $email;

        $result1 = $mysqli->query($sql1);
        if ($mysqli->affected_rows == 1) {
            //Username is taken.
            $takenUsername = true;
        }

        $result2 = $mysqli->query($sql2);
        if ($mysqli->affected_rows == 1) {
            //Username is taken.
            $takenEmail = true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //Not a valid email address.
            $invalidEmail = true;
        }

        if (!$invalidEmail && !$invalidUsername && !$invalidPassword && !$mismatchedPassword && !$takenEmail && !$takenUsername && !$invalidName) {
            //Good to go. Add them as a user.
            $sql = "INSERT INTO Users (username, email, password, num_contributions, name) VALUES ('" . $username . "', '" . $email . "', '" . md5($password) . "', 0, '" . $name . "')";

            if ($result = $mysqli->query($sql)) {
                //Successfully added the user to the database.

                //Set the session to log them in.
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;

                header("location:dashboard.php");
                exit();
            } else {
                die("Failed to add user to the database.");
            }
        }
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Register |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/default.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
		<div class="body">
        <div class="pure-menu pure-menu-horizontal" align="right">
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="index.php" class="pure-menu-link">Back</a></li>
            </ul>
            </div>
			<div align=center>
				<style>
					h1{
                    font-size:22pt;
                    color:#54A636;
                    font-family:"century gothic"
                }
                h2{
                    font-size:14pt;
                    color:#54A636;
                    font-family:"century gothic"
                }
					.error {
						color: #5A3B1A;
						font-size:14pt;
						strong;
					}
				</style>

				<form class="pure-form pure-form-aligned" method="POST" action="register.php">
					<fieldset>
						<legend><h1><b>Register</b></h1></legend>

						<div class="pure-control-group">
						<label for="username"><h2>Username</h2></label>
						<input id="username" type="text" name="username" placeholder="Username" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['username'] . "'"; } ?> >
						</div>

						<?php 
							if ($invalidUsername == true) {
								echo '<p class="error">Usernames must be between 5 and 32 characters long.</p>';
							}
							if ($takenUsername == true) {
								echo '<p class="error">Username is taken. Please try another.</p>';
							}
						?>

						<div class="pure-control-group">
						<label for="email"><h2>Email</h2></label>
						<input id="email" type="email" name="email" placeholder="Email" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['email'] . "'"; } ?>>
						</div>

						<?php
							if ($takenEmail == true) {
								echo '<p class="error">Email is taken. Please try another.</p>';
							}
							if ($invalidEmail == true) {
								echo '<p class="error">Invalid email address.</p>';
							}
						?>

						<div class="pure-control-group">
						<label for="password"><h2>Password</h2></label>
						<input id="password" type="password" name="password" placeholder="Password">
						</div>

						<?php
							if ($invalidPassword == true) {
								echo '<p class="error">Passwords must be between 5 and 32 characters long.</p>';
							}
						?>

						<div class="pure-control-group">
						<label for="passwordVerify"><h2>Re-Enter Password</h2></label>
						<input id="passwordVerify" type="password" name="passwordVerify" placeholder="Password">
						</div>

						<?php
							if ($mismatchedPassword == true) {
								echo '<p class="error">Passwords must match.</p>';
							}
						?>
						
						
						<div class="pure-control-group">
						<label for="name"><h2>Full Name</h2></label>
						<input id="Full Name" type="text" name="name" placeholder="Full Name" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['chapter'] . "'"; } ?>>
						</div>

						<?php
							if ($invalidName == true) {
								echo '<p class="error">Name must be between 1 and 64 characters long.</p>';
							}
						?>
						
						<div class="pure-control-group">
						<label for="chapter"><h2>Chapter Name</h2></label>
						<input id="Chapter Name" type="text" name="chapter" placeholder="Chapter Name" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['chapter'] . "'"; } ?>>
						</div>

						<style scoped>
							.button-xlarge{
								font-size: 125%;
							}
						</style>

						<button type="submit" class="button-xlarge pure-button">Register</button>
					</fieldset>
				</form>
        </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
