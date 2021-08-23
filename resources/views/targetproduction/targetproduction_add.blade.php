@extends('_layouts.app')

@section('title', 'Target Production Add')
@section('page_title', 'Target Production Add')
@section('page_icon_cls', 'fa-building')

@section('page_master_li_cls', 'toggled active')
@section('page_targetproduction_li_cls', 'toggled active')
@section('page_targetproduction_li_list_cls', 'active')
@section('page_targetproduction_li_add_cls', '')

@section('style')
@parent
<style>

</style> 
@stop
@section('menu')
@parent
@stop
@section('content')
@parent
<div class="">
    <!--BEGIN INPUT TEXT FIELDS-->
    <div class="text-center">
        <h2 class="f-400">Target Production</h2>
    </div>
    <br>
    <div class="clearfix"></div>
    <div class="card organisation">
        <div class="card-header">
            <h2>
                Add <span class="label label-default">New</span>
                Target Production
            </h2>
        </div>
        <div class="card-body card-padding">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif 
            @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            @endif            
            <div class="row">
                <?php $currentdate =date('Y-m-d'); 
                       $timestamp = date('Y-m-d H:i:s');?>
                
                    <form id='readcsvform' role="form" action="{{url('targetproduction/readcsv')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name" class="control-label col-sm-3 required">CSV Upload</label>
                                <div class="col-sm-9">
                                    <div class="fg-line">
                                       <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/>

                                        <input type="file" id="file" name="csvfile" />                        
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group col-sm-6 col-xs-6 text-center pull-left clear-left" >
                                <button class="btn bgm-lime waves-effect readcsv" type="button" placeholder="Submit" value="Read" title="Add"><i class="zmdi zmdi-check"></i> Read</button>
                            </div>
                            
                        </div>
                    </form >
                    <hr>
                    <form class="p-5 m-t-20" id="targetupload" role="form" action="{{url('targetproduction/readcsv')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="startdate" class="control-label col-sm-4">Start Date</label>
                                <div class="col-sm-8">
                                    <div class="fg-line">
                                        <input type='text' class="form-control input-sm" id="start_date" name="startdate" value="{{$currentdate}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="end_date" class="control-label col-sm-4">End Date</label>
                                <div class="col-sm-8">
                                    <div class="fg-line">
                                        <input type='text' class="form-control input-sm" id="end_date" name="enddate" value="{{$currentdate}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="targettable">

                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-xs-6 text-center pull-left clear-left" >
                                <button class="btn bgm-orange waves-effect uploadtarget" type="button" placeholder="Submit" value="Read" title="Add"><i class="zmdi zmdi-upload"></i> Upload</button>
                            </div>    
                        </div>
                    </form>
                
                    
                
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@parent
<!--    
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}jonthornton-jquery-timepicker-107ab73/jquery.timepicker.css"/ >
-->        
@stop    
@section('js')
@parent
<!--    
    <script type="text/javascript" src="{{asset('/')}}jonthornton-jquery-timepicker-107ab73/jquery.timepicker.js"></script>
        
    <script type="text/javascript" src="{{asset('static/js/jquery.form-validator.js')}}"></script>
-->
<script>
    
    $(function () {
        
            $("#targetupload").hide();
            var _site_url = "{{url('/')}}/";
            $("#start_date").datepicker({dateFormat: 'yy-mm-dd'});
            $("#end_date").datepicker({dateFormat: 'yy-mm-dd'});
            
            $(".readcsv").click(function()
            {
                var file_data = $('#file').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('csvfile', file_data);
                var controller = 'targetproduction/';

                $.ajax({
                    method: "POST",
                    contentType:false,
                    cache:false,
                    processData:false,
                    url: _site_url + controller + "readcsv",
                    data: form_data,
                    }).done( function( data, textStatus, jqXHR ) {
                    $("#targetupload").show();    
                    console.log( " ajax done " );
                    console.log(data.td_data.length);
                    var len0 = data.td_data.length;
                    $(".targettable").append("<table class='table table-bordered'></table>");
                    for(var i=0;i< len0;i++)
                    {
                        var len1 = data.td_data[i].length
                        if(parseInt(i)==0)
                        {
                            $(".targettable table").append('<thead><tr></tr></thead><tbody></tbody>')
                            for(var j=0;j<len1;j++)
                            {
                                $(".targettable table thead tr").append('<th>'+data.td_data[i][j]+'</th>');
                            }
                        }
                        else
                        {
                            var td = "";
                            for(var j=0;j<len1;j++)
                            {
                                td = td+'<td>'+data.td_data[i][j]+'<input type="hidden" name="'+data.td_data[0][j]+'['+i+']" value="'+data.td_data[i][j]+'"></td>';
                                console.log(i+"  "+j);
                            }
                            $(".targettable table tbody").append("<tr>"+td+"</tr>");

                        }
                            /*$(".targettable table").append('<tr></tr>')
                            for(var j=0;j<len1;j++)
                            {
                                $(".targettable table tr").append('<td>'+data.td_data[i][j]+'</td>');
                            }
                        }*/
                        
                            
                        //console.log(data.td_data[i]);
                    }
                    

                    }).fail( function( jqXHR, textStatus, errorThrown ) {
                        console.log( " ajax fail " );
                        console.log( jqXHR, textStatus, errorThrown );
                    }).always ( function( data_jqXHR, textStatus, jqXHR_errorThrown ) {
                        console.log( " ajax always " );
                        $(".loader").hide();
                        console.log( data_jqXHR, textStatus, jqXHR_errorThrown );
                    });
            });
            $(".uploadtarget").click(function()
            {
                var controller = 'targetproduction/';
                $.ajax({
                    method: "POST",
                    
                    url: _site_url + controller + "uploadcsv",
                    data: $("#targetupload").serialize(),
                    }).done( function( data, textStatus, jqXHR ) {
                    $("#targetupload").show();    
                    console.log( " ajax done " );
                    var len = data.errorlog.length;
                    if(len > 0)
                    {
                        var tmlen = data.teamlog.length;
                        if(tmlen > 0)
                        {
                            swal("Error!", data.teamlog, "error");
                        }
                        else
                        {
                            swal("Warning!", data.errorlog+" Teams not found", "warning");
                        }
                        
                        //$("#readcsvform").closest(".row").append(data.errorlog);
                        //$("#readcsvform").closest(".row").append("Team not found");
                            
                    }
                        

                    }).fail( function( jqXHR, textStatus, errorThrown ) {
                        console.log( " ajax fail " );
                        console.log( jqXHR, textStatus, errorThrown );
                    }).always ( function( data_jqXHR, textStatus, jqXHR_errorThrown ) {
                        console.log( " ajax always " );
                        $(".loader").hide();
                        console.log( data_jqXHR, textStatus, jqXHR_errorThrown );
                    });
            });
            
    })
</script>
@stop



