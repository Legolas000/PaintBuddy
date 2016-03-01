@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    <br/>
    <div class="row">

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Radar Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="pViewChart" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>



        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Item View Count</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">
                <table class="table table-bordered table-hover" id="aPageView">
                    <thead>
                    <tr>
                        <th class="col-md-2 text-center">
                            Item Name
                        </th>
                        <th class="col-md-2 text-center">
                            View Count
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($countDets as $it)
                        <tr>
                            <td class="col-md-2 text-center dbOrder">
                                {!! $it->PageName !!}
                            </td>
                            <td class="col-md-2 text-center dbOrder">
                                {!! $it->PageCount !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            </div>
        </div>

    </div>

    @stop