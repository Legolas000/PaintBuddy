@extends('pages.Artist.artMainTemp')

@section('ArtContent')

    {{--Style for browse file bootstrap style--}}
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
    <br/>
    <div class="row">
        <div clas="col-md-12">
            <button type="button" onclick="document.location.href='{{action('Artist\ArtsTempController@loadDesDets')}}'" class="btn btn-success col-md-6" role="button">Designs</button>
            <button type="button" onclick="document.location.href='{{action('Artist\ArtsTempController@loadBacDets')}}'" class="btn btn-success col-md-6" role="button">Backgrounds</button>
         </div>
    </div>


    {{--Update Price Modal below--}}
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="pricUpModalTemp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Price</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array( 'url' => '/upTempPrice','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}

                        <div class="form-group">
                            <label for="iID">ID</label>
                            <input type="text" class="form-control" id="iID" name="iID" readonly>
                        </div>

                        <div class="form-group">
                            <label for="iName">Name</label>
                            <input type="text" class="form-control" id="iName" name="iName" readonly>
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip" data-btn="btn1"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Item Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            <button type="submit" id = "upPBtn" class="btn btn-danger send-btn center-block" disabled = "" style="align-self: center">Update</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{--Add item Modal below--}}
    {{--For adding to backgrounds--}}
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="BKitemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Backgrounds</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array( 'url' => 'aTempBac/add','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        {{--<div class="form-group">--}}
                            {{--@if(isset($cats))--}}
                                {{--{!! Form::Label('catLabel', 'Category:') !!}--}}
                                {{--{!! Form::select('cat_Name', $cats, null, ['class' => 'form-control']) !!}--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label for="iName">Background Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for Front</label>
                            <span class="btn btn-default btn-file">Browse {!! Form::file('fileFront', null) !!}</span>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for Back </label>
                            <span class="btn btn-default btn-file">Browse {!! Form::file('fileBack', null) !!}</span>
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Background Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger send-btn center-block" style="align-self: center">Add</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--For adding to designs--}}
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="DEitemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Designs</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array( 'url' => '/aTempDes/add','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                        <div class="form-group">
                            @if(isset($cats))
                                {!! Form::Label('catLabel', 'Category:') !!}
                                {!! Form::select('cat_Name', $cats, null, ['class' => 'form-control']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="iName">Design Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for design</label>
                            <span class="btn btn-default btn-file">Browse {!! Form::file('fileDesign', null) !!}</span>
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Design Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger send-btn center-block" style="align-self: center">Add</button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <br/>

    {{--Table Informations--}}
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover" id="aTempTab">
                <thead>
                <tr>
                    <th class="col-md-2 text-center">
                        ID
                    </th>
                    <?php $url = $_SERVER['REQUEST_URI'];?>
                    @if($url == '/aTempDes')
                        <th class="col-md-2 text-center">
                            FileDesign
                        </th>
                    @elseif($url == '/aTempBac')
                        <th class="col-md-2 text-center">
                            FileFront
                        </th>
                        <th class="col-md-2 text-center">
                            FileBack
                        </th>
                    @endif
                    <th class="col-md-2 text-center">
                        Name
                    </th>
                    <th class="col-md-2 text-center">
                        Description
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
                @if(isset($items))
                    @foreach($items as $it)
                        <tr>
                            <td class="col-md-2 text-center teOrder">
                                {!! $it->id !!}
                            </td>
                            @if($url == '/aTempDes')
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Designs/{{$it->fileDesign}}"><img src="img/cusTempEng/Designs/{{$it->fileDesign}}" alt="" class="img-responsive" width="100" height="100"></a>
                                </td>
                            @elseif($url == '/aTempBac')
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Background/{{$it->fileFront}}"><img src="img/cusTempEng/Background/{{$it->fileFront}}" alt="" class="img-responsive" width="300" height="200"></a>
                                </td>
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Background/{{$it->fileBack}}"><img src="img/cusTempEng/Background/{{$it->fileBack}}" alt="" class="img-responsive" width="300" height="200"></a>
                                </td>
                            @endif
                            <td class="col-md-2 text-center teOrder">
                                {!! $it->name !!}
                            </td>
                            <td class="col-md-2 text-center teOrder">
                                {!! $it->description !!}
                            </td>
                            <td class="col-md-2 text-center teOrder">
                                {!! $it->price !!}
                            </td>
                            <td class="col-md-1 text-center">
                                <a href="javascript:void(0);" class="btn btn-danger btn-block" role="button" onclick="return confirmRemTemp({!! $it->id !!});">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <!-- Trigger the modal for adding templates with a button -->
            <div class="col-lg-12">
                <?php $url = $_SERVER['REQUEST_URI'];?>
                @if($url == '/aTempDes')
                    <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#DEitemModal">Add Item</button>
                @elseif($url == '/aTempBac')
                    <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#BKitemModal">Add Item</button>
                @endif
            </div>
        </div>
    </div>


@stop