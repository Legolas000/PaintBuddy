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
                    </div>
                    <!-- /.col-md-3 -->
                    <!-- *** CUSTOMER MENU END *** -->
                </div>
                <div class="col-md-8">
                    <div class="box">
                        <?php
                        ini_set('xdebug.max_nesting_level', 200);?>

                        <?php if(isset($message)){?>
                        <div class="alert-success" > <?php echo $message;?></div>
                        <?php } ?>

                            <?php if(isset($status)){ ?>
                            <div class="alert alert-danger">
                                {{ $status }}
                            </div>
                            <?php } ?>

                        <h1>Deactive Account</h1>

                        <h5>your account status will be sent to your gmail account.
                            Please confirm your password to continue</h5>
                        <hr>

                        <form action="/email_deactive" method="post">
                            <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" >
                                <?php if(isset($errors)){ ?>
                                <font color="red">{{$errors->first('password')}}</font><?php}?>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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