@extends('layout.layout')
@section('content')

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My orders</li>
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
                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>
                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                        <hr>
                        <form>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Quantity</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                ?>
                                @if (is_array($results))

                                    @foreach ($results as $result)
                                <tr>
                                    <td name="myHeader">#<?=$result->ordID ?></td>
                                    <td><?=$result->ordDate ?></td>
                                    <td><?=$result->DueDate ?></td>
                                    <td><?=$result->qty ?></td>
                                    <td><?=$result->status ?></td>
                                    <td ><a href="/myorderView.<?php echo $result->ordID ?>" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>


@stop