@extends('_layouts.app')

@section('title', 'Teams')
@section('page_title', 'Teams')
@section('page_icon_cls', 'fa-building')

@section('page_master_li_cls', 'toggled active')
@section('page_teams_li_cls', 'toggled active')
@section('page_teams_li_list_cls', 'active')
@section('page_teams_li_add_cls', '')

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
        <h2 class="f-400">Team Supervisors</h2>
    </div>
    <br>
    <div class="clearfix"></div>
    <div class="card organisation">
        <div class="card-header">
            <h2>
                Add Supervisor
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
                <form role="form" action="{{url('teams/storeTmSvisor')}}/{{$modelData->id}}" method="POST" enctype="multipart/form-data">
                    <div class="row">    
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="team_id" value="{{$modelData->id}}"/>                        

                        <div class="form-group col-sm-6">
                            <label for="name" class="control-label col-sm-3 required">Name</label>
                            <div class="col-sm-9">
                                <div class="fg-line">
                                    <input class="form-control input-sm" placeholder="Name" name="name" type="text" disabled="true" id="name" value="{{$modelData->name}}" data-validation="required" required="required">                                        
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="code" class="control-label col-sm-3 required">Supervisor</label>
                            <div class="col-sm-9">
                                <div class="fg-line"> 
                                    <select class="form-control input-sm " placeholder="Supervisor" aria-describedby="basic-addon1" data-validation="required" required="required" id="supervisor_id" name="supervisor_id">
                                        <option value="">=== Select Supervisor ===</option>                                       
                                        
                                        @foreach( $svdata as $svd )  
                                            @if(in_array($svd->id, $tsvdata))
                                            @else
                                            <option value="{{$svd->id}}">{{$svd->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>                             

                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">  
                        <div class="form-group col-sm-6 col-xs-6 text-center pull-left clear-left" >
                            <button class="btn bgm-lime waves-effect" type="submit" placeholder="Submit" value="Add" title="Add"><i class="zmdi zmdi-check"></i> Add</button>
                        </div>
                        <div class="form-group col-sm-6 col-xs-6 text-center">
                            <button class="btn bgm-cyan waves-effect" type="reset" placeholder="Clear" value="Clear"><i class="zmdi zmdi-close"></i> Clear</button>
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
    
</script>
@stop



