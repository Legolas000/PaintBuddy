@extends('layout.layout2')
@section('content')

<div class="form-group">
    <div class="container-fluid">
        <div class="row">
            <div class="panel panel-default, col-md-10 col-md-offset-0 ">
                <div class="col-md-8">
                    <form role="form" action="regpromotion" method="POST">
                        <div class="form-group" class="col-md-8">
                            <div class="form-group">
                                <p class="help-block" style="font-size:30px">
                                    <b>Registry Form for Promotion</b>
                                </p>
                                <p class="help-block" style="font-size:20px">
                                    Fill in all the fields to submit your entry...!!!
                                </p><br/>
                            </div>
                            <div>
                                <label for="Inputfname">
                                    First Name 
                                </label>
                            </div>
                            <input type="text" name="first_name" class="form-control" id="Inputfname"/>
                            <P style="color:red">{{$errors->first('first_name')}}</P><br/>
                            <div>
                                <label for="Inputlname">
                                    Last Name 
                                </label>
                            </div>    
                            <input type="text" name="last_name" class="form-control" id="Inputlname" />
                            <P style="color:red">{{$errors->first('last_name')}}</P><br/>
                            <div>
                                <label for="Inputfname">
                                    Email
                                </label>
                            </div>                                
                            <input type="email" name="email" class="form-control" id="Inputemail1"/>
                            <P style="color:red">{{$errors->first('email')}}</P><br/>
                            <div>
                                <label for="Inputfname">
                                    Contact number 
                                </label>
                            </div>                                    
                            <input type="integer" name="contact_number" class="form-control" id="Inputno" pattern="^\d{10}" required />
                            <P style="color:red">{{$errors->first('contact_number')}}</P><br/>
                            <div>
                                <label for="Inputfname">
                                    Address
                                </label>
                            </div>  
                            <br/>
                            <input type="address" name="address" class="form-control" id="Inputadd"/>
                            <P style="color:red">{{$errors->first('address')}}</P><br/>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" onclick="this.form.go.style.disabled=this.checked ? 'true' : 'false';" />Check awfeto accept the Terms and Conditions of this Promotion
                                </label>
                            </div>
                                <button type="submit" class="btn btn-primary" style="visibility:hidden" id="go">Submit My Entry</button><br/>
                                @if($rp == 1)
                                <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert.css">
                                <script src="assets/sweetalert/dist/sweetalert.min.js"></script>
                                <script>
                                    sweetAlert("Success..!!!", "You have successfuly registered to this promotion", "success");
                                     </script>
                                @endif
                        </div> 

                           </div>









                        </form>

<form role="form" action="testmesage" method="POST">
                        <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open 5566 Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <input type="address" name="abcd" class="form-control" id="Inputadd"/>
                                
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <input type="address" name="efgh" class="form-control" id="Inputadd"/>
                                
        <div class="modal-footer">
          
          <a href="testmesage" class="btn btn-primary" >Enter</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</form>

                    </div>
                </div>











            </div>
            </div>
            

        </div>

 

@stop