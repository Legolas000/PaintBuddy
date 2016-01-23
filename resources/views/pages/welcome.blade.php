<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!--Load Bootstrap css-->
    {{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">--}}
    <!--load font awesome-->
    {{--<link href='//fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>--}}

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




    <style>
        li{
            display: inline;

        }
        body {
            font-family: 'Lato', sans-serif;
            font-weight: 400;
        }
    </style>



</head>
<body>

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
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
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
            <img src="Paint-Store-Branding-by-Toast-2.jpg" style="height: 200px;width: 400px;alignment: center" />
        </div>
        <div class="col-sm-4">

            <div class="input-group">
                <input type="text" class="form-control"/>
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
               <a href="#"><h3> Home </h3></a>
             </div>
            <div class="col-sm-2">
                <a href="#"> <h3>Categories</h3> </a>
            </div>
            <div class="col-sm-2">
                <a href="#"><h3>Customize</h3> </a>
            </div>
            <div class="col-sm-2">
                <a href="#"><h3>About Me</h3> </a>
            </div>
            <div class="col-sm-2">
                <a href="#"> <h3>Contact</h3> </a>
            </div>


        </div>
            <hr>
    </div>





    <div class="jumbotron">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>


    <div class="row">
        <div class="col-sm-4">
        <h3 align="center">Lorem ipsum</h3>
        <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>


            <div class="col-sm-4">
                <h3 align="center">Lorem ipsum</h3>
                <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
            </div>




            <div class="col-sm-4">
                <h3 align="center">Lorem ipsum</h3>
                <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
            </div>



    </div>

    <div class="row">
        <div class="col-sm-4">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-4">
            <h3>Column 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 2</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
        <div class="col-sm-4">
            <h3>Column 3</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
        </div>
    </div>
    <hr>
    <hr>

</div>



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

   <hr>


</div>

</div>
</body>
</html>
