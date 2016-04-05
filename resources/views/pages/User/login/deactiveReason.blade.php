@extends('layout.layout')
@section('content')


    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Deactive Account</li>
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
                                <li class="active">
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

                <div class="col-md-8">
                    <div class="box">

                        <?php
                        ini_set('xdebug.max_nesting_level', 200);
                        if(isset($errors)){ ?>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <?php } ?>

                        <?php if(isset($message)){?>
                        <div class="alert-success" > <?php echo $message;?></div>
                        <?php } ?>

                        <?php if(isset($status)){ ?>
                        <div class="alert alert-danger">
                            {{ $status }}
                        </div>
                        <?php } ?>

                        <h1>Deactive Account</h1>
                            <form action="/deactive">
                                <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                                <input name="_token" hidden value="{!! csrf_token() !!}" />

                                <table>
                                    <tr>
                                        <td>Reason for leaving  </td>
                                        <td><input type="radio"  name="reason" value="1" checked="checked"/> This is temporary. I'll be back.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="radio"  name="reason" value="2"/> My account was hacked.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="radio"  name="reason" value="3"/> I have a privacy concern.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="radio"  name="reason" value="4"> I don't find PaintBuddy useful.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="radio"  name="reason" value="5"/> I spend too much time using PaintBuddy.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="radio"  name="reason" value="6"/> other.</td>
                                    </tr>
                                    <tr>
                                        <td>Please explain further</td>
                                    </tr>
                                </table>
                                        <div class="col-sm-12">
                                        <input type="textarea" cols="50" rows="10" name="freason" class="form-control" />
                                            </div>
                                   <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Deactivate</button>
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