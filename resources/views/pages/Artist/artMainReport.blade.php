@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    <div class="container">
        <div class="row">
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Report</div>--}}

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/artPayRep">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <div class="form-group">
                                <div class="col-xs-6 col-sm-4">

                                </div>
                                <div class="col-xs-6 col-sm-4">
                                    <button type="submit" class="btn btn-success btn-lg center-block">Generate Income Report</button>
                                </div>
                                <div class="col-xs-6 col-sm-4">

                                </div>
                            </div>
                        </form>
                    </div>
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>


    @stop