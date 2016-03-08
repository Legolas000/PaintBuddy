@extends('layout.layout1')
@section('content')

<style>
       .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
</style>

<div class="form-group">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-2 col-md-offset-0">
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <div class="panel panel-primary sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center"> Tasks </h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="/discount"> Assign New <br/> Discounts</a>
                                </li>
                                <li>
                                    <a href="assignpromotion"> Assign New<br/> Promotions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="panel panel-default, col-md-10 col-md-offset-0 ">
                <div class="col-md-6 col-md-offset-0">
                    {{ Form::open(array('url'=>'setpromotion' ,'method' => 'PUT', 'files' => true)) }}
                    <div class="form-group" class="col-md-6">
                        <div class="form-group col-md-offset-1">
                            <div class="form-group col-md-offset-1">
                                <p class="help-block" style="font-size:30px">
                                    <b>ASSIGN PROMOTION </b>
                                </p>
                                <hr/>
                            </div> 
                            <div class="form-group" >
                                <div >
                                    <label class="control-label">Select an image </label>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <span class="btn btn-default btn-file">Browse {!! Form::file('image', null) !!}</span>
                                        </div>
                                        <P style="color:red">{{$errors->first('image')}}</P><br/>
                                    </div>
                                </div>
                                <div >
                                    {{ Form::label('title', 'Title')}}
                                    <div class="form-group">
                                        {{ Form::text('title', null, ['class'=>'form-control']) }}
                                        <P style="color:red">{{$errors->first('title')}} </P>
                                    </div>
                                </div>    
                                <div >
                                    {{ Form::label('body', 'Body')}}
                                    <div class="form-group">
                                        {{ Form::textarea('body', null, ['class'=>'form-control']) }}
                                        <P style="color:red">{{$errors->first('body')}} </P>
                                    </div>
                                </div>
                                <div >
                                    <label for="startDate"> 
                                        Start Date
                                    </label>
                                </div>
                                <div class='input-group date' id="dp1">
                                  <input type="date" name="start_date" class="form-control"/>
                                  <P style="color:red">{{$errors->first('start_date')}} </P>
                                </div><br/>
                                <div>
                                <label for="endDate" >
                                    End Date 
                                </label>
                            </div>
                            <div class='input-group date'  id="dp2">
                                <input type="date" name="end_date" class="form-control"/>
                                <P style="color:red">{{$errors->first('end_date')}} </P>
                            </div><br/>
                            <div class="form-group" class="col-xs-3">
                                <div>
                                    <button type="submit" class="btn btn-primary" >Asign Promotion</button><br/>
                                    @if($pr == 1)
                                    <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css"/>
                                    <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                    <script>
                                        sweetAlert("Sorry..!!!", "You have already assigned a promotion", "error");
                                    </script>
                                    @endif 
                                    @if($pr == 0)
                                    <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css"/>
                                    <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                    <script>
                                        sweetAlert("Success..!!!", "You have successfully assigned a promotion", "success");
                                    </script>
                                    @endif 
                                <br/>
                                </div>
                            </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop