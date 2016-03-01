@extends('layout.layout')


    <div class="navbar-buttons">

        <div class="navbar-collapse collapse right" id="basket-overview">
            <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
        </div>
        <!--/.nav-collapse -->

        <div class="navbar-collapse collapse right" id="search-not-mobile">
            <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                <span class="sr-only">Toggle search</span>
                <i class="fa fa-search"></i>
            </button>
        </div>

    </div>

    <div class="collapse clearfix" id="search">

        <form class="navbar-form" role="search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
            </div>
        </form>

    </div>
@section('content')
<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Ladies</li>
                </ul>
            </div>

            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li>
                                <a href="#">Painting <span class="badge pull-right">42</span></a>
                                <ul>
                                    <li><a href="#">Acrylic</a>
                                    </li>
                                    <li><a href="#">Airbrush</a>
                                    </li>
                                    <li><a href="#">Enamel</a>
                                    </li>
                                    <li><a href="#">Oil</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="#">Sculpture  <span class="badge pull-right">123</span></a>
                                <ul>
                                    <li><a href="#">Wood</a>
                                    </li>
                                    <li><a href="#">Metals</a>
                                    </li>
                                    <li><a href="#">Glass</a>
                                    </li>
                                    <li><a href="#">Ceramic</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Arts<span class="badge pull-right">11</span></a>
                                <ul>
                                    <li><a href="#">Digital Painting</a>
                                    </li>
                                    <li><a href="#">Collages</a>
                                    </li>
                                    <li><a href="#">Photo Montage</a>
                                    </li>
                                    <li><a href="#">3D Images</a>
                                    </li>
                                    <li><a href="#">Vector</a>
                                    </li>
                                    <li><a href="#">Photoshop</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        {{--<h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>--}}
                    </div>

                    <div class="panel-body">

                        {{--<form>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">Armani (10)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">Versace (12)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">Carlo Bruni (15)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">Jack Honey (14)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>--}}

                        {{--</form>--}}

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        {{--<h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>--}}
                    </div>

                    <div class="panel-body">

                        {{--<form>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox"> <span class="colour white"></span> White (14)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox"> <span class="colour blue"></span> Blue (10)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox"> <span class="colour green"></span> Green (20)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox"> <span class="colour yellow"></span> Yellow (13)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox"> <span class="colour red"></span> Red (10)--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>--}}

                        {{--</form>--}}

                    </div>
                </div>

                <!-- *** MENUS AND FILTERS END *** -->

                <div class="banner">
                    <a href="#">
                        <img src="img/tempEng/924852016-02-03.jpg" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box">
                    <h1>PAINTINGS</h1>
                    <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                    {{--<p> In our Paiting section we offer wide selection of the best products</p>--}}
                </div>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>12</strong> of <strong>25</strong> products
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                                <option>Sales first</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>c
                </div>

                <div class="row products">
                    @foreach ($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="{{asset('img/tempEng/197612016-02-03.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="{{asset('img/tempEng/197612016-02-03.jpg')}}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="img/product1.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="#">{{$product->name}} </a></h3>
                               <p> {{$product->description}} </p>
                                <p class="price">${{$product->price}}</p>
                                <form method="POST" action="{{url('cart')}}">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <a href="category.{{$product->id}}" class="btn btn-default">View detail</a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                </form>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    @endforeach

                </div>
                <!-- /.products -->

                <div class="pages">

                    <p class="loadMore">
                        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                    </p>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->


    <!-- *** FOOTER ***
_________________________________________________________ -->
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->




    <!-- *** COPYRIGHT ***
_________________________________________________________ -->

    <!-- *** COPYRIGHT END *** -->



</div>

    @stop
<!-- /#all -->




<!-- *** SCRIPTS TO INCLUDE ***
_________________________________________________________ -->
