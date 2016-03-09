@extends('pages.Artist.artMainTemp')

@section('ArtContent')

<<<<<<< HEAD
    <br/>
=======
>>>>>>> origin/master
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Complete Income Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="POST" action="/CpRep">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" class="btn btn-success btn-lg center-block"><i class="fa fa-download"></i>Generate</button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Payment Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" method="POST" action="/CCpRep">
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<<<<<<< HEAD
                                            <input type="text" class="form-control pull-right active" id="pRepdRange" name="pRepdRange">
=======
                                            <input type="text" class="form-control pull-right active" id="dRange" name="dRange">
>>>>>>> origin/master
                                        </div><!-- /.input group -->
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg center-block"><i class="fa fa-download"></i>Generate</button>
                             </form>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>


<<<<<<< HEAD
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Active Items Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" role="form" method="POST" action="/itRep">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" class="btn btn-success btn-lg center-block"><i class="fa fa-download"></i>Generate</button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Order History</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <form class="form-horizontal" role="form" method="POST" action="/ordRep">
                                <div class="form-group">
                                    <label>Date range:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                        <input type="text" class="form-control pull-right active" id="orddRange" name="orddRange">
                                    </div><!-- /.input group -->
                                </div>
                                <button type="submit" class="btn btn-success btn-lg center-block"><i class="fa fa-download"></i>Generate</button>
                            </form>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

=======
>>>>>>> origin/master
    @stop