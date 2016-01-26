@extends('pages.Artist.artMainTemp')

@section('ArtContent')
    {{--<div class="about-section">--}}
        {{--<div class="text-content">--}}
            {{--<div class="span7 offset1">--}}
                {{--@if(Session::has('success'))--}}
                    {{--<div class="alert-box success">--}}
                        {{--<h2>{!! Session::get('success') !!}</h2>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<div class="secure">Upload form</div>--}}
                {{--{!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}--}}
                {{--<div class="control-group">--}}
                    {{--<div class="controls">--}}
                        {{--{!! Form::file('image') !!}--}}
                        {{--<p class="errors">{!!$errors->first('image')!!}</p>--}}
                        {{--@if(Session::has('error'))--}}
                            {{--<p class="errors">{!! Session::get('error') !!}</p>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div id="success"> </div>--}}
                {{--{!! Form::submit('Submit', array('class'=>'send-btn')) !!}--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }


    </style>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> {{ Session::get('message', '') }}
        </div>
    @endif

    {{--@if (!empty($success))--}}
        {{--{{ $success }}--}}
    {{--@endif--}}
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">


        <!-- Modal -->
        {{--{!! Form::open(array('url'=>'aitem/add','method'=>'POST', 'files'=>true)) !!}--}}
        <div class="modal fade" id="itemModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                        <h4 class="modal-title">Add Items</h4>
                    </div>
                    <div class="modal-body">


                        {{--<form role="form">--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="iName">Item Name</label>--}}
                        {{--<input type="text" class="form-control" id="iName" name="iName">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="iDescrip">Description:</label>--}}
                        {{--<textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="cFile">Choose File</label>--}}
                        {{--<span class="btn btn-default btn-file">Browse <input type="file"></span>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<button class="btn btn-default send-btn" style="align-self: center">Add</button>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--<div>--}}
                        {{--</div>--}}

                        @if(Session::has('success'))
                            <div class="alert-box success">
                                <h2>{!! Session::get('success') !!}</h2>
                            </div>
                        @endif
                        {!! Form::open(array( 'url' => 'aitem/add','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                        @if(Session::has('error'))
                            {{--<p class="errors">{!!$errors->first('image')!!}</p>--}}
                            {{----}}
                            <p class="errors">{!! Session::get('error') !!}</p>
                        @endif

                        <div class="form-group">
                            @if(isset($cats))
                                {{--{!! Form::Label('catID', 'Category:') !!}--}}
                                {{--{!! Form::select('catID', $categories, null, ['class' => 'form-control']) !!}--}}
                                {!! Form::Label('catLabel', 'Category:') !!}
                                {!! Form::select('cat_Name', $cats, null, ['class' => 'form-control']) !!}
                            @endif

                        </div>
                        <div class="form-group">
                            {{--{!! Form::label('Product Name') !!}--}}
                            {{--{!! Form::text('name', null, array('placeholder'=>'Chess Board')) !!}--}}
                            <label for="iName">Item Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">


                        </div>

                        <div class="form-group">
                            {{--{!! Form::label('Product SKU') !!}--}}
                            {{--{!! Form::text('sku', null, array('placeholder'=>'1234')) !!}--}}
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            {{--{!! Form::label('Product Image') !!}--}}
                            {{--{!! Form::file('image', null) !!}--}}
                            <label for="cFile">Choose File</label>
                            <span class="btn btn-default btn-file">Browse {!! Form::file('image', null) !!}</span>

                        </div>
                        <div class="form-group">
                            <label for="iSize">Item Size:</label>
                            <input type="text" class="form-control" id="iSize" name="iSize">
                        </div>
                        <div class="form-group">
                            <label for="iPrice">Item Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            {{--{!! Form::submit('Create Product!') !!}--}}
                            <button type="submit" class="btn btn-info btn-lg send-btn center-block" style="align-self: center">Add</button>
                        </div>
                        {!! Form::close() !!}
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        </div>
    {{--{!! Form::close() !!}--}}
    {{--</div>--}}

    {{--Table Informations--}}

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="col-md-2 text-center">
                Category
            </th>
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
                Price
            </th>
            <th class="col-md-2 text-center">
                Update
            </th>

        </tr>
        </thead>
        <tbody>

        @foreach($items as $it)
            <tr>
                <td class="col-md-2 text-center">
                    {!! $it->catRef !!}
                </td>
                <td class="col-md-2 text-center">
                    {!! $it->itName !!}
                </td>
                <td class="col-md-2 text-center">
                    {!! $it->itDescrip !!}
                </td>
                <td class="col-md-2 text-center">
                    {!! $it->itSize !!}
                </td>
                <td class="col-md-2 text-center">
                    {!! $it->price !!}
                </td>
                <td class="col-md-1 text-center">
                <a href="/chIteStat/{!! $it->itID !!}" class="btn btn-danger btn-block" role="button">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Trigger the modal with a button -->
    <div class="col-lg-12">
        <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#itemModal">Add Item</button>
    </div>
</div>


@stop