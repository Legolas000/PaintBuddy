@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    {{--Main Required Libraries -- Curtesy :- http://fullcalendar.io/--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
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


@stop