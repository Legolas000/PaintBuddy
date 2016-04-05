@extends('layout.layout')
@section('content')

<!-- *** NAVBAR END *** -->

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Delivery method</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">

                    {!! Form::open(['url'=>'checkoutCreate1']) !!}

                        <h1>Checkout - Delivery method</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="c"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>Free Delivery</h4>

                                        <p>Same date on delivery date - regular option.</p>

                                        <?php

//                                        session_start();
                                        $quantityTOT =  $_SESSION["quantities"];

                                        ?>
                                        <div class="box-footer text-center">

                                            <input type="hidden" value="{{$deliveryDate}}" name="deliverydate">
                                            {!! Form::radio('delivery', 'normal','checked')!!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>Express Delivery</h4>

                                        <p>Possible date before delivery date - fastest option.</p>

                                        <div class="box-footer text-center">

                                            <input type="hidden" value="<?php echo($quantityTOT); ?>" name="quantit">
                                            {!! Form::radio('delivery', 'express')!!}

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
                                <button type="submit" class="btn btn-primary">Continue to Payment Method<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                    <input type="hidden" value="{{$address1}}" name="addresses1">

                    <input type="hidden" value="{{$address2}}" name="addresses2">

                   {!! Form::close() !!}

                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted"><strong class="text-primary">Delivery is FREE </strong>of charge Islanwide.EXPRESS delivery charge is LKR 400.</p>

                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Order subtotal</td>

                                    <?php
                                  // session_start();
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
                                        echo "<th>"."LKR ".$_SESSION["del"]."</th>";
                                    ?>

                                </tr>
                                <tr>
                                    <td>Delivery address</td>
                                    <?php
                                        echo "<th>"."$address1"."</th>";
                                    ?>

                                </tr>


                                <tr>
                                    <td></td>
                                    <?php
                                        echo "<th>"."$address2"."</th>";
                                    ?>

                                </tr>

                                </tr>

                                <tr>
                                    <td>Total</td>
                                    <?php
                                        echo "<th>"."LKR ".$_SESSION["subtotal"]."</th>";
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