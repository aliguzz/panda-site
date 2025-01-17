@extends('admin.layouts.app')
@section('content')
<!-- Validation -->
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/plugins/select2/select2.css') }}">
<script src="{{ asset('js/plugins/select2/select2.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="{{ asset('frontend/js/moment.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<style>.select2-container.form-control{padding:0}</style>

<div class="clear40"></div>
<section class="contentarea">
    <div class="container-fluid">
        <div class="inner">
            @include('admin.pandamails.nav')
            <div class="right-contentarea">
                <div class="page-header"><h1> New Broadcast</h1></div>
                <div class="box">
                    <div class="box-content">
                        <form id="user-form" class="form-horizontal form-validate" action="{{url('/admin/send-email-broadcast')}}" method="POST" novalidate="novalidate">
                            <div class="form_wrap">

                                {{ csrf_field() }}
                                
                                 <p class="helpinfotextarea">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    <strong>Important Note:</strong>
                                    SMTP settings are required to send mails if you didn't setup emails will not send.
                                </p>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="address">Subject Line:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="" data-rule-required="true" aria-required="true" value=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="country" class="col-sm-4 control-label">Email Template:</label>
                                    <div class="col-sm-8">
                                        <select name="template_id" id="template_id"  class=' form-control required'>
                                            <option value="">Select</option>
                                            @foreach($emailTemplates as $template)
                                            <option value="{{$template->id}}">{{$template->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="country" class="col-sm-4 control-label">Email Lists:</label>
                                    <div class="col-sm-8">
                                        <select name="list_ids[]" id="list_ids" multiple=""  class='select2-me form-control required'>
                                            @foreach($emaillist as $list)
                                            <option value="{{$list->id}}">{{$list->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group hidden" id="dateDiv">
                                    <label class="col-sm-4 control-label" for="last_name">When To Send...</label>
                                    <div class="col-sm-8"><input type="text" class="form-control datetimepicker" name="datetime" id="datetime" placeholder="" data-rule-required="true" aria-required="true" value=""/></div>
                                </div>
                                
                               
                                
                               

                                <div class="form-actions text-right">
                                    <div class="control-label"></div>
                                    <button type="submit" name="send_now" id="send_now" class="btn btn-success">Send Now</button>
                                    <button type="submit" name="send_later" id="send_later" class="btn btn-success hidden">Submit</button>
                                    <a href="javascript:void(0);" class="btn btn-default btnLater">Send Later</a>
                                    <a href="{{url('/admin/email-broadcast')}}" class="btn btn-default">Cancel</a>


                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="clear10"></div>
        </div>
    </div>
</section>

<script>
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

$('.datetimepicker').datetimepicker({
    minDate: new Date(),
});

$(".btnLater").click(function () {
    $(this).hide();
    $('#send_now').hide();
    $('#dateDiv').removeClass('hidden');
    $('#send_later').removeClass('hidden');

});



</script>
@endsection