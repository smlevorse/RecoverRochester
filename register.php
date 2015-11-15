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

            </style>

            <form class="pure-form pure-form-aligned" method="POST" action="register.php">
                <fieldset>
                    <legend><p><b>Register</b></p></legend>

                    <div class="pure-control-group">
                    <label for="username"><p>Username</p></label>
                    <input id="username" type="text" name="username" placeholder="Username">
                    </div>

                    <div class="pure-control-group">
                    <label for="email"><p>Email</p></label>
                    <input id="email" type="email" name="email" placeholder="Email">
                    </div>


                    <div class="pure-control-group">
                    <label for="password"><p>Password</p></label>
                    <input id="password" type="password" name="password" placeholder="Password">
                    </div>

                    <div class="pure-control-group">
                    <label for="chapter"><p>Chapter Name</p></label>
                    <input id="Chapter Name" type="text" name="chapter" placeholder="Chapter Name">
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
