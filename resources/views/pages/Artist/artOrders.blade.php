@extends('pages.Artist.artMainTemp')

@section('ArtContent')

        <div class="row">
            <div class="col-md-12">
                <br/>
                <style>
                    .center-table
                    {
                        margin: 0 auto !important;
                        float: none !important;
                    }
                </style>
                <table class="span5 center-table" >
                <tr>
                <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsController@ViewAOrders')}}'" class="btn btn-info" role="button">All Orders</button></td>
                <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsController@ViewCOrders')}}'" class="btn btn-info" role="button">Completed Orders</button></td>
                <td style="padding:0 15px 0 5px;"><button type="button" onclick="document.location.href='{{action('Artist\ArtsController@ViewOOrders')}}'" class="btn btn-info" role="button">Ongoing Orders</button></td>
                </tr></table>
                <table class="table table-bordered table-hover">
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
                        @endif
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order as $ord)
                        <?php $cond = "";
                                $extra="";?>
                        @if($ord->status == 'Completed')
                           <?php $cond = "success";
                                    $extra="";?>
                            @elseif($ord->status == 'Ongoing')
                               <?php $cond = "active";
                                      $extra="<td class=\"col-md-1 text-center\"><a href=\"chOrdeStat/$ord->ordID\" class=\"btn btn-default btn-block\" role=\"button\">Done</a></td>";?>
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
        </div>

@stop