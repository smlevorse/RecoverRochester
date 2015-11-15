<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>New Entry |  Food Circulation Network</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">

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

            <form class="pure-form pure-form-aligned">
                <fieldset>
                <legend><p><b>Add Recovery</b></p></legend>
                    <div class="pure-control-group">
                        <label for="food"><p>Food Name</p></label>
                        <input id="food" type="text" name="food" placeholder="ex. Pizza">
                    </div>

                    <div class="pure-control-group">
                        <label for="category"><p>Category</p></label>
                            <select id="category" name="category">
                                <option>Meat</option>
                                <option>Grains</option>
                                <option>Vegetables</option>
                                <option>Desserts</option>
                                <option>Fruit</option>
                                <option>Other</option>
                            </select>
                    </div>


                    <div class="pure-control-group">
                        <label for="weight"><p>Weight</p></label>
                        <input id="weight" type="float" placeholder="# Pounds Recovered">
                    </div>


                    <hr>

                    <div class="pure-control-group">
                        <label for="date_1"><p>Date Inventoried</p></label>
                        <input id="date_1" type="date" name="date_1" placeholder="MM/DD/YYYY">
                    </div>

                    <div class="pure-control-group">
                        <label for="location_1"><p>Recovery Location</p></label>
                        <input id="location_1" type="text" name="location_1" placeholder="ex. Gracie's">
                    </div>

                    <hr>

                    <div class="pure-control-group">
                        <span style="font-family: Century Gothic; size: 16pt; color: #54A636;">Delivered?</span>

                        <label for="option-two" class="pure-radio">
                            <input id="option-two" type="radio" name="optionsRadios" value="option1" checked>
                            Yes
                        </label>

                        <label for="option-three" class="pure-radio">
                            <input id="option-three" type="radio" name="optionsRadios" value="option2">
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

                    <div class="pure-control-group">
                    <label for="chapter"><p>Chapter</p></label>
                    <select id="chapter">
                        <option>Recover Rochester</option>
                        <option>Clarkson Carriers</option>
                        <option>University of Rochester</option>
                        <option>Binghamton</option>
                        <option>Drexel</option>
                        <option>Other</option>
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
