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
        <title>Recoveries |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/default.css">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
		<div class="body">
			<?php 
				if ((isset($_SESSION['username']) && isset($_SESSION['loggedIn']))) { 
			?>
				 <div class="pure-menu pure-menu-horizontal" align="right">
					<ul class="pure-menu-list">
                        <li class="pure-menu-item"><a href="dashboard.php" class="pure-menu-link">Home</a></li>
						<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
						<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
						<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
					</ul>
				</div>
			<?php  
				}
				else{
			?>		
			
				 <div class="pure-menu pure-menu-horizontal" align="right">
						<ul class="pure-menu-list">
							<li class="pure-menu-item"><a href="index.php" class="pure-menu-link">Home</a></li>
							<li class="pure-menu-item"><a href="login.php" class="pure-menu-link">Login</a></li>
							<li class="pure-menu-item"><a href="register.php" class="pure-menu-link">Register</a></li>
						</ul>
					</div>
			
			<?php	
				}
			?>
		   
			<!--[if lt IE 8]>
				<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->

			<style>
				table{
					width: 900px
				}
			
			</style>
			
			<style>
			
				p{
					font-size: 22pt;
					color: #54A636;
				}
			
			</style>
			
			<div align=center>
			<table class="pure-table pure-table-borded">
				<thead>
					<p><b>Food Recovery History</b></p>
				</thead>

				<thead>
					
					<tr style="background-color:#D8E3D8">
						<th>Food Name</th>
						<th>Date Recovered</th>
						<th>Pounds</th>
						<th>From</th>
						<th>To</th>
						<th>Delivered</th>
						<th>Date Delivered</th>
					</tr>	
				</thead>

				

				
				<tbody>
					<?php
						$sql = "SELECT food_name, date_recovered, pounds_recovered, recovery_location, delivery_location, delivered, date_delivered FROM rec_and_dist";

						if (!$result = $mysqli->query($sql)) {
							//Error running query.
							die("There was an error running the query: ". $mysqli->error);
						}


						//Loop through all the valid rows and create part of the table.
						while ($row = $result->fetch_array()) {
							echo "<tr>";
								echo "<strong><td style=color:#007308>" . $row['food_name'] . "</td></strong>";
								echo "<td>" . $row['date_recovered'] . "</td>";
								echo "<strong><td style=color:#007308>" . $row['pounds_recovered'] . "</td></strong>";
								echo "<td>" . $row['recovery_location'] . "</td>";
								if ($row['delivered'] == 0) {
									echo "<td> N/A </td>";
									echo "<td> No </td>";
									echo "<td> N/A </td>";
								} else {
									echo "<td>". $row['delivery_location'] . "</td>";
									echo "<td> Yes </td>";
									echo "<td>" . $row['date_delivered'] . "</td>";
								}
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
			<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>


			<script src="js/main.js"></script>
			
			

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
