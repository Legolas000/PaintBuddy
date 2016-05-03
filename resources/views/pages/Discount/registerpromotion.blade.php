@extends('layout.layout')
@section('content')

<div class="form-group">
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default, col-md-10 col-md-offset-0 ">
                <div class="col-md-8">
                   
                    <form role="form" action="regpromotion" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group" class="col-md-8">
                        
                            <div class="form-group">
                                <p class="help-block" style="font-size:30px">
                                    <b>Registry Form for Promotion</b>
                                </p>
                                <p class="help-block" style="font-size:20px">
                                    Fill in all the fields to submit your entry...!!!
                                </p><br/>
                            </div>
                            @if($rid == 1)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Sorry..!!!", "You have already registered for a promotion", "error");
                                </script>
                            @endif
                            <div>
                                <label for="Inputfname">
                                    First Name 
                                </label>
                            </div>
                            <input type="text" name="first_name" value="{{ $nm }}" class="form-control" id="Inputfname"/>
                            <P style="color:red">{{$errors->first('first_name')}}</P><br/>
                            <div>
                                <label for="Inputlname">
                                    Last Name 
                                </label>
                            </div>    
                            <input type="text" name="last_name" value="{{ $lnm }}" class="form-control" id="Inputlname" />
                            <P style="color:red">{{$errors->first('last_name')}}</P><br/>
                            <div>
                                <label for="Inputfname">
                                    Email 
                                </label>
                            </div>                                
                            <input type="email2" name="email" value="{{ $mail }}" class="form-control" id="Inputemailzz"/>
                            <P style="color:red">{{$errors->first('email')}}</P><br/>    
                            <div>
                                <label for="Inputfname">
                                    Contact number 
                                </label>
                            </div>                                    
                            <input type="integer" name="contact_number" value="{{ $phone }}" class="form-control" id="Inputno" />
                            <P style="color:red">{{$errors->first('contact_number')}}</P><br/>
                            <div>
                                <label for="Inputfname">
                                    Address
                                </label>
                            </div>  
                            <br/>
                            <input type="address" name="address" value="{{ $ad }}" class="form-control" id="Inputadd"/>
                            <P style="color:red">{{$errors->first('address')}}</P><br/>
                            <div class="checkbox">
                                <button type="submit" class="btn btn-primary">Submit My Entry</button><br/>  <!-- style="visibility:hidden" id="go" -->
                                @if($rp == 1)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Success..!!!", "You have successfuly registered to this promotion", "success");
                                </script>
                                @endif
                            
                        </div>
                        {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop

