<?php
    session_start();
    $invalidUsername = false;
    $takenUsername = false;
    $invalidPassword = false;
    $invalidEmail = false;
    $takenEmail = false;

    $dbhost = "localhost";
    $dbname = "seanmbed_fcn";
    $dbusername = "seanmbed_admin";
    $dbpass = "HackRPI2015";

    $mysqli = new mysqli($dbhost, $dbusername, $dbpass, $dbname);
    if ($mysqli->connect_errno) {
        echo "Error: Could not connect to database.";
        die();
    }

    //Check if they're already logged in.
    if (isset($_SESSION['username']) && isset($_SESSION['loggedIn'])) {
        header("location: dashboard.php");
        exit();
    }

    //Check if the form has been submitted.
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Save the variables from the form:
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $chapter = $_POST['chapter'];

        //Check if username and password are the right length.
        if (strlen($username) < 5 || strlen($username) > 32) {
            $invalidUsername = true;
        }
        if (strlen($password) < 5 || strlen($password) > 32) {
            $invalidPassword = true;
        }

        $sql1 = "SELECT * FROM Users WHERE username = " . $username;
        $sql2 = "SELECT * FROM Users WHERE email = " . $email;

        $result1 = $mysqli->query($sql1);
        if ($mysqli->affected_rows == 1) {
            //Username is taken.
            $takenUsername = true;
        }

        $result2 = $mysqli->query($sql2);
        if ($mysqli->affected_rows == 1) {
            //Username is taken.
            $takenEmail = true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //Not a valid email address.
            $invalidEmail = true;
        }

        if (!$invalidEmail && !$invalidUsername && !$invalidPassword && !$takenEmail && !$takenUsername) {
            //Good to go. Add them as a user.
            $sql = "INSERT INTO Users (username, email, password, num_contributions) VALUES ('" . $username . "', '" . $email . "', '" . md5($password) . "', 0)";

            if ($result = $mysqli->query($sql)) {
                //Successfully added the user to the database.

                //Set the session to log them in.
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = true;

                header("welcome.php");
                exit();
            } else {
                die("Failed to add user to the database.");
            }
        }
    }
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Register |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <div align=center>
            <style>
                p{
                    font-size:16pt;
                    color:#54A636;
                    font-family:"century gothic"
                }
                .error {
                    color: #ff0000;
                }
            </style>

            <form class="pure-form pure-form-aligned" method="POST" action="register.php">
                <fieldset>
                    <legend><p><b>Register</b></p></legend>

                    <div class="pure-control-group">
                    <label for="username"><p>Username</p></label>
                    <input id="username" type="text" name="username" placeholder="Username" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['username'] . "'"; } ?> >
                    </div>

                    <?php 
                        if ($invalidUsername == true) {
                            echo '<p class="error">Usernames must be between 5 and 32 characters long.</p>';
                        }
                        if ($takenUsername == true) {
                            echo '<p class="error">Username is taken. Please try another.</p>';
                        }
                    ?>

                    <div class="pure-control-group">
                    <label for="email"><p>Email</p></label>
                    <input id="email" type="email" name="email" placeholder="Email" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['email'] . "'"; } ?>>
                    </div>

                    <?php
                        if ($takenEmail == true) {
                            echo '<p class="error">Email is taken. Please try another.</p>';
                        }
                        if ($invalidEmail == true) {
                            echo '<p class="error">Invalid email address.</p>';
                        }
                    ?>

                    <div class="pure-control-group">
                    <label for="password"><p>Password</p></label>
                    <input id="password" type="password" name="password" placeholder="Password">
                    </div>

                    <?php
                        if ($invalidPassword == true) {
                            echo '<p class="error">Passwords must be between 5 and 32 characters long.</p>';
                        }
                    ?>

                    <div class="pure-control-group">
                    <label for="chapter"><p>Chapter Name</p></label>
                    <input id="Chapter Name" type="text" name="chapter" placeholder="Chapter Name" <?php if ($_SERVER['REQUEST_METHOD'] == "POST") { echo "value='" . $_POST['chapter'] . "'"; } ?>>
                    </div>

                    <style scoped>
                        .button-xlarge{
                            font-size: 125%;
                        }
                    </style>

                    <button type="submit" class="button-xlarge pure-button">Register</button>
                </fieldset>
            </form>
        </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

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
