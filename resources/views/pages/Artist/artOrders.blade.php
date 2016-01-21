@extends('pages.Artist.artMainTemp')

@section('ArtContent')

        <div class="row">
            <div class="col-md-12">
                {{--{!! Form::open(array( 'class'=>'form navbar-form navbar-right')) !!}--}}
                {{--{!! Form::text('search', null,array('required',--}}
                                                      {{--'class'=>'form-control',--}}
                                                      {{--'placeholder'=>'Search Order.')) !!}--}}
                {{--{!! Form::submit('Search',--}}
                                           {{--array('class'=>'btn btn-default')) !!}--}}
                {{--{!! Form::close() !!}--}}
                <br/>
                {{--<a href="{{action('Artist\ArtsController@ViewCOrders')}}">Add task template</a>--}}
                <style>
                    .center-table
                    {
                        margin: 0 auto !important;
                        float: none !important;
                    }
                </style>
                <table class="span5 center-table" >
                <tr>
                <td style="padding:0 15px 0 5px;"><a href="{{action('Artist\ArtsController@ViewAOrders')}}" class="btn btn-info" role="button">All Orders</a></td>
                <td style="padding:0 15px 0 5px;"><a href="{{action('Artist\ArtsController@ViewCOrders')}}" class="btn btn-info" role="button">Completed Orders</a></td>
                <td style="padding:0 15px 0 5px;"><a href="{{action('Artist\ArtsController@ViewOOrders')}}" class="btn btn-info" role="button">Ongoing Orders</a></td>
                </tr></table>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>
                            Order ID
                        </th>
                        <th>
                            Ordered Date
                        </th>
                        <th>
                            Due Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>
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
                                      $extra="<td><a href=\"chOrdeStat/$ord->ordID\" class=\"btn btn-default btn-block\" role=\"button\">Done</a></td>";?>
                                @endif
                        <tr class ={!! $cond !!}>
                            <td>
                                    {!! $ord['ordID'] !!}
                            </td>
                            <td>
                                    {!! $ord['ordDate'] !!}
                            </td>
                            <td>
                                    {!! $ord['DueDate'] !!}
                            </td>
                            <td>
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