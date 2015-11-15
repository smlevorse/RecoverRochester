<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
        exit();
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Message Sent |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="css/main.css">
		<style type="text/css"> 
			
	
			
		</style>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>

	    <div class="pure-menu pure-menu-horizontal" align="right">
	    <a href="#" class="pure-menu-heading pure-menu-link">Home</a>
	    <ul class="pure-menu-list">
	        <li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
			<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
			<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
	    </ul>
	</div>
        
	<style>
	
		p{
			text-align: center;
			font-size: 36pt;
			color:#54A636;
		}
	
	</style>
		
	<body>
	
	<p>Message Successfully Sent!</p>
	
	</body>
	
	
	<div align=center>
	<form class="pure-form pure-form-aligned" method="POST" action="messagesuccess.php">
		<style scoped>
			.button-xlarge{
			font-size: 135%;
			}
		</style>
		<a href="index.php"><input type="returnhome" name="returnhome" class="button-xlarge pure-button" value="Return Home"/></a>
		</fieldset>
	</form>
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
    </body>
</html>
