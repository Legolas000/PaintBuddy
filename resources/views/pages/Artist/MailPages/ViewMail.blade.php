@extends('pages.Artist.artMainTemp')

@section('ArtContent')
<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Read Mail</h3>
                <div class="box-tools pull-right">
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <h3>{!! $ovr[0]->subject !!}</h3>
                    <h5>From: <a href="#emailOrd" data-toggle="modal">{!! $ovr[0]->from !!}</a> <span class="mailbox-read-time pull-right">{!! $ovr[0]->date !!}</span></h5>
                </div><!-- /.mailbox-read-info -->
                <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        {!! Form::open(array( 'url' => '/delMail','class' => 'form','novalidate' => 'novalidate')) !!}
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" value="{!! $ovr[0]->msgno !!}" id="msgNo" name="msgNo" />
                            <input type="hidden" value="{!! $type !!}" id="type" name="type"/>
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" type="submit"><i class="fa fa-trash-o"></i></button>

                            {{--Get a link to below button--}}
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply" onclick="window.location='/'"><i class="fa fa-reply"></i></button>
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                        {!! Form::close() !!}
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                </div><!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                    {!! $msg !!}
                </div><!-- /.mailbox-read-message -->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                </ul>
            </div><!-- /.box-footer -->
            <div class="box-footer">
                <div class="pull-right">
                    <button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                    <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                </div>
                {!! Form::open(array( 'url' => '/delMail','class' => 'form','novalidate' => 'novalidate')) !!}
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" value="{!! $ovr[0]->msgno !!}" id="msgNo" name="msgNo" />
                    <input type="hidden" value="{!! $type !!}" id="type" name="type"/>
                    <button class="btn btn-default" type="submit"><i class="fa fa-trash-o"></i> Delete</button>
                {!! Form::close() !!}
                <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div><!-- /.box-footer -->
        </div><!-- /. box -->
    </div>
</div>


@stop
