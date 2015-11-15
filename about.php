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
?>

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
	<div class="body">
		
    <?php 
        if ((isset($_SESSION['username']) && isset($_SESSION['loggedIn']))) { 
    ?>
            <div class="pure-menu pure-menu-horizontal" align="right">
            <a href="#" class="pure-menu-heading pure-menu-link">Home</a>
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
                <li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
                <li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
            </ul>
            </div>
    <?php  
        }
    ?>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/main.js"></script>
        
		<header>
			<h1>
				<img id="logo" src="img/leaf.svg" onerror="this.src='img/leaf.png'"></img>
				Food Circulation Network
			</h1>
		</header>
		
		<section class="content">
			<div class="pure-g">
				<div class="pure-u-3-24"></div>
				<div class="pure-u-10-24">
					<p>
						Every year, 1.3 billion tons of food is wasted around the world. In America alone, about 35 millions tons of food is thrown away each year.
						1 in 6 Americans struggle with food insecurity. Every 1 in 4 children suffers from hunger. With 15% of Americans living in poverty, many 
						people cannot afford to feed their families. Food Recovery Network is a nationwide effort to combat this problem, delivering excess 
						food from college campuses to local shelters and soup kitchens.With over 150 chapters spread across 39 states, the organization is quite large. Recover Rochester, founded in 2012 and run by RIT students, is one of FRN’s oldest and most effective chapters. 
					</p>
				</div>
				<div class="pure-u-8-24">
					<img src="https://pbs.twimg.com/media/B_buc10VAAEOWme.jpg" alt="food" class="img-responsive">
				</div>

			</div>
			
			<header>
				<h1>
					<img id="logo" src="img/leaf.svg" onerror="this.src='img/leaf.png'"></img>
					Food Circulation Network
				</h1>
			</header>
			
			<section class="content">
				<div class="pure-g">
					<div class="pure-u-3-24"></div>
					<div class="pure-u-10-24">
						<p>
							Every year, 1.3 billion tons of food is wasted around the world. In America alone, about 35 millions tons of food is thrown away each year.
							1 in 6 Americans struggle with food insecurity. Every 1 in 4 children suffers from hunger. With 15% of Americans living in poverty, many 
							people cannot afford to feed their families. Food Recovery Network is a nationwide effort to combat this problem, delivering excess 
							food from college campuses to local shelters and soup kitchens.
						</p>
					</div>
					<div class="pure-u-8-24">
						<img src="https://pbs.twimg.com/media/B_buc10VAAEOWme.jpg" alt="food" class="img-responsive">
					</div>
				</div>
			</section>
					
			<section class="content">
				<div class="pure-g">
					<div class="pure-u-3-24"></div>
					<div class="pure-u-8-24">
						<img src="https://pbs.twimg.com/media/CFELjhtVEAAneFY.jpg" alt="more food" class="img-responsive">
					</div>
					<div class="pure-u-10-24">
						<p>
							In the  Rochester area, there are roughly 30,000 people struggling with food insecurity. With colleges and restaurants in the area throwing
							out roughly 1 ton of food a day, Recover Rochester works to recover that food and reallocate it to those in need.
						</p>
					</div>
				</div>

			</section>
			
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
			
			<section class="content">
				<div class="pure-g">
					<div class="pure-u-3-24"></div>
					<div class="pure-u-10-24">
						<h2>Our Mission</h2>
						<p>
							Working with Recover Rochester, our goal is to provide an insight into the data their members collect. This allows RecRoc members, campus 
							dining services, meal centers, and interested community members to see the impact of the volunteers' efforts. With dozens of newer FRN chapters 
							looking to Recover Rochester for guidance, we hope to make data collection more efficient for all chapters. Providing visual representation will 
							allow students and community members to easily view the impact of their FRN chapter, thus raising awareness about food insecurity and waste.
						</p>
					</div>
					<div class="pure-u-8-24">
						<img src="https://pbs.twimg.com/media/CC4Fx8tW8AESSTB.jpg" alt="Recover Rochester" class="img-responsive">
					</div>
				</div>
			</section>
			
			<section class="content">
				<div class="pure-g">
					<div class="pure-u-3-24"></div>
					
					<div class="pure-u-18-24">
						<h2>Who We Are</h2>
						<ul>
							<li>Mars Ballantyne</li>
							<li>Nathan Holt</li>
							<li>Maranda DeStefano</li>
							<li>Sean Levorse</li>
						</ul>
					</div>
				</div>
			</section>
					
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
                </div>
        </footer>
        </body>
</html>
