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

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <table class="pure-table-horizontal">
            <thead>
                Food Recovery History
            </thead>

            <thead>
                <tr>
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
                            echo "<td>" . $row['food_name'] . "</td>";
                            echo "<td>" . $row['date_recovered'] . "</td>";
                            echo "<td>" . $row['pounds_recovered'] . "</td>";
                            echo "<td>" . $row['recovery_location'] . "</td>";
                            if ($row['delivered'] == 0) {
                                echo "<td> N/A </td>";
                                echo "<td> No </td>";
                                echo "<td> N/A </td>";
                            } else {
                                echo "<td> N/A </td>";
                                echo "<td> Yes </td>";
                                echo "<td>" . $row['date_delivered'] . "</td>";
                            }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <p>Hello world! This is HTML5 Boilerplate.</p>

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
