@extends('layout.layout')
@section('content')

     <div id="all">

        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Reviews & Feedback</li>
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
                                <li >
                                    <a href="/myorders"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="/deactive_reason"><i class="fa fa-heart"></i> Deactive Account</a>
                                </li>
                                <li>
                                    <a href="/myaccount"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li class="active">

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
                        <h1>Items</h1>
                        <hr>
                        <form>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                @if (is_array($results))
                                                    @foreach ($results as $result)
                                                        <div class="col-xs-3">
                                                            <a href="item_review.<?=$result->itID?>" class="thumbnail">
                                                                <img src="img/tempEng/{!! $result->imName !!}" />
                                                                Order ID :<?=$result->ordID ?> <br>
                                                                <?=$result->itName ?> <br> <?=$result->price ?> LKR
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
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