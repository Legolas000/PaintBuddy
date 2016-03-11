
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        -- PaintBuddy --
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

<!-- sweetalert message -->
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

</head>

<body>

<!-- *** TOPBAR ***
_________________________________________________________ -->
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">

               @if (Auth::check())
                    <li style="color: white">
                        <?php
                        echo Auth::user()->name;?>@else  <a href ="/login">login |</a>

                    </li>
                @endif

                @if(Auth::check())
                    <li>
                        <a href ="/logout">logout</a>   @else  <a href ="/register">register |</a>
                    </li>
                @endif


                <li><a href="#">Contact</a>
                </li>
                <li><a href="#">Recently viewed</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                    <form action="customer-orders.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email-modal" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password-modal" placeholder="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                <img src="img/logo1.png" alt="PaintBuddy logo" class="hidden-xs">
                <img src="img/logo-small1.png" alt="PaintBuddy logo" class="visible-xs"><span class="sr-only">PaintBuddy - go to homepage</span>
            </a>
            {{--<div class="navbar-buttons">--}}
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<i class="fa fa-align-justify"></i>--}}
            {{--</button>--}}
            {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">--}}
            {{--<span class="sr-only">Toggle search</span>--}}
            {{--<i class="fa fa-search"></i>--}}
            {{--</button>--}}
            {{--<a class="btn btn-default navbar-toggle" href="basket.html">--}}
            {{--<i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>--}}
            {{--</a>--}}
            {{--</div>--}}
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.html">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categories<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Painting</h5>
                                        <ul>
                                            <li><a href="/cat.Acrylic">Acrylic</a>
                                            </li>
                                            <li><a href="/cat.AirBrush">Airbrush</a>
                                            </li>
                                            <li><a href="/cat.Enamel">Enamel</a>
                                            </li>
                                            <li><a href="/cat.Oil">Oil</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Sculpture</h5>
                                        <ul>
                                            <li><a href="/cat.Wood">Wood</a>
                                            </li>
                                            <li><a href="/cat.Metal">Metals</a>
                                            </li>
                                            <li><a href="/cat.Glass">Glass</a>
                                            </li>
                                            <li><a href="/cat.Ceramic">Ceramic</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Digital Arts</h5>
                                        <ul>
                                            <li><a href="/cat.Digital Painting">Digital Painting</a>
                                            </li>
                                            <li><a href="/cat.Collages">Collages</a>
                                            </li>
                                            <li><a href="/cat.Photo Montage">Photo Montage</a>
                                            </li>
                                            <li><a href="/cat.3D Images">3D Images</a>
                                            </li>
                                            <li><a href="/cat.Vector">Vector</a>
                                            </li>
                                            <li><a href="/cat.Photoshop">Photoshop</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Arts and Crafts</h5>
                                        <ul>
                                            <li><a href="#">Trainers</a>
                                            </li>
                                            <li><a href="#">Sandals</a>
                                            </li>
                                            <li><a href="#">Hiking shoes</a>
                                            </li>
                                        </ul>
                                        <h5>Drawing</h5>
                                        <ul>
                                            <li><a href="#">Trainers</a>
                                            </li>
                                            <li><a href="#">Sandals</a>
                                            </li>
                                            <li><a href="#">Hiking shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>

                {{--<li class="dropdown yamm-fw">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li>--}}
                {{--<div class="yamm-content">--}}
                {{--<div class="row">--}}
                {{--<div class="col-sm-3">--}}
                {{--<h5>Clothing</h5>--}}
                {{--<ul>--}}
                {{--<li><a href="category.html">T-shirts</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Shirts</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Pants</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Accessories</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3">--}}
                {{--<h5>Shoes</h5>--}}
                {{--<ul>--}}
                {{--<li><a href="category.html">Trainers</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Sandals</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Hiking shoes</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Casual</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3">--}}
                {{--<h5>Accessories</h5>--}}
                {{--<ul>--}}
                {{--<li><a href="category.html">Trainers</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Sandals</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Hiking shoes</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Casual</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Hiking shoes</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Casual</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<h5>Looks and trends</h5>--}}
                {{--<ul>--}}
                {{--<li><a href="category.html">Trainers</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Sandals</a>--}}
                {{--</li>--}}
                {{--<li><a href="category.html">Hiking shoes</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3">--}}
                {{--<div class="banner">--}}
                {{--<a href="#">--}}
                {{--<img src="img/banner.jpg" class="img img-responsive" alt="">--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--<div class="banner">--}}
                {{--<a href="#">--}}
                {{--<img src="img/banner2.jpg" class="img img-responsive" alt="">--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.yamm-content -->--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Custom Design <b class="caret"></b></a>
                    {{--<ul class="dropdown-menu">--}}
                    {{--<li>--}}
                    {{--<div class="yamm-content">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-sm-3">--}}
                    {{--<h5>Shop</h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="index.html">Homepage</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="category.html">Category - sidebar left</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="category-right.html">Category - sidebar right</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="category-full.html">Category - full width</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="detail.html">Product detail</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                    {{--<h5>User</h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="register.html">Register / login</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="customer-orders.html">Orders history</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="customer-order.html">Order history detail</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="customer-wishlist.html">Wishlist</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="customer-account.html">Customer account / change password</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                    {{--<h5>Order process</h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="basket.html">Shopping cart</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="checkout1.html">Checkout - step 1</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="checkout2.html">Checkout - step 2</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="checkout3.html">Checkout - step 3</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="checkout4.html">Checkout - step 4</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-sm-3">--}}
                    {{--<h5>Pages and blog</h5>--}}
                    {{--<ul>--}}
                    {{--<li><a href="blog.html">Blog listing</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="post.html">Blog Post</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="faq.html">FAQ</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="text.html">Text page</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="text-right.html">Text page - right sidebar</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="404.html">404 page</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="contact.html">Contact</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.yamm-content -->--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        {{--<div class="navbar-buttons">--}}

        {{--<div class="navbar-collapse collapse right" id="basket-overview">--}}
        {{--<a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>--}}
        {{--</div>--}}
        {{--<!--/.nav-collapse -->--}}

        {{--<div class="navbar-collapse collapse right" id="search-not-mobile">--}}
        {{--<button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">--}}
        {{--<span class="sr-only">Toggle search</span>--}}
        {{--<i class="fa fa-search"></i>--}}
        {{--</button>--}}
        {{--</div>--}}

        {{--</div>--}}

        {{--<div class="collapse clearfix" id="search">--}}

        {{--<form class="navbar-form" role="search">--}}
        {{--<div class="input-group">--}}
        {{--<input type="text" class="form-control" placeholder="Search">--}}
        {{--<span class="input-group-btn">--}}

        {{--<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>--}}

        {{--</span>--}}
        {{--</div>--}}
        {{--</form>--}}

        {{--</div>--}}
                <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>
<!-- /#navbar -->

<!-- *** NAVBAR END *** -->

<div id="content">
    <div class="row">
        <div class="col-md-12">

            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- *** FOOTER ***
_________________________________________________________ -->
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="#">About us</a>
                    </li>
                    <li><a href="#">Terms and conditions</a>
                    </li>
                    <li><a href="#">FAQ</a>
                    </li>
                    <li><a href="/contact">Contact us</a>
                    </li>
                </ul>

                <hr>

                <h4>User section</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="#">Register</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Top categories</h4>

                <h5>Painting</h5>

                <ul>
                    <li><a href="#">Airbrush</a>
                    </li>
                    <li><a href="/cat.Enamel">Enamel</a>
                    </li>
                    <li><a href="/cat.Oil">Oil</a>
                    </li>
                </ul>

                <h5>Sculpture</h5>
                <ul>
                    <li><a href="/cat.Wood">Wood</a>
                    </li>
                    <li><a href="/cat.Metals">Metals</a>
                    </li>
                    <li><a href="/cat.Glass">Glass</a>
                    </li>
                    <li><a href="/cat.Ceramic">Ceramic</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Where to find us</h4>

                <p><strong>PaintBuddy Lanka (pvt) Ltd</strong>
                    <br>13/25 Duplication Road
                    <br>Kollupitiya
                    <br>Colombo - 03
                    <br>Sri Lanka
                    <br>
                    <strong>South Asia</strong>
                </p>

                <a href="/contact">Go to contact page</a>

                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->



            <div class="col-md-3 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">Subscribe now and get an instant updates about new products & the latest promotions delivered straight to your inbox.</p>

                <form>
                    <div class="input-group">

                        <input type="text" class="form-control">

                                <span class="input-group-btn">

          <button class="btn btn-default" type="button">Subscribe!</button>

      </span>

                    </div>
                    <!-- /input-group -->
                </form>

                <hr>

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                </p>


            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#footer -->

<!-- *** FOOTER END *** -->




<!-- *** COPYRIGHT ***
_________________________________________________________ -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">Â© 2015 PaintBuddy.com</p>

        </div>
        <div class="col-md-6">
            {{--<p class="pull-right">By <a href="http://bootstrapious.com/e-commerce-templates">WE_SEP</a> with support from <a href="http://kakusei.cz">DesignovÃ© pÅ™edmÄ›ty</a>--}}
                    <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
            </p>
        </div>
    </div>
</div>
<!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap-hover-dropdown.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/front.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>

<script>
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(6.903363, 79.854606),
            mapTypeId: google.maps.MapTypeId.ROAD,
            scrollwheel: false
        }
        var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);

        var myLatLng = new google.maps.LatLng(6.903363, 79.854606);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

</body>

</html>