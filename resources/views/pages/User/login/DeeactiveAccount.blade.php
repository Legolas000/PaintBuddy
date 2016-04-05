@extends('layout.layout')
@section('content')

    <?php
    ini_set('xdebug.max_nesting_level', 200);?>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>


    <?php if(isset($status)){?>
    <script>
        swal('{{$status  }}', "You clicked the button!", "error");
    </script>
    <?php } ?>

    <?php if(isset($message)){
        echo $message;}?>

    <div class="col-md-8">
        <div class="box">
            <h1>Deactive Account</h1>
            <h4>You can deactive your account.</h4>

            <hr>
            <form action="email_deactive" method="post">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">

                    <?php
                    if(isset($errors)){ ?>
                    @if (count($errors) > 0)
                        <font color="red">{{$errors->first('password')}}</font>
                    @endif
                    <?php } ?>

                </div>
                <input name="_token" hidden value="{!! csrf_token() !!}" />
                <input type="hidden" name="login_id" value="<?php  if(Auth::check()){echo Auth::user()->id;}?>">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Deactive</button>
                </div>
            </form>
        </div>
    </div>

@stop