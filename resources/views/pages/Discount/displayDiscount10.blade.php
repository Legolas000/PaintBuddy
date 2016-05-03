@extends('layout.layout')
@section('content')

<div class="form-group">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form role="form" >
                    <div class="form-group" class="col-xs-3">
                        <h2 style="color:green">Discount Offers </h2><hr/>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <img src="img\discount\d4.jpg" style="height: 250px;width: 1000px; margin-left:350px, alignment: center"/>
   			</div>
        </div>
    </div>                            
    
    <div class="row">
    <div class="col-md-12">

    <table >
    <thead>
        <tr class="info">
            <th class="col-md-2 text-center"></th>
        </tr>
    </thead>
        <div style="color:Brown" ><h3><b><u> Seasonal Discounts </u></b></h3></div>
            <tbody>
                @foreach($diplaydisc as $dpds1)
                    @if($dpds1->dtype=='Seasonal discount')
                        <tr class="col-md-4 text-center">
                            <td >
                                <div class="col-md-14" data-animate-hover="shake"><a href="#">
                                <img src="img/tempEng/{{ $dpds1->imgpath }}" style="height: 200px; width: 180px; alignment: right" class="img-rounded" />
                                <div style="color:#009933"><b>{{ $dpds1->ipersentage }}% OFF</b></div>
                                <div style="color:#009933"><b>Price : <del style="color:red">LKR {{ $dpds1->price }}</del> LKR {{ $dpds1->iprice }}</b></div>
                                <div style="color:#009933 "><b>Up To : {{ $dpds1->edate }}</b></div><br/>
                                </a></div>
                            </td>
                        </tr>    
                    @endif
                @endforeach
            </tbody>
    </table>
<br/>
    <table >
    <thead>
        <tr class="info">
            <th class="col-md-2 text-center"></th>
        </tr>
    </thead>
        <div style="color:Brown" ><h3><b><u> Festival Discount </u></b></h3></div>
            <tbody>
                @foreach($diplaydisc as $dpds1)
                    @if($dpds1->dtype=='Festival discount')
                        <tr class="col-md-4 text-center">
                            <td >
                                <div class="col-md-14" data-animate-hover="shake"><a href="#">
                                <img src="img/tempEng/{{ $dpds1->imgpath }}" style="height: 200px; width: 180px; alignment: right" class="img-rounded" />
                                <div style="color:#009933"><b>{{ $dpds1->ipersentage }}% OFF</b></div>
                                <div style="color:#009933"><b>Price : <del style="color:red">LKR {{ $dpds1->price }}</del> LKR {{ $dpds1->iprice }}</b></div>
                                <div style="color:#009933 "><b>Up To : {{ $dpds1->edate }}</b></div><br/>
                                </a></div>
                            </td>
                        </tr>    
                    @endif
                @endforeach
            </tbody>
    </table>
<br/>
    <table >
    <thead>
        <tr class="info">
            <th class="col-md-2 text-center"></th>
        </tr>
    </thead>
        <div style="color:Brown" ><h3><b><u> New Year Discount </u></b></h3></div>
            <tbody>
                @foreach($diplaydisc as $dpds1)
                    @if($dpds1->dtype=='New year discount')
                        <tr class="col-md-4 text-center">
                            <td >
                                <div class="col-md-14" data-animate-hover="shake"><a href="#">
                                <img src="img/tempEng/{{ $dpds1->imgpath }}" style="height: 200px; width: 180px; alignment: right" class="img-rounded" />
                                <div style="color:#009933"><b>{{ $dpds1->ipersentage }}% OFF</b></div>
                                <div style="color:#009933"><b>Price : <del style="color:red">LKR {{ $dpds1->price }}</del> LKR {{ $dpds1->iprice }}</b></div>
                                <div style="color:#009933 "><b>Up To : {{ $dpds1->edate }}</b></div><br/>
                                </a></div>
                            </td>
                        </tr>    
                    @endif
                @endforeach
            </tbody>
    </table>
<br/>
    <table >
    <thead>
        <tr class="info">
            <th class="col-md-2 text-center"></th>
        </tr>
    </thead>
        <div style="color:Brown" ><h3><b><u> Year End Discount </u></b></h3></div>
            <tbody>
                @foreach($diplaydisc as $dpds1)
                    @if($dpds1->dtype=='Year end discount')
                        <tr class="col-md-4 text-center">
                            <td >
                                <div class="col-md-14" data-animate-hover="shake"><a href="#">
                                <img src="img/tempEng/{{ $dpds1->imgpath }}" style="height: 200px; width: 180px; alignment: right" class="img-rounded" />
                                <div style="color:#009933"><b>{{ $dpds1->ipersentage }}% OFF</b></div>
                                <div style="color:#009933"><b>Price : <del style="color:red">LKR {{ $dpds1->price }}</del> LKR {{ $dpds1->iprice }}</b></div>
                                <div style="color:#009933 "><b>Up To : {{ $dpds1->edate }}</b></div><br/>
                                </a></div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
    </table>
<br/>
    <table >
    <thead>
        <tr class="info">
            <th class="col-md-2 text-center"></th>
        </tr>
    </thead>
        <div style="color:Brown" ><h3><b><u> Other Discount </u></b></h3></div>
            <tbody>
                @foreach($diplaydisc as $dpds1)
                    @if($dpds1->dtype=='Other types')
                        <tr class="col-md-4 text-center">
                            <td >
                                <div class="col-md-14" data-animate-hover="shake"><a href="#">
                                <img src="img/tempEng/{{ $dpds1->imgpath }}" style="height: 200px; width: 180px; alignment: right" class="img-rounded" data-animate-hover="shake"/>
                                <div style="color:#009933"><b>{{ $dpds1->ipersentage }}% OFF</b></div>
                                <div style="color:#009933"><b>Price : <del style="color:red">LKR {{ $dpds1->price }}</del> LKR {{ $dpds1->iprice }}</b></div>
                                <div style="color:#009933 "><b>Up To : {{ $dpds1->edate }}</b></div><br/>
                                </a></div>
                            </td>
                        </tr>    
                    @endif
                @endforeach
            </tbody>
    </table>
    </div>  
    </div> 
</div>                          
@stop
