@extends('layout.layout')

{{--<script>--}}
{{--$(document).ready(function(){--}}

{{--$("#destroy").click(function()--}}
{{--{--}}

{{--var id = $(this).data("id");--}}

{{--$.ajax(--}}
{{--{--}}
{{--url: "http://localhost/PaintBuddy/public/cartDestroy",--}}
{{--type: 'DELETE',--}}
{{--method:"POST",--}}
{{--dataType: "JSON",--}}
{{--data: {--}}
{{--"id": id--}}
{{--},--}}
{{--success: function ()--}}
{{--{--}}
{{--console.log("it Work");--}}
{{--}--}}
{{--});--}}

{{--console.log("It failed");--}}
{{--})--}}

{{--});--}}
{{--</script>--}}



<!-- *** TOPBAR ***
_________________________________________________________ -->



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


@section('content')
<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>
            </div>

            <div class="col-md-9" id="basket">

                <div class="box">

                    <form method="post" action="{{url('cartUpdate')}}">              <!-- *** action=checkout1.html *** -->

                        <h1>Shopping cart</h1>
                        <?php $i=0; ?>
                        <?php $total=0; ?>
                            {{--@if(!$i)--}}
                        {{--<p class="text-muted">You currently have 1  item(s) in your cart.</p>--}}
                            {{--@else--}}

                            {{--@endif--}}


                        <div class="table-responsive">
                            @if(count($data))
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Discount</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--<form method="POST" action="{{url('cartUpdate')}}">--}}

                                    {{--$i=0;--}}
                                    {{--$total=0;--}}
                                    {{--$i=1;--}}
                                    @foreach($data as $item)
                                        {{--$i = 1+$i; ;--}}
                                        <?php $i++; ?>

                                        {{--$total=$total+$data['price'];--}}
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="img/tempEng/{{$item['imgpath']}}" alt="">
                                                </a>
                                            </td>
                                            <td><a href="#">{{$item['name']}}</a>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity" value="{{$n}}" class="form-control" >  </input>
                                                {{--<input type="hidden" name="product_title" value="{{$item['title']}}">--}}
                                                <input type="hidden" name="item_id" value="{{$item['id']}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </td>
                                            <td>${{$item['price']}}</td>
                                            <td>$0.00</td>
                                            {{--@if( $total == $item['price'])--}}
                                            {{--<td>$ {{$item['price']}} </td>--}}
                                            {{--@else if( $total != $item['price'])--}}

                                            {{--@if(Cart::count() == 1)--}}
                                                {{--{{$total}} = {{$item['price']}};--}}
                                                {{--<td>${{$item['price']}}</td>--}}
                                                   {{--continue;--}}
                                            {{--@elseif(Cart::count() > 1)--}}
                                            <td><?php $item['price']=$item['price']*$n; ?>${{$item['price']}}</td>
                                                {{--break;--}}
                                            {{--@endif--}}
                                            {{--@endif--}}
                                            <td><button class="btn btn-default" type="submit" name="cartDestroy" value="cartDestroy"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        <?php $total=$total+$item['price']; ?>
                                        {{--$i++;--}}
                                    @endforeach
                                        <p class="text-muted">You currently have {{$i}}  item(s) in your cart.</p>
                                    @else
                                        <p>You have no items in the shopping cart</p>
                                    @endif

                                    {{--</form>--}}

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">${{$total}}</th>

                                    </tr>
                                    </tfoot>
                                </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="cat.3D Images" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit" name="UpdateCart" value="UpdateCart"><i class="fa fa-refresh"></i> Update basket</button>
                                {{--<button type="submit" class="btn btn-primary" name="ProceedCheckout" value="ProceedCheckout">Proceed to checkout <i class="fa fa-chevron-right"></i>--}}
                                {{--</button>--}}
                                <a href="{{url('checkoutCreate')}}">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.box -->


                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/487682016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/487682016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/487682016-02-03.jpg.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th name="ordersub">${{$total}}</th>
                                {{--<input type="hidden" name="ordersub1" value="{{$total}}">--}}
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th name="shiptot">$<?php $total1=$total*1/100?>{{$total1}}</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th name="taxprice">$<?php $total2=$total*15/100?>{{$total2}}</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th name="totalprice">$<?php $total=$total+$total1+$total2?>{{$total}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


                {{--<div class="box">--}}
                    {{--<div class="box-header">--}}
                        {{--<h4>Coupon code</h4>--}}
                    {{--</div>--}}
                    {{--<p class="text-muted">If you have a coupon code, please enter it in the box below.</p>--}}
                    {{--<form>--}}
                        {{--<div class="input-group">--}}

                            {{--<input type="text" class="form-control">--}}

                                {{--<span class="input-group-btn">--}}

					{{--<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>--}}

				    {{--</span>--}}
                        {{--</div>--}}
                        {{--<!-- /input-group -->--}}
                    {{--</form>--}}
                {{--</div>--}}

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

    <!-- *** FOOTER ***
_________________________________________________________ -->
    </div>

    @stop