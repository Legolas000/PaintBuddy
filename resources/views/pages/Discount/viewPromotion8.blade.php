@extends('layout.layout')
@section('content')


   	<div class="form-group">


        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" action="/enterpromotion"  method="POST">
                        <div class="form-group " class="col-md-6">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			                    <img src="images\promotion\1.png" style="height: 250px;width: 600px; margin-left:280px" class="img-rounded"/>
			                <div class="col-md-12">
			                	<label class="col-md-12" style="color:#00997a; font-size:30px; text-align:center " ><b>
                				<marquee scrollamount="5" width="70">&lt;&lt;&lt;&lt;&lt;</marquee>{{ $titl->title }}<marquee scrollamount="5" direction="right" width="70">&gt;&gt;&gt;&gt;&gt;</marquee>
                				
                                </b>
                			</label>
                			<br/><br/>
                			<p style="font-size:20px; color:#006652; text-align:center">
                				{{ $boddy->body }}
                                The ptomotion will be available from {{ $sdat->sdate }} to {{ $edat->edate }} Please Enter to register for promotion......!!!
                               

                			</p>
                			</div>
                			<div class="form-group" class="col-md-6" style="text-align:center">
                			
                            <br/>
                			<button type="submit" class="btn btn-primary" >Enter </button>

                            <!-- <div class="button-group"> 
                			<a href="/registerpromotion">Enter </a>
                            </div>
 -->

                            

                			<!--<script src="js/sweetalert.min.js"></script>

                			<script >
                				swal({
                					title:'Great Job',
                					type:'success'
                				});

                			</script>
                			-->







                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop