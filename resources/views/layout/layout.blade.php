<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paint Buddy</title>
    <link rel="icon" type="image/png" href="faviconPaintBuddy.ico" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">

    <!--Load Bootstrap css-->
    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">--}}
            <!--load font awesome-->
    {{--<link href='//fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>--}}
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="js/bootstrap-dropdownhover.js"></script>


    <link rel="shortcut icon" type="image/x-icon" href="images/logoMini.ico" />


    <style>
        html,
        body {
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            margin:0;
            padding:0;
            height:100%;
        }
        li{
            display: inline;
        }
        #footer {
            width:100%;
            height:100px;
            position:absolute;
            bottom:0;
            left:0;
        }
        #wrapper {
            min-height:100%;
            position:relative;
        }
        #header {
            padding:10px;
        }
        #content {
            padding-bottom:100px; /* Height of the footer element */
        }


        /*.navbar {background-color: #2bb0ff;}*/
        /*.navbar-default .navbar-nav > li > a, .navbar-default .navbar-brand {color: #2bb0ff;}*/
        /*.navbar-default .navbar-nav > li > a:hover,*/
        /*.navbar-default .navbar-nav > li > a:focus {color: #f1f1f1; background-color: #2bb0ff;}*/

        /*@media only screen and (max-width: 766px) {*/
        /*.collapsing, .in {background-color: #2bb0ff;}*/
        /*.collapsing ul li a, .in ul li a {color: #2bb0ff!important;}*/
        /*.collapsing ul li a:hover, .in ul li a:hover {color: #2bb0ff!important;}*/
        /*}*/

        /*.navbar-collapse { background:#cccccc; !*replace with desired color*! }*/

        /*@media(min-width: 768px){*/
        /*.navbar > .container { max-width: 100%; padding: 0; }*/
        /*}*/
    </style>

</head>
<body>
<div id ="wrapper">
    <div id="header">

    <div class="container">
    <div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">PaintBuddy.com</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    {{--<ul class="nav navbar-nav">--}}
                        {{--<li class="active"><a href="#"></a></li>--}}
                        {{--<li class="dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">Page 1-1</a></li>--}}
                        {{--<li><a href="#">Page 1-2</a></li>--}}
                        {{--<li><a href="#">Page 1-3</a></li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li><a href="#">Page 2</a></li>--}}
                        {{--<li><a href="#">Page 3</a></li>--}}
                    {{--</ul>--}}
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <img src="images/logo.jpg" style="height: 150px;width: 300px;alignment: center"/>
                </div>
                <div class="col-sm-4">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...."/>
                        <span class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>

        </div>



    <div class="container-fluid">
        <hr>
        <div class="row" align="center">

            <div class="col-sm-1">

            </div>

            <div class="col-sm-2">
                <a href="/"><h4> Home </h4></a>
            </div>
            <div class="col-sm-2">
                {{--<a href="#"> <h4>Categories</h4> </a>--}}
                <div class="dropdown">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="zoomIn fadeInLeft fadeInUp fadeInRight">
                        <h4>Categories </h4>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Painting</a></li>
                        <li><a href="#">Drawings</a></li>
                        <li><a href="#">Prints</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Digital Art</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <a href="#"><h4>Customize</h4> </a>
            </div>
            <div class="col-sm-2">
                <a href="#"><h4>About Me</h4> </a>
            </div>
            <div class="col-sm-2">
                <a href="#"> <h4>Contact</h4> </a>
            </div>


        </div>
        <hr>
    </div>
</div>


        <div id="content">
    <div class="row">
    <div class="col-md-12">

        <div class="container">
            @yield('content')
        </div>
    </div>
    </div>
</div>
<div id="footer">
    <div class="container">

        <div class="footer text-center">





            <div class="row">



                <div class="col-sm-12">
                    About | Contact | Blog | FAQ |Terms of Service | Sitemap
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                    <ul>
                        <li><a href="#"><i class="fa fa-lg fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-lg fa-instagram"></i></a></li>
                    </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <i class="fa fa-cc-visa" style="font-size:36px"></i>
                    <i class="fa fa-cc-amex" style="font-size:36px"></i>
                    <i class="fa fa-cc-mastercard" style="font-size:36px"></i>
                    <i class="fa fa-cc-paypal" style="font-size:36px"></i>
                </div>

            </div>

            {{--<hr>--}}


        </div>

    </div>
    </div>
</div>
    </div>
</body>
</html>
