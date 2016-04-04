@extends('pages.Artist.artMainTemp')

@section('ArtContent')

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create DB Backup</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form class="form-horizontal" role="form" method="get" action="/exportDB">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <button type="submit" class="btn btn-success btn-lg center-block"><i class="fa fa-download"></i>Export DB</button>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

@stop