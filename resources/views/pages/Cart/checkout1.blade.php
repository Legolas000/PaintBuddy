@extends('layout.layout')
@section('content')

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Checkout - Address </li>
                </ul>
            </div>

            <div class="col-md-9" id="checkout">

                <div class="box">

                    {!! Form::open(['url'=>'checkoutCreate']) !!}

                    <h1>Checkout</h1>
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="c"><i class="fa fa-map-marker"></i><br>Address</a>
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

                                    {!! Form::label('fullname','Full Name') !!}
                                    {!! Form::text('fullname',null,['class'=>'form-control']) !!}

                                      @if ($errors->has('fullname')) <p class="text-danger">{{ $errors->first('fullname') }}</p> @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    {!! Form::label('city','City') !!}
                                    <select class="form-control" id="city" name="city">

                                        <option value="" selected>Choose One</option>
                                        <option value="" disabled>If you can't find your city, pick a city within 10km to your city.</option>
                                        <option id="Ahangama-LM_N" value="Ahangama" >Ahangama</option>
                                        <option id="Ahungalla-LM_N" value="Ahungalla" >Ahungalla</option>
                                        <option id="Akurana-LM_N" value="Akurana" >Akurana</option>
                                        <option id="Akuressa-LM_N" value="Akuressa" >Akuressa</option>
                                        <option id="Alawwa-LM_N" value="Alawwa" >Alawwa</option>
                                        <option id="Aluthgama-LM_N" value="Aluthgama" >Aluthgama</option>
                                        <option id="Ambalangoda-LM_N" value="Ambalangoda" >Ambalangoda</option>
                                        <option id="Ambanpola-LM_N" value="Ambanpola" >Ambanpola</option>
                                        <option id="Ambepussa-LM_N" value="Ambepussa" >Ambepussa</option>
                                        <option id="Ampara-LM_N" value="Ampara" >Ampara</option>
                                        <option id="Anuradhapura-LM_N" value="Anuradhapura" >Anuradhapura</option>
                                        <option id="Attanagalla-LM_N" value="Attanagalla" >Attanagalla</option>
                                        <option id="Attidiya-LM_Y" value="Attidiya" >Attidiya</option>
                                        <option id="Aturugiriya-LM_Y" value="Aturugiriya" >Aturugiriya</option>
                                        <option id="Avissawella-LM_N" value="Avissawella" >Avissawella</option>
                                        <option id="Badulla-LM_N" value="Badulla" >Badulla</option>
                                        <option id="Balangoda-LM_N" value="Balangoda" >Balangoda</option>
                                        <option id="Bandaragama-LM_N" value="Bandaragama" >Bandaragama</option>
                                        <option id="Bangadeniya-LM_N" value="Bangadeniya" >Bangadeniya</option>
                                        <option id="Battaluoya-LM_N" value="Battaluoya" >Battaluoya</option>
                                        <option id="Battaramulla-LM_Y" value="Battaramulla" >Battaramulla</option>
                                        <option id="Batticaloa-LM_N" value="Batticaloa" >Batticaloa</option>
                                        <option id="Benthota-LM_N" value="Benthota" >Benthota</option>
                                        <option id="Beruwala-LM_N" value="Beruwala" >Beruwala</option>
                                        <option id="Boralesgamuwa-LM_Y" value="Boralesgamuwa" >Boralesgamuwa</option>
                                        <option id="Bulathsinghala-LM_N" value="Bulathsinghala" >Bulathsinghala</option>
                                        <option id="Chillaw-LM_N" value="Chillaw" >Chillaw</option>
                                        <option id="Colombo 01-LM_Y" value="Colombo 01" >Colombo 01 - ( Fort )</option>
                                        <option id="Colombo 02-LM_Y" value="Colombo 02" >Colombo 02 - ( Union Place )</option>
                                        <option id="Colombo 03-LM_Y" value="Colombo 03" >Colombo 03 - ( Kollupitiya )</option>
                                        <option id="Colombo 04-LM_Y" value="Colombo 04" >Colombo 04 - ( Bambalapitiya )</option>
                                        <option id="Colombo 05-LM_Y" value="Colombo 05" >Colombo 05 - ( Havelock / Kirulapana )</option>
                                        <option id="Colombo 06-LM_Y" value="Colombo 06" >Colombo 06 - ( Wellawatta )</option>
                                        <option id="Colombo 07-LM_Y" value="Colombo 07" >Colombo 07 - ( Cinnamon Gardens )</option>
                                        <option id="Colombo 08-LM_Y" value="Colombo 08" >Colombo 08 - ( Borella )</option>
                                        <option id="Colombo 09-LM_Y" value="Colombo 09" >Colombo 09 - ( Dematagoda )</option>
                                        <option id="Colombo 10-LM_Y" value="Colombo 10" >Colombo 10 - ( Maradana )</option>
                                        <option id="Colombo 11-LM_Y" value="Colombo 11" >Colombo 11 - ( Pettah )</option>
                                        <option id="Colombo 12-LM_Y" value="Colombo 12" >Colombo 12 - ( Hultsdorf )</option>
                                        <option id="Colombo 13-LM_Y" value="Colombo 13" >Colombo 13 - ( Kotahena )</option>
                                        <option id="Colombo 14-LM_Y" value="Colombo 14" >Colombo 14 - ( Grandpass )</option>
                                        <option id="Colombo 15-LM_Y" value="Colombo 15" >Colombo 15 - ( Mattakuliya )</option>
                                        <option id="Dambulla-LM_N" value="Dambulla" >Dambulla</option>
                                        <option id="Dankotuwa-LM_N" value="Dankotuwa" >Dankotuwa</option>
                                        <option id="Dehiwala-LM_Y" value="Dehiwala" >Dehiwala</option>
                                        <option id="Delkanda-LM_Y" value="Delkanda" >Delkanda</option>
                                        <option id="Deniyaya-LM_N" value="Deniyaya" >Deniyaya</option>
                                        <option id="Dharga Town-LM_N" value="Dharga Town" >Dharga Town</option>
                                        <option id="Dodanduwa-LM_N" value="Dodanduwa" >Dodanduwa</option>
                                        <option id="Dompe-LM_N" value="Dompe" >Dompe</option>
                                        <option id="Dunagaha-LM_N" value="Dunagaha" >Dunagaha</option>
                                        <option id="Dvulapitiya-LM_N" value="Dvulapitiya" >Dvulapitiya</option>
                                        <option id="Eheliyagoda-LM_N" value="Eheliyagoda" >Eheliyagoda</option>
                                        <option id="Ekala-LM_N" value="Ekala" >Ekala</option>
                                        <option id="Elpitiya-LM_N" value="Elpitiya" >Elpitiya</option>
                                        <option id="Embilipitiya-LM_N" value="Embilipitiya" >Embilipitiya</option>
                                        <option id="Galle-LM_N" value="Galle" >Galle</option>
                                        <option id="Gampaha-LM_N" value="Gampaha" >Gampaha</option>
                                        <option id="Gampola-LM_N" value="Gampola" >Gampola</option>
                                        <option id="Gangodawila-LM_Y" value="Gangodawila" >Gangodawila</option>
                                        <option id="Gatahetta-LM_N" value="Gatahetta" >Gatahetta</option>
                                        <option id="Gelioya-LM_N" value="Gelioya" >Gelioya</option>
                                        <option id="Ginthota-LM_N" value="Ginthota" >Ginthota</option>
                                        <option id="Godagama-LM_N" value="Godagama" >Godagama</option>
                                        <option id="Gonapeenuwala-LM_N" value="Gonapeenuwala" >Gonapeenuwala</option>
                                        <option id="Hambanthota-LM_N" value="Hambanthota" >Hambanthota</option>
                                        <option id="Hanwella-LM_N" value="Hanwella" >Hanwella</option>
                                        <option id="Hatton-LM_N" value="Hatton" >Hatton</option>
                                        <option id="Henegama-LM_N" value="Henegama" >Henegama</option>
                                        <option id="Hikkaduwa-LM_N" value="Hikkaduwa" >Hikkaduwa</option>
                                        <option id="Homagama-LM_Y" value="Homagama" >Homagama</option>
                                        <option id="Horana-LM_N" value="Horana" >Horana</option>
                                        <option id="Ibbagamuwa-LM_N" value="Ibbagamuwa" >Ibbagamuwa</option>
                                        <option id="Ingiriya-LM_N" value="Ingiriya" >Ingiriya</option>
                                        <option id="Ja-Ela-LM_N" value="Ja-Ela" >Ja-Ela</option>
                                        <option id="Jaffna-LM_N" value="Jaffna" >Jaffna</option>
                                        <option id="Kadawatha-LM_Y" value="Kadawatha" >Kadawatha</option>
                                        <option id="Kadugannawa-LM_N" value="Kadugannawa" >Kadugannawa</option>
                                        <option id="Kaduwala-LM_N" value="Kaduwala" >Kaduwala</option>
                                        <option id="Kalawana-LM_N" value="Kalawana" >Kalawana</option>
                                        <option id="Kalubowila-LM_Y" value="Kalubowila" >Kalubowila</option>
                                        <option id="Kaluthara-LM_N" value="Kaluthara" >Kaluthara</option>
                                        <option id="Kandana-LM_N" value="Kandana" >Kandana</option>
                                        <option id="Kandy-LM_N" value="Kandy" >Kandy</option>
                                        <option id="Katana-LM_N" value="Katana" >Katana</option>
                                        <option id="Kataragama-LM_N" value="Kataragama" >Kataragama</option>
                                        <option id="Katugasthota-LM_N" value="Katugasthota" >Katugasthota</option>
                                        <option id="Katunayaka-LM_N" value="Katunayaka" >Katunayaka</option>
                                        <option id="Katuneriya-LM_N" value="Katuneriya" >Katuneriya</option>
                                        <option id="Kegalle-LM_N" value="Kegalle" >Kegalle</option>
                                        <option id="Kelaniya-LM_Y" value="Kelaniya" >Kelaniya</option>
                                        <option id="Kesbewa-LM_Y" value="Kesbewa" >Kesbewa</option>
                                        <option id="Kiribathgoda-LM_Y" value="Kiribathgoda" >Kiribathgoda</option>
                                        <option id="Kiriella-LM_N" value="Kiriella" >Kiriella</option>
                                        <option id="Kochchikade-LM_N" value="Kochchikade" >Kochchikade</option>
                                        <option id="Kohuwala-LM_Y" value="Kohuwala" >Kohuwala</option>
                                        <option id="Kolonnawa-LM_Y" value="Kolonnawa" >Kolonnawa</option>
                                        <option id="Kosgama-LM_N" value="Kosgama" >Kosgama</option>
                                        <option id="Kotikawatta-LM_Y" value="Kotikawatta" >Kotikawatta</option>
                                        <option id="Kottawa-LM_Y" value="Kottawa" >Kottawa</option>
                                        <option id="Kotte-LM_Y" value="Kotte" >Kotte</option>
                                        <option id="Kundasale-LM_N" value="Kundasale" >Kundasale</option>
                                        <option id="Kurunegala-LM_N" value="Kurunegala" >Kurunegala</option>
                                        <option id="Kuruwita-LM_N" value="Kuruwita" >Kuruwita</option>
                                        <option id="Lunuwila-LM_N" value="Lunuwila" >Lunuwila</option>
                                        <option id="Madagalla-LM_N" value="Madagalla" >Madagalla</option>
                                        <option id="Madawala-LM_N" value="Madawala" >Madawala</option>
                                        <option id="Madurankuliya-LM_N" value="Madurankuliya" >Madurankuliya</option>
                                        <option id="Maharagama-LM_Y" value="Maharagama" >Maharagama</option>
                                        <option id="Mahawewa-LM_N" value="Mahawewa" >Mahawewa</option>
                                        <option id="Malambe-LM_Y" value="Malambe" >Malambe</option>
                                        <option id="Mallawapitiya-LM_N" value="Mallawapitiya" >Mallawapitiya</option>
                                        <option id="Malwana-LM_N" value="Malwana" >Malwana</option>
                                        <option id="Mannar-LM_N" value="Mannar" >Mannar</option>
                                        <option id="Marandagahamula-LM_N" value="Marandagahamula" >Marandagahamula</option>
                                        <option id="Marawila-LM_N" value="Marawila" >Marawila</option>
                                        <option id="Matale-LM_N" value="Matale" >Matale</option>
                                        <option id="Matara-LM_N" value="Matara" >Matara</option>
                                        <option id="Mathugama-LM_N" value="Mathugama" >Mathugama</option>
                                        <option id="Mawanella-LM_N" value="Mawanella" >Mawanella</option>
                                        <option id="Minuwangoda-LM_N" value="Minuwangoda" >Minuwangoda</option>
                                        <option id="Mirissa-LM_N" value="Mirissa" >Mirissa</option>
                                        <option id="Monaragala-LM_N" value="Monaragala" >Monaragala</option>
                                        <option id="Moratuwa-LM_Y" value="Moratuwa" >Moratuwa</option>
                                        <option id="Mount Lavinia-LM_Y" value="Mount Lavinia" >Mount Lavinia</option>
                                        <option id="Mundala-LM_N" value="Mundala" >Mundala</option>
                                        <option id="Narahempita-LM_Y" value="Narahempita" >Narahempita</option>
                                        <option id="Nattandiya-LM_N" value="Nattandiya" >Nattandiya</option>
                                        <option id="Nawala-LM_Y" value="Nawala" >Nawala</option>
                                        <option id="Nawalapitiya-LM_N" value="Nawalapitiya" >Nawalapitiya</option>
                                        <option id="Negombo-LM_N" value="Negombo" >Negombo</option>
                                        <option id="Nelumdeniya-LM_N" value="Nelumdeniya" >Nelumdeniya</option>
                                        <option id="Nikaweratiya-LM_N" value="Nikaweratiya" >Nikaweratiya</option>
                                        <option id="Nittambuwa-LM_N" value="Nittambuwa" >Nittambuwa</option>
                                        <option id="Nugegoda-LM_Y" value="Nugegoda" >Nugegoda</option>
                                        <option id="Nuwara Eliya-LM_N" value="Nuwara Eliya" >Nuwara Eliya</option>
                                        <option id="Padukka-LM_N" value="Padukka" >Padukka</option>
                                        <option id="Palavee-LM_N" value="Palavee" >Palavee</option>
                                        <option id="Pamunugama-LM_N" value="Pamunugama" >Pamunugama</option>
                                        <option id="Panadura-LM_Y" value="Panadura" >Panadura</option>
                                        <option id="Pannipitiya-LM_Y" value="Pannipitiya" >Pannipitiya</option>
                                        <option id="Pasyala-LM_N" value="Pasyala" >Pasyala</option>
                                        <option id="Payagala-LM_N" value="Payagala" >Payagala</option>
                                        <option id="Peliyagoda-LM_Y" value="Peliyagoda" >Peliyagoda</option>
                                        <option id="Pelmadulla-LM_N" value="Pelmadulla" >Pelmadulla</option>
                                        <option id="Peradeniya-LM_N" value="Peradeniya" >Peradeniya</option>
                                        <option id="Piliyandala-LM_Y" value="Piliyandala" >Piliyandala</option>
                                        <option id="Polgahawela-LM_N" value="Polgahawela" >Polgahawela</option>
                                        <option id="Polgasovita-LM_Y" value="Polgasovita" >Polgasovita</option>
                                        <option id="Polhengoda-LM_Y" value="Polhengoda" >Polhengoda</option>
                                        <option id="Polonnaruwa-LM_N" value="Polonnaruwa" >Polonnaruwa</option>
                                        <option id="Pugoda-LM_N" value="Pugoda" >Pugoda</option>
                                        <option id="Puttalam-LM_N" value="Puttalam" >Puttalam</option>
                                        <option id="Radavana-LM_N" value="Radavana" >Radavana</option>
                                        <option id="Raddolugama-LM_N" value="Raddolugama" >Raddolugama</option>
                                        <option id="Ragama-LM_N" value="Ragama" >Ragama</option>
                                        <option id="Rajagiriya-LM_Y" value="Rajagiriya" >Rajagiriya</option>
                                        <option id="Rambukkana-LM_N" value="Rambukkana" >Rambukkana</option>
                                        <option id="Rathnapura-LM_N" value="Rathnapura" >Rathnapura</option>
                                        <option id="Ratmalana-LM_Y" value="Ratmalana" >Ratmalana</option>
                                        <option id="Seeduwa-LM_N" value="Seeduwa" >Seeduwa</option>
                                        <option id="Sooriyawewa-LM_N" value="Sooriyawewa" >Sooriyawewa</option>
                                        <option id="Thangalle-LM_N" value="Thangalle" >Thangalle</option>
                                        <option id="Thotagama-LM_N" value="Thotagama" >Thotagama</option>
                                        <option id="Trincomalee-LM_N" value="Trincomalee" >Trincomalee</option>
                                        <option id="Unawatuna-LM_N" value="Unawatuna" >Unawatuna</option>
                                        <option id="Urapola-LM_N" value="Urapola" >Urapola</option>
                                        <option id="Vavuniya-LM_N" value="Vavuniya" >Vavuniya</option>
                                        <option id="Veyangoda-LM_N" value="Veyangoda" >Veyangoda</option>
                                        <option id="Wadduwa-LM_N" value="Wadduwa" >Wadduwa</option>
                                        <option id="Warakapola-LM_N" value="Warakapola" >Warakapola</option>
                                        <option id="Waskaduwa-LM_N" value="Waskaduwa" >Waskaduwa</option>
                                        <option id="Wattala-LM_Y" value="Wattala" >Wattala</option>
                                        <option id="Weligama-LM_N" value="Weligama" >Weligama</option>
                                        <option id="Weliveriya-LM_N" value="Weliveriya" >Weliveriya</option>
                                        <option id="Wennappuwa-LM_N" value="Wennappuwa" >Wennappuwa</option>
                                        <option id="Yakkala-LM_N" value="Yakkala" >Yakkala</option>
                                        <option id="Yatiyanthota-LM_N" value="Yatiyanthota" >Yatiyanthota</option>

                                    </select>

                                    </select>

                                      @if ($errors->has('city')) <p class="text-danger">{{ $errors->first('city') }}</p>
                                      @endif

                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    {!! Form::label('locationtype','Location Type') !!}
                                    <select class="form-control" id="locationtype" name="locationtype">

                                        <option selected="" value="">Choose One</option>
                                        <option value="House or Residence">House or Residence</option>
                                        <option value="Apartment/Flat">Apartment or Flat</option>
                                        <option value="Office">Office</option>
                                        <option value="Hospital">Hospital</option>
                                        <option value="School">School</option>
                                        <option value="Funeral Home">Funeral Home</option>
                                        <option value="Wedding Reception">Wedding Reception</option>
                                        <option value="Other">Other (Including Hotels)</option>

                                    </select>

                                       @if ($errors->has('locationtype')) <p class="text-danger">{{ $errors->first('locationtype') }}</p>
                                       @endif

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                        {!! Form::label('phoneno','Phone #:') !!}
                                        {!! Form::text('phoneno',null,['class'=>'form-control'])  !!}

                                        @if ($errors->has('phoneno')) <p class="text-danger">{{ $errors->first('phoneno') }}</p>
                                        @endif

                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-6">

                                    <div class="form-group">

                                        {!! Form::label('address','Address Line 1') !!}
                                        {!! Form::text('address1',null,['class'=>'form-control'])  !!}

                                        @if ($errors->has('address1')) <p class="text-danger">{{ $errors->first('address1') }}</p>
                                        @endif

                                    </div>
                                <div class="form-group">

                                        {!! Form::label('address','Address Line 2') !!}
                                        {!! Form::text('address2',null,['class'=>'form-control'])  !!}

                                        @if ($errors->has('address2')) <p class="text-danger">{{ $errors->first('address2') }}</p>
                                        @endif

                                </div>


                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">

                                    {!! Form::label('deliverydate','Delivery Date') !!}
                                    <input type="date"  class="form-control" id="datepicker" name="delivery_date" placeholder="Select the date" />

                                         @if ($errors->has('delivery_date')) <p class="text-danger">{{ $errors->first('delivery_date') }}</p>
                                         @endif

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">



                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                </div>

                            </div>

                          <div class="row">
                           </div>
                            <div class="col-sm-6">
                                <div class="form-group">

                                    {!! Form::label('email','Email') !!}
                                    {!! Form::text('email',null,['class'=>'form-control']) !!}

                                         @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p>
                                         @endif
                                </div>

                     </div>
                    </div>

                    </div>


                    <div class="box-footer">
                        <div class="pull-left">
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
                    <p class="text-muted"><strong class="text-primary">Delivery is FREE </strong>of charge to Islanwide.You may go for EXPRESS delivery as well , details will be shown on next page</p>


                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>

                                <?php
//                                        session_start();
                                        //session_destroy();
                                        echo "<th>"."LKR ".$_SESSION["subtotal"]."</th>";
                                ?>

                            </tr>
                            <tr>
                                <td>Total Quantity</td>

                                <?php
                                         echo "<th>"."QTY ".  $_SESSION["quantities"]."</th>";
                                ?>



                            </tr>


                            <tr>
                                <td>Delivery charges</td>

                                <?php
                                        echo "<th>"."LKR ".$_SESSION["del"]."</th>";
                                ?>

                            </tr>


                            </tr>

                            <tr>
                                <td>Total</td>
                                <?php
                                        echo "<th>"."LKR ".$_SESSION["subtotal"]."</th>";
                                ?>

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