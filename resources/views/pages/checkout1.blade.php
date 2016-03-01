
@extends('layout.layout')
@section('content')

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>

                    <li>Checkout - Address</li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">
                    {{--<form method="post" action="{{url('checkoutCreate')}}">--}}
                        {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
                    {!! Form::open(['url'=>'checkoutCreate']) !!}

                    {{--open(['route' => 'books.store'])--}}

                    <h1>Checkout</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                        </li>
                    </ul>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{--<label for="firstname">Firstname</label>--}}
                                    {{--<input type="text" class="form-control" id="firstname">--}}
                                    {!! Form::label('firstname','First Name') !!}
                                    {!! Form::text('firstname',null,['class'=>'form-control']) !!}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('lastname','Last Name') !!}
                                    {!! Form::text('lastname',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('company','Company') !!}
                                    {!! Form::text('company',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('street','Street') !!}
                                    {!! Form::text('street',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('city','City') !!}
                                    {!! Form::text('city',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('zip','Zip') !!}
                                    {!! Form::text('zip',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('state','State') !!}
                                    {!! Form::text('state',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    {!! Form::label('country','Country') !!}
                                    {!! Form::text('country',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('telephone','Telephone') !!}
                                    {!! Form::text('telephone',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('email','Email') !!}
                                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{url('cart')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                    {{--</form>--}}

                    {!! Form::close() !!}
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$10</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$20</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>${{$sub}}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

    <!-- *** FOOTER ***
_________________________________________________________ -->
</div>
    @stop