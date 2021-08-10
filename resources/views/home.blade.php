@extends('_layouts.app')

@section('title', 'Home')
@section('page_title', 'Home')
@section('page_icon_cls', 'fa-building')

@section('page_home_li_cls', 'active')

@section('style')
@parent
<style>
    #calendar-widget1 .fc-toolbar {
        background: #009688;
      }
      #calendar-widget1 .fc-day-header {
        color: #fff;
        background: #007d71;
        padding: 5px 0;
        border-width: 0;
      }
      #calendar-widget1 .fc-day-number {
        text-align: center;
        color: #ADADAD;
        padding: 5px 0;
      }
      #calendar-widget1 .fc-day-grid-event {
        margin: 1px 3px 1px;
      }
      #calendar-widget1 .ui-widget-header th,
      #calendar-widget1 .ui-widget-header {
        bord
</style> 
@stop
@section('menu')
    @parent

@stop
@section('content')
    @parent
    
        <div class="card">
            <div class="card-header card-padding text-center">
                    <h3>Home</h3>
                    <h2 class="c-black f-500">Welcome {{ strtoupper(session()->get('name')) }}</h2>
            </div>
            <div class="card-body card-padding" >
                
                    <div class="dash-widgets">
                        <div class="row">
                           
                        </div>
                        
                    </div>
                    <div class="col-sm-12">
                        <!-- Calendar -->
                        <div id="calendar-widget1"></div>

                        <!-- Recent Posts -->
                        <!--div class="card">
                            <div class="card-header ch-alt m-b-20">
                                <h2>Minimum Stock <small>Minimum Stock List</small></h2>
                                <ul class="actions">
                                    <li>
                                        <a href="">
                                            <i class="zmdi zmdi-refresh-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="zmdi zmdi-download"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="">Change Date Range</a>
                                            </li>
                                            <li>
                                                <a href="">Change Graph Type</a>
                                            </li>
                                            <li>
                                                <a href="">Other Settings</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>

                            <div class="card-body">
                                <table class="table table-inner table-vmiddle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Particulars</th>
                                            <th style="width: 60px">Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="f-500 c-cyan">2569</td>
                                            <td>Samsung Galaxy Mega</td>
                                            <td class="f-500 c-cyan">10 Nos</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">9658</td>
                                            <td>Huawei Ascend P6</td>
                                            <td class="f-500 c-cyan">12 Nos</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">1101</td>
                                            <td>HTC One M8</td>
                                            <td class="f-500 c-cyan">5 Nos</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">6598</td>
                                            <td>Samsung Galaxy Alpha</td>
                                            <td class="f-500 c-cyan">20 Nos</td>
                                        </tr>
                                        <tr>
                                            <td class="f-500 c-cyan">4562</td>
                                            <td>LG G3</td>
                                            <td class="f-500 c-cyan">8 Nos</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div-->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            
                            
                            <!-- Todo Lists -->
                            <div id="todo-lists">
                                <div class="tl-header">
                                    <h2>Todo Lists</h2>
                                    <small>Add, edit and manage your Todo Lists</small>
                                    
                                    <ul class="actions actions-alt">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="">Manage Widgets</a>
                                                </li>
                                                <li>
                                                    <a href="">Widgets Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                    
                                <div class="clearfix"></div>
                                    
                                <div class="tl-body">
                                    <div id="add-tl-item">
                                        <i class="add-new-item zmdi zmdi-plus"></i>
                                        
                                        <div class="add-tl-body">
                                            <textarea placeholder="What you want to do..."></textarea>
                                            
                                            <div class="add-tl-actions">
                                                <a href="" data-tl-action="dismiss"><i class="zmdi zmdi-close"></i></a>
                                                <a href="" data-tl-action="save"><i class="zmdi zmdi-check"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox media">
                                        <div class="pull-right">
                                            <ul class="actions actions-alt">
                                                <li class="dropdown">
                                                    <a href="" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="">Delete</a></li>
                                                        <li><a href="">Archive</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="media-body">
                                            <label>
                                                <input type="checkbox">
                                                <i class="input-helper"></i>
                                                <span>Collect rs. 45000 From party on 20/Jan/2019</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox media">
                                        <div class="pull-right">
                                            <ul class="actions actions-alt">
                                                <li class="dropdown">
                                                    <a href="" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="">Delete</a></li>
                                                        <li><a href="">Archive</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="media-body">
                                            <label>
                                                <input type="checkbox">
                                                <i class="input-helper"></i>
                                                <span>Gst Filling to be done on 31/Jan/2019</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="checkbox media">
                                        <div class="pull-right">
                                            <ul class="actions actions-alt">
                                                <li class="dropdown">
                                                    <a href="" data-toggle="dropdown">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="">Delete</a></li>
                                                        <li><a href="">Archive</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="media-body">
                                            <label>
                                                <input type="checkbox">
                                                <i class="input-helper"></i>
                                                <span>Purchase Follow up on 10/Jan/2019</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
            </div>
        </div>
                    
        
