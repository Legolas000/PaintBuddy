@extends('layout.layout')

@section('content')

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-13">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="/ArtMainOrders">Order Management</a>
                        </li>
                        <li>
                            <a href="/ArtMainCal">Calendar</a>
                        </li>
                    </ul>
                </div>
            </div>



        </div>
        <div class="tab-content">
          @yield('ArtContent')
        </div>
    </div>


@stop