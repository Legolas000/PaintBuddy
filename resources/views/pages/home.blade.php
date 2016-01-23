@extends('layout.layout')
@section('content')

    <div class="row">
        <div class="col-sm-4">
            <h3 align="center">Lorem ipsum</h3>
            <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>


        <div class="col-sm-4">
            <h3 align="center">Lorem ipsum</h3>
            <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>




        <div class="col-sm-4">
            <h3 align="center">Lorem ipsum</h3>
            <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>



    </div>

    <?php $sArr = sizeof($imDets);?>
        <div class="row">
        @for ($j = 0; $j < $sArr; $j++)
                    <div class="col-sm-4">
                        <img src="images/tempEng/{!! $imDets[$j]['imPath'] !!}" width="330px" height="330px"/>
                        <h4 style="color:#16a791;" align="center">{!! $imDets[$j]['itName'] !!}</h4>
                        <h5 align="center">{!! $imDets[$j]['itDescrip'] !!}</h5>
                        <hr>
                    </div>
        @endfor
        </div>
    @stop