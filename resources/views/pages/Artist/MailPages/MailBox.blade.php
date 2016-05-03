@extends('pages.Artist.artMainTemp')

@section('ArtContent')
<div class="row">
    <div class="col-md-3">
        <a href="" data-target="#emailOrd" data-toggle="modal" class="btn btn-primary btn-block margin-bottom">Compose</a>
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Folders</h3>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    {{--Get count for all --}}
                    <li><a href="/getMailBox.type=1"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">@if(isset($emailList)){!! count($emailList) !!}@endif</span></a></li>
                    <li><a href="/getMailBox.type=2"><i class="fa fa-envelope-o"></i> Sent</a></li>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Inbox</h3>
                <div class="box-tools pull-right">
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            @if(isset($emailList))
                                @foreach($emailList as $listItm)
                                    <tr>
                                        <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                        <td class="mailbox-name"><a href="/viewMail.MailID={!! $listItm[0]->msgno !!}.type={!! $type !!}">{!! $listItm[0]->from !!}</a></td>
                                        @if( $listItm[0]->seen == 0)
                                            <td class="mailbox-subject"><b>{!! $listItm[0]->subject !!}</b></td>
                                        @else
                                            <td class="mailbox-subject">{!! $listItm[0]->subject !!}</td>
                                        @endif
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">{!! $listItm['agoTime'] !!}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table><!-- /.table -->
                </div><!-- /.mail-box-messages -->
            </div><!-- /.box-body -->
            <div class="box-footer no-padding">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                </div>
            </div>
        </div><!-- /. box -->
    </div>
</div>
@stop