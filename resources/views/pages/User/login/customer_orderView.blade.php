@extends('layout.layout')
@section('content')

    <div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a>
                        </li>
                        <li><a href="#">My orders</a>
                        </li>
                        @if (is_array($results))
                            @foreach ($results as $result)
                                <li>Order # <?=$result->ordID ?></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="/myorders"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="/deactive_reason"><i class="fa fa-heart"></i> Deactive Account</a>
                                </li>
                                <li>
                                    <a href="/myaccount"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li >
                                    <a href="/item_list"><i class="fa fa-list"></i> Reviews & Feedback</a>
                                </li>
                                <li>
                                    <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.col-md-3 -->
                    <!-- *** CUSTOMER MENU END *** -->
                </div>
                <div class="col-md-9" id="customer-order">
                    <div class="box">
                @if (is_array($results))
                    {{--@foreach ($results as $result)--}}
                       <h1>Order #<?=$result->ordID ?></h1>
                        <p class="lead">Order #<?=$result->ordID ?> was placed on <strong><?=$result->ordDate ?></strong> and is currently <strong><?=$result->status ?></strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="#">contact us</a>, our customer service center is working for you 24/7.</p>
                    {{--@endforeach--}}
                @endif

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                @if (is_array($results))
                                    @foreach ($results as $result)
                                        <tr><td>#<?=$result->itID ?></td>
                                        <td><?=$result->itName ?></td>
                                        <td><?=$result->itDescrip ?></td>
                                        <td><?=$result->price ?> LKR</td><
                                        <td><?=$result->qty ?></td>
                                        </tr>

                                    @endforeach
                                    @endif
                                </tbody>
                                </table>
                                <a href="/pdf/<?php echo $result->ordID ?>" class="btn btn-primary btn-sm">Download</a>

                            </div>
                    </div></div>
                        <!-- /.table-responsive -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>





@stop
