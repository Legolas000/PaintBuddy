@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    {{--Main Required Libraries -- Curtesy :- http://fullcalendar.io/--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.print.css"/>

    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
                defaultDate: '2016-01-12',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {{--@foreach($orders as $ord)--}}
                    {{--{--}}
                        {{--title :{!! $ord -> ordID !!},--}}
                        {{--start:{!! $ord->ordDate !!}--}}
                    {{--}--}}
                    {{--@endforeach--}}
                        {
                            title: 'All Day Event',
                            start: '2016-01-01'
                        },

                ]
            });

        });
    </script>

    <style>

        body {
            margin: 40px 10px;
            padding: 0px;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
    </head>

        <div id='calendar'></div>


@stop