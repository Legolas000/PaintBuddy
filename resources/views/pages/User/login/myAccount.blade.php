@extends('layout.layout')
@section('content')
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>My account</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 ________________________________________________________ -->
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
                                <li class="active">
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
                <div class="col-md-9">
                    <div class="box">

                        <?php
                        ini_set('xdebug.max_nesting_level', 200);?>

                            <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
                            <script src="js/sweetalert.min.js"></script>





                            @if (session('alert3'))
                                <script>
                                    sweetAlert('{{ session('alert3') }}', "You clicked the button!", "error");
                                </script>
                            @endif

                            @if (session('alert4'))
                                <script>
                                    sweetAlert('{{ session('alert4') }}', "You clicked the button!", "success");
                                </script>
                            @endif

                        <p class="lead">Change your personal details or your password here.</p>
                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                            <form method="post" action="/image" enctype="multipart/form-data">
                                <h3>Change profile picture</h3>

                                <?php  if(Auth::check()){echo Auth::user()->profile;}?>
                                <img src="img/profile/{!! Auth::user()->profile !!}" class="col-xs-3"/>
                                <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                                <input name="_token" hidden value="{!! csrf_token() !!}" />
                                <input type="file"  name="filefield" id="filefield" >
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> upload</button>

                                <?php
                                if(isset($errors)){ ?>
                                @if (count($errors) > 0)
                                    <font color="red">{{$errors->first('filefield')}}</font>
                                @endif
                                <?php } ?>

                            </form>

                            <h3>Change password</h3>
                        <form method="post" action="/change_password">
                            <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                            <input name="_token" hidden value="{!! csrf_token() !!}" />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" name="Password"   >
                                        <?php

                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('ResetPassword')}}</font>
                                        @endif
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" name="ResetPassword">
                                        <?php

                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('ResetPassword')}}</font>
                                        @endif
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>
                        <hr>
                        <h3>Personal details</h3>
                        <form method="post" action="/change_details">
                            <input name="_token" hidden value="{!! csrf_token() !!}" />
                            <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php  if(Auth::check()){echo Auth::user()->name;}?>">

                                        <?php
                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('firstname')}}</font>
                                        @endif
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php  if(Auth::check()){echo Auth::user()->lname;}?>">

                                        <?php

                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('lastname')}}</font>
                                        @endif
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" name="phone" value="<?php  if(Auth::check()){echo Auth::user()->PhoneNo;}?>">

                                        <?php
                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('phone')}}</font>
                                        @endif
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php  if(Auth::check()){echo Auth::user()->address;}?>">

                                        <?php
                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('address')}}</font>
                                        @endif
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">City</label>
                                        <input type="text" class="form-control" name="city" value="<?php  if(Auth::check()){echo Auth::user()->city;}?>" >

                                        <?php
                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('city')}}</font>
                                        @endif
                                        <?php } ?>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">State/Province</label>
                                        <input type="text" class="form-control" name="state" value="<?php  if(Auth::check()){echo Auth::user()->state;}?>" >

                                        <?php

                                        if(isset($errors)){ ?>
                                        @if (count($errors) > 0)
                                            <font color="red">{{$errors->first('state')}}</font>
                                        @endif
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <input name="submit" type="submit" value="Submit" id="submit" class="btn btn-primary">
                                </div>
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