@extends('_layouts.app')

@section('title', 'Supervisors List')
@section('page_title', 'Supervisors List')
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
    @include('_common.base_list_table')      

@stop

@section('css')
    @parent
@stop    
@section('js')
    @parent
    
    <script>
        $(function () {
            
        });
    </script>
@stop


