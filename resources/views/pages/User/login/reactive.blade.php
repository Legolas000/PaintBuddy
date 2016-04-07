@extends('layout.layout')
@section('content')

    <?php
    ini_set('xdebug.max_nesting_level', 200);?>

    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>


    @if (session('status'))
        <script>
            sweetAlert('{{ session('status') }}', "You clicked the button!", "error");
        </script>
    @endif


    <?php if(isset($message)){
        echo $message;}?>

    <div class="col-md-8">
        <div class="box">
            <h1>Reactive Account</h1>
            <h4>You can reactive your account.</h4>
            <hr>
            <form action="email_reactive" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                    <?php
                    if(isset($errors)){ ?>
                    @if (count($errors) > 0)
                        <font color="red">{{$errors->first('email')}}</font>
                    @endif
                    <?php } ?>
                </div>
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Reactive</button>
                </div>
            </form>
        </div>
    </div>

@stop
