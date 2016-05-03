@extends('layout.layout')
@section('content')


        <div class="row">
            <p align="center">Paint Buddy</p>
            <a href="#"><p align="center" style="color:#16a791;"> Click here to see if we deliver to you. </p></a>
            <p align="center">We deliver your desired art yearning to your doorstep.</p>
        </div>

    <div class="row">
        <div class="col-sm-4">
            <h3 align="center">Painting</h3>
            <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>


        <div class="col-sm-4">
            <h3 align="center">Mosaic</h3>

            <p align="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris. </p>
        </div>




        <div class="col-sm-4">

            <h3 align="center">Scupture</h3>
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