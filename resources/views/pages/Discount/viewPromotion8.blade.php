@extends('layout.layout')
@section('content')

<div class="form-group">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default, col-md-12 col-md-offset-0 ">
                <form role="form" action="/enterpromotion"  method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group " class="col-md-6">
                        <img src="images\promotion\1.png" style="height: 250px;width: 600px; margin-left:280px" class="img-rounded"/>
                        <p style="text-align:center; font-size:25px; color:#00b3b3"><b><u> WelCome to the Promotion...!!! You can register only one promotion at a time.</u></b></p>
                        
                        <div class="row">
                        @foreach($promotiontable as $promotiontable1)
                            <div class="col-sm-6"> 
                                <div class="panel panel-default"> 
                                    <div style="text-align:center ">  
                                        <label style="color:#800000; font-size:20px" ><b>
                                            <marquee scrollamount="5" width="70">&lt;&lt;&lt;</marquee>{{ $promotiontable1->title }}<marquee scrollamount="5" direction="right" width="70">&gt;&gt;&gt;</marquee></b>
                                        </label>
                                    </div>
                                    <br/>
                                    <p style="font-size:15px; color:#99003d; text-align:center">
                                        {{ $promotiontable1->body }}
                                         The ptomotion will be available from {{ $promotiontable1->sdate }} to {{ $promotiontable1->edate }} Please Enter to register for promotion......!!!
                                    </p>
                                    <div style="text-align:center">
                                    <button type="submit" class="btn btn-primary" >Enter </button>
                                    </div><br/>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@stop
