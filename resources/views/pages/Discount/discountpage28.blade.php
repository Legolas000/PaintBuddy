@extends('layout.layout2')
@section('content')

<div class="form-group">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-2 col-md-offset-0">
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <div class="panel panel-primary sidebar-menu">
                        <div class="panel-heading">
                            <h3 class="panel-title" style="text-align:center"> Tasks </h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="/discount"> Assign New <br/> Discounts</a>
                                </li>
                                <li>
                                    <a href="assignpromotion"> Assign New<br/> Promotions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="panel panel-default, col-md-10 col-md-offset-0 ">
                <div class="col-md-6 col-md-offset-0">
                    {{ Form::open(array('url'=>'addDiscount' ,'method' => 'PUT')) }}
                        <div class="form-group" class="col-md-6">
                            <div class="form-group col-md-offset-1">
                                <p class="help-block" style="font-size:30px">
                                    <b>ASSIGN DISCOUNT </b>
                                </p>
                                <hr/>
                            </div>        
                            @if($oldDiscount >= 1)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Notice..!!!", "A discount is expiered on today");
                                </script>
                            @endif
                                <label for="InputItem">
                                     Item Category
                                </label>
                            </div>
                            <select name="itmcat" class="form-control">
                            @foreach($item as $user) 
                            <option>{{ $user->itName }}</option>
                            @endforeach
                            </select> 
                            <div>
                                <br/>
                            </div>
                             <div class="form-group" class="col-xs-3">
                                <label for="InputItem">
                                    Discount Type
                                </label>
                            <div class="form-group">
                                <select name="disctyp"  class="form-control">
                                    <option> Seasonal discount </option>
                                    <option> Festival discount </option>
                                    <option> New year discount</option>
                                    <option> Year end discount</option>
                                    <option> Other types </option>
                                </select>
                            </div></div>
                            <div>
                                <br/>
                            </div>
                            <div class="form-group" class="col-xs-3">
                                <label for="InputPercentage">
                                    Percentage 
                                </label>
                                <input type="text" name="Percentage" class="form-control" placeholder="%" id="InputPrice"/> <!-- required pattern="\d{1,2}"/> -->
                               <P style="color:red">{{$errors->first('Percentage')}} </P>
                            </div>
                            <div >
                                <label for="startDate"> 
                                    Start Date 
                                </label>
                            </div>
                            <div class='input-group date' id="dp1">
                              <input type="date" name="start_date" class="form-control"/>
                              <P style="color:red">{{$errors->first('start_date')}}</P>
                            </div>
                            <div><br/></div>
                            <div>
                                <label for="endDate" >
                                    End Date
                                </label>
                            </div>
                            <div class='input-group date'  id="dp2">
                                <input type="date" name="end_date" class="form-control"/>
                                <P style="color:red">{{$errors->first('end_date')}}</P>
                            </div>
                            <div class="form-group" class="col-md-6">
                            <div><br/>
                                <button type="submit" class="btn btn-primary"  class="icon-search icon-white"  >Add Discount</button><br/> 
                                @if($id == 0)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Sorry..!!!", "You have already added a discount for this item", "error");
                                </script>
                                @endif
                                @if($td == 1)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Success..!!!", "You have successfuly added a discount", "success");
                                </script>
                                @endif

                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <form role="form" action="/viewDiscount" method="POST">   
                    <div class="form-group col-md-offset-0" class="col-md-6">
                        <div class="col-md-7">
                            <button class="btn btn-primary" >View Discount </button>   
                        </div> <br/>    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                            <br/>
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr class="info">
                                        <th class="col-md-2 text-center">
                                            Discount ID
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Item Name
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Discount Type
                                        </th>
                                        <th class="col-md-1 text-center">
                                            Percentage
                                        </th>                                            
                                        <th class="col-md-2 text-center">
                                            Discount Price
                                        </th>
                                        <th class="col-md-2 text-center">
                                            Start Date
                                        </th>
                                        <th class="col-md-2 text-center">
                                            End Date
                                        </th>  
                                    </tr>   
                                </thead>
                                    <tbody>
                                        <?php 
                                            if (isset($table2)) {
                                               foreach( $table2 as $row ){
                                        ?>
                                        <tr class="success">
                                            <td><?php echo $row->did; ?>  </td>
                                            <td><?php echo $row->iname; ?> </td>
                                            <td><?php echo $row->dtype; ?></td>
                                            <td><?php echo $row->ipersentage; ?></td>
                                            <td><?php echo $row->iprice; ?></td>
                                            <td><?php echo $row->sdate; ?></td>
                                            <td><?php echo $row->edate; ?></td>
                                            <!--  <td><a href="testmesage" class="btn btn-primary"> MESAGE</button> </td>-->            
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                                @if(is_null($values))
                                    <label style="color:red">
                                        <b><I>  No discounts available...!!!</I></b>
                                    </label>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>


function testalert(){
    sweetAlert("Oooops....", "Wel come bro", "success");
}
</script



@stop