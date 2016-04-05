@extends('layout.layout')
@section('content')

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Order review</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="post" action="{{url('sendemail')}}">
                        <h1>Checkout - Order review</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="c"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="b"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li><a href="a"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>
                        <?php $i=0; ?>
                        <?php $total=0; ?>
                        <?php $quantity=0; ?>

                        <div class="content">
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

                                        @foreach($data as $item)
                                            <?php $i++; ?>
                                            <tr>
                                                <td>
                                                        <img src="img/tempEng/{{$item['imgpath']}}" alt="">

                                                </td>
                                                <td>

                                                      {{$item['name']}}

                                                </td>


                                                <td>
                                                    <input type="text" name="{{ $item['id'] }}quantity" value="{{ $item['quantity'] }}" class="form-control" readonly="readonly" >

                                                    <?php $quantity = $quantity + $item['quantity']  ?>

                                                    <input type="hidden" name="item_id" value="{{$item['id']}}">

                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                </td>
                                                <td>LKR {{$item['price']}}</td>
                                                <td>LKR 0.00</td>

                                                <td><?php $item['price']=$item['price']*$item['quantity'] ?>LKR {{$item['price']}}</td>

                                                <td>

                                                </td>
                                            </tr>

                                            <?php $total=$total+$item['price']; ?>

                                        @endforeach


                                        <p class="text-muted">You currently have {{$i}}  item(s) in your cart.</p>
                                        @else
                                            <p>You have no items in the shopping cart</p>
                                        @endif


                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">LKR {{$total}}</th>

                                        </tr>
                                        </tfoot>
                                    </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <p>Coupon code

                                {{--<div class="col-xs-2">--}}
                                    {{--<label for="ex1">col-xs-2</label>--}}
                                    {{--<input class="form-control" id="ex1" type="text">--}}
                                {{--</div>--}}

                                </p>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Delivery charge is calculated based on the delivery method you selected.</p>

                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Order subtotal</td>
                                    <?php
//                                     session_start();
                                    // session_destroy();
                                        echo "<th>"."LKR ".$_SESSION["subtotal"]."</th>";
                                    ?>

                                </tr>
                                <tr>
                                    <td>Total Quantity</td>
                                    <?php
                                        echo "<th>"."QTY ".  $_SESSION["quantities"]."</th>";
                                    ?>

                                </tr>


                                <tr>
                                    <td>Delivery charges</td>
                                    <?php
                                        echo "<th>"."LKR "."$deliveryCharge"."</th>";
                                    ?>

                                </tr>
                                <tr>
                                    <td>Delivery address</td>
                                    <?php
                                        echo "<th>"."$addresss1"."</th>";
                                    ?>

                                </tr>


                                <tr>
                                    <td></td>
                                    <?php
                                        echo "<th>"."$addresss2"."</th>";
                                    ?>

                                </tr>

                                </tr>

                                <tr>
                                    <td>Total</td>
                                    <?php
                                        $total1 = $_SESSION["subtotal"];
                                        $total = $total1 + $deliveryCharge;
                                        echo "<th>"."LKR "."$total"."</th>";
                                        session()->put('tamount',$total);
                                    ?>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

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