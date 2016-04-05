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
                    <div class="table-responsive">
                        <form action="/review_add" method="post" accept-charset="UTF-8">
                            <input name="_token" hidden value="{!! csrf_token() !!}" />
                            <table class="table table-hover">
                                <tbody>
                                <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">

                                @if (is_array($results))

                                    @foreach ($results as $result)
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-xs-3">
                                                <img src="/img/tempEng/{!! $result->imName !!}" class="img-responsive">
                                                <input type="text" readonly="" name="item_id" value="<?= $result->itID ?>">
                                            </div>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>Price</td> <td><?= $result->price ?> LKR</td>
                                    </tr>
                                     <tr>
                                        <td>Name</td> <td> <?= $result->itName ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td> <td> <?= $result->itDescrip ?></td>
                                    </tr>

                                    @endforeach
                                @endif
                                     <tr>
                                          <td colspan="2"><h3> Add Reviews</h3></td>
                                    </tr>
                                     <tr>
                                          <td colspan="2">Comment</td>
                                    </tr>
                                     <tr>
                                         <td colspan="2"><textarea name="comment" class="form-control"></textarea> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"> <button  type="submit"  class="btn btn-success">Submit</button></td>
                                    </tr>
                                      <tr>
                                          <td colspan="2"><h3>Reviews</h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            @if (is_array($reviews))

                                                @foreach ($reviews as $result)
                                                    <div class="col-xs-7">
     
                                                        <u>   <?=$result->email ?> </u>  <br>
                                                        <b>  <?=$result->comment ?> </b>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->
</div>


@stop