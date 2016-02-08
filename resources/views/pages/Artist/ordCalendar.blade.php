@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    {{--Main Required Libraries -- Curtesy :- http://fullcalendar.io/--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<<<<<<< HEAD
    {{--<div id="calendar">--}}
        {{--{!! $calendar->calendar() !!}--}}
        {{--{!! $calendar->script() !!}--}}
    {{--</div>--}}
    <div class="row">
        {{--<div class="col-md-12">--}}
        <div class="container">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Calendar</h3>
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
                        <h3 class="box-title">Bar Chart</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="calendar">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                            <h1>gelrel</h1>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>


    </div>
    {{--<style>--}}
        {{--#calendar {--}}
            {{--text-align: center;--}}
            {{--font-size: 14px;--}}
            {{--font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;--}}
            {{--width: 900px;--}}
            {{--margin: 0 auto;--}}
        {{--}--}}
    {{--</style>--}}
=======
    <div id="calendar">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    </div>


    <style>
        #calendar {
            text-align: center;
            font-size: 14px;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            width: 900px;
            margin: 0 auto;
        }
    </style>
>>>>>>> origin/master


@stop