@extends('layout.layout')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome To our site</div>
                    <div class="panel-body">
                        <?php if(isset($message)){
                            echo $message;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>





@stop
