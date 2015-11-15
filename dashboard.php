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
        <title>Welcome |  Food Circulation Network</title>
        <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/default.css">
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
        



			
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/main.js"></script>
        
        
        <script>
      <?php
        /* ACTION REQUIRED: Enter your database information below */
        
        /* The host name in which the database is available */
        $dbhost = "localhost";
    $dbname = "seanmbed_fcn";
    $dbusername = "seanmbed_admin";
    $dbpass = "HackRPI2015";

    $mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
    
        /* 
          The query to use. This query selects the `date` and `24h_average` columns
          from the `t_baverage` table and orders the results by date in an ascending order 
        */
        $query = "SELECT category, weight from rec_and_dist ORDER BY category ASC";
        /* ---------------- */
        $food = []; // Array to hold our date values
        $weight = []; // Array to hold our series values
        /* Connect to the database */
        $mysqli = new mysqli($dbhost, $dbusername, $dbpass);
        if($mysqli->connect_error) {
          die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        /* Run the query */
        if ($result = $mysqli->query($query)) {
          /* Fetch the result row as a numeric array */
          while( $row = $result->fetch_array(MYSQLI_NUM)){
            /* Push the values from each row into the $date and $series arrays */
            array_push($food, $row[0]);
            array_push($weight, $row[1]);
          }
          /* Convert each date value to a Unix timestamp, multiply by 1000 for milliseconds */
          
          /* Free the result set */
          $result->close();
        }
      ?>
      /* Join the values in each array to create JavaScript arrays */
      var categoryValues = [<?php echo join($food, ',') ?>];
      var weightValues = [<?php echo join($weight, ',') ?>];
      <?php
        /* Close database connection */
        $mysqli->close(); 
      
      ?>
    </script>
    <script>
    window.onload=function(){
      zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
        data:{
          "type":"line",
          "title":{
            "text":"Data Pulled from MySQL Database"
          },
          "scale-x":{
            "values": categoryValues,
            "transform":{
              "type":"category",
              "item":{
                "visible":false
              }
            }
          },
          "plot":{
            "line-width":1
          },
          "weight":[
            {
              "values":weightValues
            }
          ]
        }
      });
    };
    </script>
    <h1>Database Data</h1>
    <div id="myChart"></div>
  </body>
</html>
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
</html>
