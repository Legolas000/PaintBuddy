@extends('pages.Artist.artMainTemp')

@section('ArtContent')

<br/>

<div class="row">
    <div class="col-md-10">
        <div class="box box-sucess">
            <div class="box-header with-border">
                <h3 class="box-title">Order Details</h3>
            </div>
            <div class="box-body">
                <div class="tabbable">
                {{--<div class="nav-tabs-custom">--}}
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Customer Details</a></li>
                        <li><a href="#tab2" data-toggle="tab">Order Details</a></li>
                        <li><a href="#tab3" data-toggle="tab">Delivery Details</a></li>
                        <li><a href="#tab4" data-toggle="tab">Payment Details</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                        @if(isset($ordDetails))
                            <label>Customer Name</label>
                            <input type='text' class='form-control' readonly value="{!! $ordDetails->name.' '.$ordDetails->lname !!}">
                            <label>Email</label>
                            <a href="#emailOrd" style="border-style:solid;border-color:#EBEBE4;background-color:#EBEBE4;" class='form-control' data-toggle="modal"><i class="fa fa-envelope"></i> &nbsp;&nbsp;{!! $ordDetails->email !!}</a>
                            <label>Phone Number</label>
                            <input type='text' class='form-control' readonly value="{!! $ordDetails->PhoneNo !!}">
                            <label>Address</label>
                            <input type='text' class='form-control' readonly value="{!! $ordDetails->address !!}">
                            <label>City</label>
                            <input type='text' class='form-control' readonly value="{!! $ordDetails->city !!}">
                            <label>State</label>
                            <input type='text' class='form-control' readonly value="{!! $ordDetails->state !!}">
                        @else
                            <h1>These details have not been fully collected.</h1>
                        @endif
                        </div>
                        <div class="tab-pane" id="tab2">
                        @if(isset($ordDetails) && isset($itemDetails))
                            <div class="col-md-3">
                                <label>Order ID</label>
                                <input type='text' class='form-control' readonly value="{!! $ordDetails->ordID !!}">
                                <label>Ordered Date</label>
                                <input type='text' class='form-control' readonly value="{!! $ordDetails->ordDate !!}">
                                <label>Due Date</label>
                                <input type='text' class='form-control' readonly value="{!! $ordDetails->DueDate !!}">
                                <label>Deadline Date</label>
                                <input type='text' class='form-control' readonly value="{!! $ordDetails->DLineDate !!}">
                                <label>Order Status</label>
                                <input type='text' class='form-control' readonly value="{!! $ordDetails->status !!}">
                            </div>
                            <div class="col-md-9">
                                <table  class="table table-condensed table-hover table-bordered" id="ordDetails">
                                    <thead>
                                    <tr>
                                        <th class="col-md-2 text-center">
                                            Item Name
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Item Description
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Item Size
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Quantity
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Price per Unit
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($itemDetails as $items)
                                            <tr class = "success">
                                                <td class="col-md-2 text-center">
                                                {!! $items->itID !!}
                                                </td>
                                                <td class="col-md-2 text-center">
                                                {!! $items->itDescrip !!}
                                                </td>
                                                <td class="col-md-2 text-center">
                                                {!! $items->itSize !!}
                                                </td>
                                                <td class="col-md-2 text-center">
                                                {!! $items->qty !!}
                                                </td>
                                                <td class="col-md-2 text-center">
                                                {!! $items->itPrice !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h1>These details have not been fully collected.</h1>
                            @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            @if(isset($delDetails))
                                <label>Customer Name</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->firstName.' '.$delDetails->lastName !!}">
                                <label>Email</label>
                                <a href="#emailOrd" style="border-style:solid;border-color:#EBEBE4;background-color:#EBEBE4;" class='form-control' data-toggle="modal"><i class="fa fa-envelope"></i> &nbsp;&nbsp;{!! $delDetails->email !!}</a>
                                <label>Phone Number</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->telephone !!}">
                                <label>Company</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->company !!}">
                                <label>Street</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->street !!}">
                                <label>City</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->city !!}">
                                <label>State</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->state !!}">
                                <label>Zip</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->zip !!}">
                                <label>Country</label>
                                <input type='text' class='form-control' readonly value="{!! $delDetails->country !!}">
                            @else
                                <h1>These details have not been fully collected.</h1>
                            @endif
                        </div>
                        <div class="tab-pane" id="tab4">
                            @if(isset($paymentDetails))
                                <label>Payment Date</label>
                                <input type='text' class='form-control' readonly value="{!! $paymentDetails->payDate !!}">
                                <label>Amount</label>
                                <input type='text' class='form-control' readonly value="{!! $paymentDetails->totalAmount !!}">
                                <label>Payment Method</label>
                                <input type='text' class='form-control' readonly value="{!! $paymentDetails->payMethod !!}">
                            @else
                                <h1>These details have not been fully collected.</h1>
                            @endif
                        </div>

                    </div>
                </div>
                <br/>
                {{--</div>--}}
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-2">
        <div class="box box-sucess">
            <div class="box-header with-border">
                <h3 class="box-title">Link To</h3>
            </div>
            <div class="box-body">
                <button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewOOrdersDD')}}'" class="btn btn-info col-md-12" role="button">Assign Deadline</button>
                <button type="button" onclick="document.location.href='{{action('Artist\ArtsOrdersController@ViewAOrders')}}'" class="btn btn-info col-md-12" role="button">Check Orders</button>
            </div>
    </div>
</div>
@stop