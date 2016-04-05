@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    <br/>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{!! $detsArr['OnOrdCount'] !!}</h3>
                    <p>Ongoing Orders</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{!! $detsArr['itemCount'] !!}</h3>
                    <p>Available Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-briefcase"></i>
                </div>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{!! $detsArr['usrCount'] !!}</h3>
                    <p>Registered Users</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{!! $detsArr['uniVisitors'] !!}</h3>
                    <p>Visitor Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div><!-- ./col -->

        <div class="nav-tabs-custom col-md-6">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Bar Chart</a></li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Total Sales per Month </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="chart">
                        <canvas id="barChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-tabs-custom col-md-6">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Line Chart</a></li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Total Sales per Month </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop