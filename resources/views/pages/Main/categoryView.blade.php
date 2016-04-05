@extends('layout.layout')
@section('content')
    <div id="all">

        <div id="content">
            <div class="container">

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
                                    <a href="#">Painting </a>
                                    <ul>
                                        <li><a href="cat.Acrylic">Acrylic</a>
                                        </li>
                                        <li><a href="cat.AirBrush">Airbrush</a>
                                        </li>
                                        <li><a href="cat.Enamel">Enamel</a>
                                        </li>
                                        <li><a href="cat.Oil">Oil</a>
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="#">Sculpture </a>
                                    <ul>
                                        <li><a href="cat.Wood">Wood</a>
                                        </li>
                                        <li><a href="cat.Metal">Metals</a>
                                        </li>
                                        <li><a href="cat.Glass">Glass</a>
                                        </li>
                                        <li><a href="cat.Ceramic">Ceramic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Arts</a>
                                    <ul>
                                        <li><a href="cat.Digital Painting">Digital Painting</a>
                                        </li>
                                        <li><a href="cat.Collages">Collages</a>
                                        </li>
                                        <li><a href="cat.Photo Montage">Photo Montage</a>
                                        </li>
                                        <li><a href="cat.3D Images">3D Images</a>
                                        </li>
                                        <li><a href="cat.Vector">Vector</a>
                                        </li>
                                        <li><a href="cat.Photoshop">Photoshop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Arts and Crafts</a>
                                    <ul>
                                        <li><a href="#">Paper marbling</a>
                                        </li>
                                        <li><a href="#">Textile Crafts</a>
                                        </li>
                                        <li><a href="#">Decorative Crafts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Drawing</a>
                                    <ul>
                                        <li><a href="#">Abstract</a>
                                        </li>
                                        <li><a href="#">Fine Art</a>
                                        </li>
                                        <li><a href="#">Pop Art</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>


                <div class="col-md-9">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>{!! $catName !!}</li>
                    </ul>

                    <div class="box">
                        <h1>{!! $catName !!}</h1>
                        <p> we offer wide selection of the best products from {!! $catName !!} we have created and these products will amaze you.</p>
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
                        </div>
                    </div>


                    <style>
                        .cat-item{
                            width: 500px;
                            height: 200px;
                            background-position: center;
                            background-size: cover;
                        }
                    </style>



                    <div class="row products">

                        @foreach($imDets as $dets)
                            <div class="col-md-4 col-sm-3">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="viewDets.{!! $dets->itID !!}">
                                                    <img src="img/tempEng/{{$dets->imName}}" alt="" class="img-responsive cat-item">
                                                </a>

                                                @if (session()->has('items'))

                                                    @foreach($data as $item)

                                                        @if($item['id'] == $dets->itID)
                                                            <p class="bg-danger">This product already added to the cart </p>
                                                        @endif

                                                    @endforeach

                                                @endif
                                            </div>
                                            <div class="back">
                                                <a href="viewDets.{!! $dets->itID !!}">
                                                    <img src="img/tempEng/{!! $dets->imName !!}" alt="" class="img-responsive cat-item">
                                                </a>
                                                @if (session()->has('items'))

                                                    @foreach($data as $item)

                                                        @if($item['id'] == $dets->itID)
                                                            <p class="bg-danger">This product already added to the cart </p>
                                                        @endif

                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <a href="viewDets.{!! $dets->itID !!}" class="invisible">
                                        <img src="img/tempEng/{!! $dets->imName !!}" alt="" class="img-responsive cat-item">
                                    </a>


                                    <div class="text">
                                        <h3><a href="viewDets.{!! $dets->itID !!}">{!! $dets->itName !!}</a></h3>
                                        <p class="price">LKR {!! $dets->price !!}</p>
                                        <form method="POST" action="{{url('cart')}}">
                                            <input type="hidden" name="item_id" value="{{$dets->itID}}">
                                            <input type="hidden" name="catName" value="{{$catName}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                            <p class="buttons">
                                                <a href="viewDets.{!! $dets->itID !!}" class="btn btn-default">View detail</a>

                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>

                                            </p>
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
</div>
@stop