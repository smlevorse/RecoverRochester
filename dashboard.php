<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("location:login.php");
        exit();
    }

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
        <title>Welcome |  Food Circulation Network</title>
        <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/default.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/chartist.min.css">
		<style type="text/css"> 	
	
			
		</style>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/chartist.js"></script>
    </head>
    <body>
	<div class="body">
	    <div class="pure-menu pure-menu-horizontal" align="right">
			<ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="dashboard.php" class="pure-menu-link">Home</a></li>
				<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
				<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
				<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
			</ul>
		</div>    

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/main.js"></script>

    <strong>

        <!-- CODE BELOW CALCULATES TOTAL POUNDS RECOVERED AND PRINTS IT OUT-->
        <?php
            $sql = "SELECT SUM(pounds_recovered) AS value_sum FROM rec_and_dist";
            $result = $mysqli->query($sql);
            $resultArray = $result->fetch_array();
            echo "Total pounds recovered: " . $resultArray['value_sum'];

            $total = $resultArray['value_sum'];
            $sql2 = "SELECT category, SUM(pounds_recovered) AS value_sum FROM rec_and_dist GROUP BY category";

            $categories = array();
            $pounds_per_category = array();

            $result2 = $mysqli->query($sql2);
            while ($result2Array = $result2->fetch_array()) {//while there are still new rows to go through
                array_push($pounds_per_category, $result2Array['value_sum']);
                array_push($categories, $result2Array['category']);
            } 

            $sql3 = "SELECT date_recovered, SUM(pounds_recovered) AS value_sum FROM rec_and_dist GROUP BY date_recovered";

            $dates = array();
            $pounds_per_date = array();

            $result3 = $mysqli->query($sql3);
            while ($result3Array = $result3->fetch_array()) {//while there are still new rows to go through
                array_push($pounds_per_date, $result3Array['value_sum']);
                array_push($dates, date("Y-m-d", $result3Array['date_recovered']));
            } 

        ?>
        <!-- -->


    </strong>

    <div class="ct-chart" id="chart1" style="width: 300px;height: 300px;"></div>
    <div class="ct-chart" id="chart2" style="width: 700px;height: 300px;"></div>
    <script type="text/javascript">
        var data = {
          labels: [<?php echo "'" . implode("','", $categories) . "'";?>],
          series: [<?php echo implode(",", $pounds_per_category); ?>]
        };

        var options = {
          labelInterpolationFnc: function(value) {
            return value[0]
          }
        };

        var responsiveOptions = [
          ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
              return value;
            }
          }],
          ['screen and (min-width: 1024px)', {
            labelOffset: 0,
            chartPadding: 20
          }]
        ];

        new Chartist.Pie('#chart1', data, options, responsiveOptions);

        var data = {
          labels: [<?php echo "'" . implode("','", $dates) . "'";?>],
          series: [
            [<?php echo implode(",", $pounds_per_date); ?>]
          ]
        };

        var options = {
          high: 300,
          low: 0,
          axisX: {
            labelInterpolationFnc: function(value, index) {
              return index % 2 === 0 ? value : null;
            }
          }
        };

        new Chartist.Bar('#chart2', data, options);
    </script>
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
	</body>
</html>
        
