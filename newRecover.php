<?php
    session_start();
    $invalidFoodName = false;
    $invalidWeight = false;
    $invalidRecoveryLocation = false;
    $invalidDeliveryLocation = false;


    $dbhost = "localhost";
    $dbname = "seanmbed_fcn";
    $dbusername = "seanmbed_admin";
    $dbpass = "HackRPI2015";

    $mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Error: Could not connect to database.";
        die();
    }

     //allows you to access cookies which is helpful since they are logged in to get their username

    if (!isset($_SESSION["username"])) { //global array, accessing by index
        header("location:login.php");
        exit();
    } 
    $username = $_SESSION["username"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST')  { //if the form has been submitted
        $food = addslashes($_POST['food']);
        $category = $_POST['category'];
        $weight = floatval($_POST['weight']);


        $date_r = strtotime($_POST['date_1']);
        $date_d = strtotime($_POST['date_2']);

        $delivered = $_POST['optionsRadios'];

        if ($delivered == "True" ){
            $delivered = 1;
        }
        else {
            $delivered = 0;
        }

        $location_r = addslashes($_POST['location_1']);
        $location_d = addslashes($_POST['location_2']);

        $chapter = $_POST['chapter'];

        if (strlen($food) == 0 || strlen($food) > 32 ) {
            $invalidFoodName = True;
        }

        if (strlen($weight) == 0) {
            $invalidWeight = True;
        }


        if (strlen($location_r) == 0 || strlen($location_r) > 32) {
            $invalidRecoveryLocation = True;
        }
        if (($delivered == 1 && strlen($location_d) == 0) || strlen($location_d) > 32) {
            $invalidDeliveryLocation = True;
        }


        if ($invalidFoodName == false && $invalidWeight == false && $invalidDeliveryLocation == false && $invalidRecoveryLocation == false) {
            $sql = "INSERT INTO rec_and_dist (id, food_name, category, pounds_recovered, date_recovered, delivered, 
                recovery_location, delivery_location, chapter, date_delivered, username) 
                    VALUES ('','".$food."', '".$category."', '".$weight."', '".$date_r."', '".$delivered."', '".$location_r."', 
                        '".$location_d."', '".$chapter."', '".$date_d."', '".$username."')";
            if($result = $mysqli->query($sql)) {
                //successfully added a result
                header("location:dashboard.php");
                exit();
                
            }
            else {
                echo $sql;
                echo $mysqli->error;
                die("Failed to add record to database");
            }
        }

    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>New Entry |  Food Circulation Network</title>


        <script type="text/javascript" src="http://cdn.zingchart.com/zingchart.min.js"></script>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">

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

            </style>

            <form class="pure-form pure-form-aligned" action="newRecover.php" method="POST">
                <fieldset>
                <legend><p><b>Add Recovery</b></p></legend>
                    <div class="pure-control-group">
                        <label for="food"><p>Food Name</p></label>
                        <input id="food" type="text" name="food" placeholder="ex. Pizza">
                    </div>

                    <?php
                        if ($invalidFoodName == true) {
                            echo '<p class="error">Food must be between 1 and 32 characters long.</p>';
                        }
                    ?>

                    <div class="pure-control-group">
                        <label for="category"><p>Category</p></label>
                            <select id="category" name="category">
                                <?php
                                    $sql = "SELECT cat_name from food_category";
                                    $result = $mysqli->query($sql);
                                    while ($resultArray = $result->fetch_array()) {
                                        echo "<option value='" . $resultArray['cat_name'] . "'>". $resultArray['cat_name'] . "</option>";
                                    }
                                ?>
                                
                            </select>
                    </div>


                    <div class="pure-control-group">
                        <label for="weight"><p>Weight</p></label>
                        <input id="weight" type="float" name = "weight"  placeholder="# Pounds Recovered">
                    </div>

                    <?php
                        if ($invalidWeight == true) {
                            echo '<p class="error">Must enter a weight</p>';
                        }
                    ?>


                    <hr>

                    <div class="pure-control-group">
                        <label for="date_1"><p>Date Inventoried</p></label>
                        <input id="date_1" type="date" name="date_1" placeholder="MM/DD/YYYY">
                    </div>

                    <div class="pure-control-group">
                        <label for="location_1"><p>Recovery Location</p></label>
                        <input id="location_1" type="text" name="location_1" placeholder="ex. Gracie's">
                    </div>

                    <?php
                        if ($invalidRecoveryLocation == true) {
                            echo '<p class="error">Recovery Location must be between 1 and 32 characters long.</p>';
                        }
                    ?>

                    <hr>

                        
                        <div class="pure-control-group">
							<span style="font-family: Century Gothic; font-size: 16pt; color: #54A636;">Delivered?</span>
                            <label for="option-two" class="pure-radio">
                                <input id="option-two" type="radio" name="optionsRadios" value="True" checked>
                                Yes
                            </label>
						
                            <label for="option-three" class="pure-radio">
                                <input id="option-three" type="radio" name="optionsRadios" value="False">
                                No
                            </label>
						</div>

                    <div class="pure-control-group">
                    <label for="date_2"><p>Date Delivered</p></label>
                    <input id="date_2" type="date" name="date_2" placeholder="MM/DD/YYYY">
                    </div>

                    <div class="pure-control-group">
                    <label for="location_2"><p>Delivery Location</p></label>
                    <input id="location_2" type="text" name="location_2" placeholder="ex. Open Door Mission">
                    </div>

                    <?php
                        if ($invalidDeliveryLocation == true) {
                            echo '<p class="error">Delivery Location must be between 1 and 32 characters long.</p>';
                        }
                    ?>

                    <div class="pure-control-group">
                    <label for="chapter"><p>Chapter</p></label>
                    <select id="chapter" name="chapter">
                        <option value="Recover Rochester">Recover Rochester</option>
                        <option value="Clarkson Carriers">Clarkson Carriers</option>
                        <option value="University of Rochester">University of Rochester</option>
                        <option value="Binghamton">Binghamton</option>
                        <option value="Drexel">Drexel</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>

					<style scoped>
								.button-xlarge{
									font-size: 125%;
								}
					</style>

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
