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

    if (!isset($_GET['username'])) {
        //No username passed as parameter. Maybe they want to view their own profile.
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];

            $sql = "SELECT name FROM Users WHERE username='" . $username . "'";
            $result = $mysqli->query($sql);

            //User found.
            $resultArray = $result->fetch_array();
            $name = $resultArray['name'];
        } else {
            die("Must be logged in or searching for a user to view this page.");
        }
    } 
    else {
        $username = $_GET['username'];
        $sql = "SELECT name FROM users WHERE username='" . $username . "'";
        $result = $mysqli->query($sql);

        if ($mysqli->affected_rows == 1) {
            //User found.
            $resultArray = $result->fetch_array();
            $name = $resultArray['name'];
            echo "found";
        } 
        else {
            //Not a valid user.
            die("Not a valid user.");
        }
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Profile |  Food Circulation Network</title>
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
			<div class="pure-menu pure-menu-horizontal" align="right">
				<ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="dashboard.php" class="pure-menu-link">Home</a></li>
					<li class="pure-menu-item"><a href="profile.php" class="pure-menu-link">Profile</a></li>
					<li class="pure-menu-item"><a href="newRecover.php" class="pure-menu-link">Add Recovery</a></li>
					<li class="pure-menu-item"><a href="logout.php" class="pure-menu-link">Logout</a></li>
				</ul>
			</div>
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
						<p><b>Food Recovery History for <?php echo $name; ?></b></p>
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
							$sql = "SELECT food_name, date_recovered, pounds_recovered, recovery_location, delivery_location, delivered, date_delivered FROM rec_and_dist WHERE username ='" . $username . "'";

							if (!$result = $mysqli->query($sql)) {
								//Error running query.
								die("There was an error running the query: ". $mysqli->error);
							}

							$numberOfContributions = $mysqli->affected_rows;

							//Loop through all the valid rows and create part of the table.
							while ($row = $result->fetch_array()) {
								echo "<tr>";
									echo "<strong><td style=color:#007308>" . $row['food_name'] . "</td></strong>";
									echo "<td>" . date("Y-m-d", $row['date_recovered']) . "</td>";
									echo "<strong><td style=color:#007308>" . $row['pounds_recovered'] . "</td></strong>";
									echo "<td>" . $row['recovery_location'] . "</td>";
									if ($row['delivered'] == 0) {
										echo "<td> N/A </td>";
										echo "<td> No </td>";
										echo "<td> N/A </td>";
									} else {
										echo "<td>". $row['delivery_location'] . "</td>";
										echo "<td> Yes </td>";
										echo "<td>" . date("Y-m-d", $row['date_delivered']) . "</td>";
									}
								echo "</tr>";
							}
						?>
					</tbody>
					<tfoot>
						<?php echo "Total contributions: " . $numberOfContributions; ?>
					</tfoot>
				</table>
			</div>
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
            </div>
        </footer>
    </body>
</html>