@stop

@section('css')
    @parent

@stop    
@section('js')
    @parent

<script>

    $(function () {

                   
                   $('#calendar-widget1').fullCalendar({
                                contentHeight: 'auto',
                                theme: true,
                        header: {
                            right: '',
                            center: 'prev, title, next',
                            left: ''
                        },
                        defaultDate: '2021-07-09',
                        selectable: true,
                        editable: false,
                        dateClick: function(info) {
                        alert('clicked ' + info.dateStr);
                        },
                        //select: function(info) {
                        events: [
                            /*{
                                title: 'AT Coimbatore',
                                start: '2021-01-01',
                                end: '2021-01-01',
                                className: 'bgm-cyan'
                            },
                            {
                                title: 'At Chennai',
                                start: '2021-07-07',
                                end: '2021-07-08',
                                className: 'bgm-orange'
                            },
                            {
                                id: 9991,
                                title: 'Repeat',
                                start: '2021-01-09',
                                className: 'bgm-lightgreen'
                            },
                            {
                                id: 999,
                                title: 'Repeat',
                                start: '2021-01-16',
                                className: 'bgm-lightblue'
                            },
                            {
                                title: 'Meet',
                                start: '2021-01-12',
                                end: '2021-01-12',
                                className: 'bgm-green'
                            },
                            {
                                title: 'Lunch',
                                start: '2021-01-12',
                                className: 'bgm-cyan'
                            },
                            {
                                title: 'Birthday',
                                start: '2021-01-13',
                                className: 'bgm-amber'
                            },
                            {
                                title: 'Google',
                                url: 'http://google.com/',
                                start: '2021-01-28',
                                className: 'bgm-amber'
                            }*/
                        ]

                    }); 
                    setTimeout(calwid, 10000);
                    setTimeout(calwid2, 7000);
                   function calwid()
                   {
                       var event = {
                            /*title: 'New Event',
                            start: Date(Date.now()),
                            backgroundColor: App.getLayoutColorCode('purple'),
                            allDay: false*/
                            title: 'AT Chennai',
                            start: '2021-07-21',
                            end: '2021-07-26',
                            className: 'bgm-green'
                        }
                        jQuery('#calendar-widget1').fullCalendar('renderEvent',event,true);
                        console.log("cal");
                   }
                   function calwid2()
                   {
                       var event = {
                            /*title: 'New Event',
                            start: Date(Date.now()),
                            backgroundColor: App.getLayoutColorCode('purple'),
                            allDay: false*/
                            title: 'AT Coimbatore',
                            start: '2021-07-13',
                            end: '2021-07-14',
                            className: 'bgm-red'
                        }
                        jQuery('#calendar-widget1').fullCalendar('renderEvent',event,true);
                        console.log("cal");
                   }
                    

    });
</script>
@stop
