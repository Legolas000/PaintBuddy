@extends('layout.layout')
@section('content')

    <?php
    ini_set('xdebug.max_nesting_level', 200);
     ?>

    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>




    @if (session('status'))
        <script>
            sweetAlert('{{ session('status') }}', "You clicked the button!", "error");
        </script>
    @endif



    <div class="col-md-8">
        <div class="box">
            <h1>Login</h1>
            <hr>
            <form action="violate" method="post">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="UserName" >
                    <font color="red"> {{$errors->first('UserName')}}</font>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="PassWord" >
                    <font color="red"> {{$errors->first('PassWord')}}</font>
                </div>
                <input name="_token" hidden value="{!! csrf_token() !!}" />
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                </div>
                <div><a href="/ResetPassword">Forget Password</a> </div>
            </form>
        </div>
    </div>

@stop
