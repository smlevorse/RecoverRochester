<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>FCN |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
		


        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/main.js"></script>
        
		
		
		<header>
			<h1>
				<img id="logo" src="img/leaf.svg" onerror="this.src='img/leaf.png'"></img>
				Food Circulation Network
			</h1>
			
			<?php
				session_start();
			
				$dbhost = "localhost";
				$dbname = "seanmbed_fcn";
				$dbusername = "seanmbed_admin";
				$dbpass = "HackRPI2015";
			
				$mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
				if ($mysqli->connect_errno) {
					echo "Error: Could not connect to database.";
					die();
				}
	
				if (!isset($_SESSION['username'])){?>
					<h2>
						<style>
							p{
								color:#BED8B8;
							}
						</style>
						<div class="pure-menu pure-menu-horizontal">
						<ul class="pure-menu-list">
							<li class="pure-menu-item"><a href="login.php" class="pure-menu-link"><p>Login</p></a></li>
							<li class="pure-menu-item"><a href="register.php" class="pure-menu-link"><p>Register</p></a></li>
						</ul>
						</div>
					</h2>
				<?php
				} else{?>
					<h2>
						<style>
							p{
								color:#BED8B8;
							}
						</style>
					
						<div class="pure-menu pure-menu-horizontal">
						<ul class="pure-menu-list">
							<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link"><p>Profile</p></a></li>
							<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link"><p>Add Recovery</p></a></li>
							<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link"><p>Logout</p></a></li>
						</ul>
						</div>
					</h2>
				<?php	
				}
				?>
			

			
			
		</header>
		
		<section class="content">
			<div class="pure-g">
				<div class="pure-u-3-24"></div>
				<div class="pure-u-10-24">
					<p>
						In the United States, food insecurity affects 1 in 6 people, or 50 million Americans. The Food Recovery Network is the largest 
						student movement against food waste and hunger in America. With over 150 chapters spread across 39 states, the organization is quite large.
						Recover Rochester, founded and run by RIT students, is one of FRN’s largest and most effective chapters. 
					</p>
				</div>
				<div class="pure-u-8-24">
					<img src="img/hamburger.jpg" alt="woman holding small hamburger" class="img-responsive">
				</div>
			</div>
		</section>
				
		<section class="content">
			<div class="pure-g">
				<div class="pure-u-3-24"></div>
				<div class="pure-u-8-24">
					<img src="img/grapes.jpeg" alt="grapes" class="img-responsive">
				</div>
				<div class="pure-u-10-24">
					<p>
						Developed for HackRPI, Food Circulation Network is a tool for chapters of the Food Recovery Network like Recover Rochester to track and 
						analyze the food that they have collected and distributed. This tool helps local admins keep a record of distribution locations and how 
						much of each food category is at each location. 
					</p>
				</div>
			</div>
		</section>
				
		<footer>
			<div class="pure-g">
				<div class="pure-u-1-3">
					<img src='http://www.hackrpi.com/assets/logo.png'>
				</div>
				<div class="pure-u-1-3">
					<p>
						Created by:<br>
						Nathan Holt<br>
						Maranda DeStefano<br>
						Marissa Ballantyne<br>
						Sean Levorse
					</p>
				</div>
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
