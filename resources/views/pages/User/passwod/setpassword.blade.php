@extends('layout.layout')
@section('content')


    <?php if(isset($status)){?>
    <script>
        swal('{{$status  }}', "You clicked the button!", "error");
    </script>
    <?php } ?>


    <div class="col-md-6">
        <div class="box">
            <h1>Forgot Password</h1>

            <h5>Reset password code will be sent to your gmail account</h5>
            <hr>

            <form action="/email_reset_password" method="post">
                <input name="_token" hidden value="{!! csrf_token() !!}" />
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">

                    <?php if(isset($errors)){?>
                    <font color="red">{{$errors->first('email')}}</font>
                    <?php } ?>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i>Reset Password</button>
                </div>

            </form>
        </div>
    </div>

@stop



