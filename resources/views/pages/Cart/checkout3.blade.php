@extends('layout.layout')
@section('content')
<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Payment method</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">

                    {!! Form::open(['url'=>'checkoutCreate2']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <h1>Checkout - Payment method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="c"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li><a href="b"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li class="active" href="a"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="checkout4.html"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Paypal</h4>

                                        <p>We like it all.</p>

                                        <div class="box-footer text-center">

                                            {!! Form::radio('payment', 'Paypal','checked')!!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Payment gateway</h4>

                                        <p>VISA and Mastercard only.</p>

                                        <div class="box-footer text-center">

                                            {!! Form::radio('payment', 'Payment gateway')!!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Cash on delivery</h4>

                                        <p>You pay when you get it.</p>

                                        <div class="box-footer text-center">

                                            {!! Form::radio('payment', 'Cash on delivery')!!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="box payment-method">

                                        <h4>Cheque</h4>

                                        <p>You deposit on the Bank.</p>

                                        <div class="box-footer text-center">

                                            {!! Form::radio('payment', 'Cheque')!!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.content -->

                        <div class="box-footer">
                            <div class="pull-left">
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Continue to Order review<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>


                    <input type="hidden" value="{{$addresss1}}" name="addresses1">
                    <input type="hidden" value="{{$addresss2}}" name="addresses2">
                    <input type="hidden" value="{{$deliveryCharge}}" name="deliveryCharges">


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
//                                    session_start();

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
                                        echo "<th>"."LKR " ."$deliveryCharge"."</th>";
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