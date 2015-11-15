<?php
	session_start();
	
	$invalidname = false;
	$invalidemail = false;
	$invalidmessage = false;
	
	$dbhost = "localhost";
    $dbname = "seanmbed_fcn";
    $dbusername = "seanmbed_admin";
    $dbpass = "HackRPI2015";

    $mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Error: Could not connect to database.";
        die();
    }
	
	if (isset($_SESSION['username'])){
		$sql = "SELECT name, email FROM Users WHERE username = '" . $_SESSION['username'] . "'";
		$result = $mysqli->query($sql);
			$resultarray = $result->fetch_array();
			$name = $resultarray['name'];
			$email = $resultarray['email'];
	}
	
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
	   
		if (strlen($name) == 0 || strlen($name) > 64){
			$invalidname = true;
		}
		if (strlen($email) == 0 || strlen($email) > 32){
			$invalidemail = true;
		}
		if (strlen($message) == 0 ){
			$invalidmessage = true;
		}
		
		if ($invalidname == false && $invalidemail == false && $invalidmessage == false){
			
			
			$to = 'mxb9328@rit.edu';
			$subject = 'Food Circulation Network: Contact Form Message';
			$messageToSend = "Name: " . $name . "\r\n" .
			"Reply to: " . $email . "\r\n" .
			$message;

			mail($to, $subject, $messageToSend);	
			
			header("location:messagesuccess.php");
            exit();
			
		}
    }



?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact |  Food Circulation Network</title>
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
				<a href="#" class="pure-menu-heading pure-menu-link">Home</a>
				<ul class="pure-menu-list">
					<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
					<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
					<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
				</ul>
			</div>
				<div align=center>
					<style>
						p{
							font-size:16pt;
							color:#54A636;
							font-family:"century gothic"
						}
						.error {
							color: #5A3B1A;
							font-size:14pt;
							strong;
						}

					</style>

					<form class="pure-form pure-form-aligned" method="POST" action="contact.php">
						<fieldset>
							<legend><p><b>Contact</b></p></legend>

							<div class="pure-control-group">
							<label for="name"><p>Name</p></label>
							<input id="name" type="text" name="name" placeholder="name" <?php if (isset($name)){echo "value='".$name."'";} ?>  <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['name'] . "'"; } ?>>
							</div>

							<?php 
								if ($invalidname == true) {
									echo '<p class="error">Name cannot be empty nor too long.</p>';
								}
							?>
							
							<div class="pure-control-group">
							<label for="email"><p>Email</p></label>
							<input id="email" type="email" name="email" placeholder="Email" <?php if (isset($email)){echo "value='".$email."'";} ?> <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['email'] . "'"; } ?>>
							</div>

							
							<?php 
								if ($invalidemail == true) {
									echo '<p class="error">Email cannot be empty nor too long.</p>';
								}
							?>
							
						<div class="pure-control<-group">        
						</fieldset>

						<fieldset class="pure-group">
							<label for="message"><p>Message</p></label>
							<textarea class="pure-input-1-1" name="message" placeholder="Enter your Message"><?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo $_POST['message']; } ?></textarea>

						<?php 
							if ($invalidmessage == true) {
								echo '<p class="error">Message cannot be empty.</p>';
							}
						?>
							
							<button type="submit" class="button-xlarge pure-button">Submit</button>
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
