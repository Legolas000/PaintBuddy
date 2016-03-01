@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    {{--Main Required Libraries -- Curtesy :- http://fullcalendar.io/--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    {{--<div id="calendar">--}}
    {{--{!! $calendar->calendar() !!}--}}
    {{--{!! $calendar->script() !!}--}}
    {{--</div>--}}


    <style>
        .center-table
        {
            margin: 0 auto !important;
            float: none !important;
        }
    </style>

    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> {{ Session::get('message', '') }}
        </div>
    @endif

    {{--<div class="container">--}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    {{--</div>--}}
    <div class="row">
        {{--<div class="col-md-12">--}}
        {{--<div class="container">--}}
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders Calendar</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="calendar">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders Table</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="artOrdersTable">
                            <table class="span5 center-table col-sm-6" >
                                <tr>
                                    <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewAOrders')}}'" class="btn btn-info" role="button">All Orders</button></td>
                                    <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewCOrders')}}'" class="btn btn-info" role="button">Completed Orders</button></td>
                                    <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewOOrders')}}'" class="btn btn-info" role="button">Ongoing Orders</button></td>
                                    <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewCusRatOrd')}}'" class="btn btn-info" role="button">Order By Rating</button></td>
                                </tr>
                            </table>
                            </br>
                            <table  class="table table-bordered table-hover" id="artOrdersTab">
                                <thead>
                                <tr>
                                    <th class="col-md-2 text-center">
                                        Order ID
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Ordered Date
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Due Date
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Status
                                    </th>
                                    <?php $url = $_SERVER['REQUEST_URI'];?>
                                    @if($url != '/ArtMainOrdersC')
                                        <th class="col-md-2 text-center">Update</th>
                                        <th class="col-md-2 text-center">Cancel</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order as $ord)
                                    <?php $cond = "";
                                    $extra="";?>
                                    @if($ord->status == 'Completed')
                                        <?php $cond = "success";
                                        if($url == '/ArtMainOrdersC')
                                            $extra="";
                                        else
                                            $extra="<td></td><td></td>";?>
                                    @elseif($ord->status == 'Ongoing')
                                        <?php $cond = "danger";
                                        $extra="<td class=\"col-md-1 text-center\"><a href=\"chOrdeStat/$ord->ordID\" class=\"btn btn-default btn-block\" role=\"button\">Done</a></td>
                                                <td class=\"col-md-1 text-center\"><a href=\"canCusOrd/$ord->ordID\" class=\"btn btn-default btn-block\" role=\"button\">Cancel</a></td>
                                                ";?>
                                    @endif
                                    <tr class ={!! $cond !!}>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['ordID'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['ordDate'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['DueDate'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['status'] !!}
                                        </td>
                                        {!! $extra !!}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Colour Definition</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #00a65a; color: #d6d6d6; font-family:'sans-serif';">Completed</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #f39c12; color: #d6d6d6; font-family:'sans-serif';">Passed delivery Date</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #f56954; color: #d6d6d6; font-family:'sans-serif';">Close to due date</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #00c0ef; color: #d6d6d6; font-family:'sans-serif';">Ongoing</button>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>
    </div>


    {{--</div>--}}
    {{--<style>--}}
    {{--#calendar {--}}
    {{--text-align: center;--}}
    {{--font-size: 14px;--}}
    {{--font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;--}}
    {{--width: 900px;--}}
    {{--margin: 0 auto;--}}
    {{--}--}}
    {{--</style>--}}


@stop