<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PaintBuddy Ver 1.0.0</title>

    <meta name="Site for selling art" content="Created using Laravel 5.0 and BootPly!">
    <meta name="Legolas000" content="BootPly used">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">PaintBuddy</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Available Art<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Show all artwork</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Customize template</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">
                            Search
                        </button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Login</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

<div class="footer">
    <p style="text-align: center">© 2016 PaintBuddy Ver 1.0.0</p>
</div>
</body>
</html>