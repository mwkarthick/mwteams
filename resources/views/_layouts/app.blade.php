<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Home') - Megawin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <?php
    $base_material_path = "/material_admin_v-1.5-2/Template/jquery";
    ?>

    @section('css')
        <link rel="shortcut icon" href="{{asset("")}}favicon.ico" />
        <!-- Vendor CSS -->

        <link rel="stylesheet" type="text/css" href="{{asset('/')}}jquery-ui-1.11.4.custom/jquery-ui.min.css" />

        <link rel="stylesheet" href="{{asset('/')}}Bootstrap-Admin/dist/assets/lib/bootstrap/dist/css/bootstrap.min.css" />
        
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}bootstrap-3.3.5-dist/css/bootstrap-theme.min.css" />
        
        <link rel="stylesheet" href="{{asset('/')}}static/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="{{asset('/')}}static/css/dataTables.bootstrap.css" />
        <link rel="stylesheet" href="{{asset('/')}}static/css/buttons.dataTables.min.css" />
        
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}font-awesome-4.5.0/css/font-awesome.min.css" />        

        <link rel="stylesheet" href="{{asset('/')}}Bootstrap-Admin/dist/assets/css/main.css">
        
        <!-- Vendor CSS -->
        <link href="{{asset($base_material_path)}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        
        <link href="{{asset($base_material_path)}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        
        
        <link href="{{asset($base_material_path)}}/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/farbtastic/farbtastic.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/bower_components/chosen/chosen.min.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/vendors/summernote/dist/summernote.css" rel="stylesheet">

        <!-- CSS 
        <link href="css/app.min.1.css" rel="stylesheet">
        <link href="css/app.min.2.css" rel="stylesheet">
        -->
        
        <!-- Material CSS -->
        <link href="{{asset($base_material_path)}}/css/app.min.1.css" rel="stylesheet">
        <link href="{{asset($base_material_path)}}/css/app.min.2.css" rel="stylesheet">
        
        
        @show
        
        <!-- OUR CSS -->
        

        @section('style')
        <style>
            .Footer, #footer {
                border-top: 0px;
            }
            /*input[required],select[required] {
                background-image: url('../static/images/required.png');
                background-repeat: no-repeat;
            }*/
            
            form label.required:after
            {
                    color: red;
                    content: " *";
            }
            
            table.dataTable.no-footer {
                border-bottom: 1px solid #ccc;
            }
            
            #blankModal .card {
                /* position: relative; */
                /* background: #fff; */
                box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.15);
                /* margin-bottom: 30px; */
            }
            select.form-control{
                appearance: menulist !important;
                -webkit-appearance: menulist !important;
                -moz-appearance: menulist !important;
            }
            .form-control:not(.fc-alt){
                padding:5px 7px 5px 7px;
            }
            .bootstrap-select.btn-group .dropdown-menu li a:hover {
                color: whitesmoke !important;
                background: #bf5279 !important;
            }
            
            .modal { overflow-y: auto !important; }
            
            .ui-datepicker select.ui-datepicker-month,
            .ui-datepicker select.ui-datepicker-year {
                color:black!important;
            }
            
            /*.watermark {
                position: absolute;
                color: lightgray;
                opacity: 0.25;
                font-size: 3em;
                width: 100%;
                top: 8%;    
                text-align: center;
                z-index: 0;
            }*/
        </style>      

        @show
</head>
<body>
        <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="{{ route('home.index') }}"><!--img width="30px" height="30px" src="{{url('static/images/logo.jpg')}}" alt=""--> 
                        Megawin Switchgear Pvt Ltd</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                
                                <label for="tw-switch" class="ts-helper" style="background-color:#5b5b69" title="Left Menu Toggle"></label>
                            </div>
                        </li>
                        

                        

                        <li class="dropdown" id="email-message">
                            <a data-toggle="dropdown" href="">
                                <i class="tm-icon zmdi zmdi-email"></i>
                                <i class="tmn-counts">0</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                <div class="listview">
                                    <div class="lv-header">
                                        Messages
                                    </div>
                                    <div class="lv-body">
                                        <!--a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">David Belle</div>
                                                    <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Jonathan Morris</div>
                                                    <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/3.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Fredric Mitchell Jr.</div>
                                                    <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Glenn Jecobs</div>
                                                    <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                                </div>
                                            </div>
                                        </a-->
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--li class="dropdown">
                            <a data-toggle="dropdown" href="">
                                <i class="tm-icon zmdi zmdi-notifications"></i>
                                <i class="tmn-counts">9</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg pull-right">
                                <div class="listview" id="notifications">
                                    <div class="lv-header">
                                        Notification

                                        <ul class="actions">
                                            <li class="dropdown">
                                                <a href="" data-clear="notification">
                                                    <i class="zmdi zmdi-check-all"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="lv-body">
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/1.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">David Belle</div>
                                                    <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/2.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Jonathan Morris</div>
                                                    <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/3.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Fredric Mitchell Jr.</div>
                                                    <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Glenn Jecobs</div>
                                                    <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="lv-item" href="">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/4.jpg" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="lv-title">Bill Phillips</div>
                                                    <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <a class="lv-footer" href="">View Previous</a>
                                </div>

                            </div>
                        </li-->
                        <!--li class="dropdown hidden-xs">
                            <a data-toggle="dropdown" href="">
                                <i class="tm-icon zmdi zmdi-view-list-alt"></i>
                                <i class="tmn-counts">2</i>
                            </a>
                            <div class="dropdown-menu pull-right dropdown-menu-lg">
                                <div class="listview">
                                    <div class="lv-header">
                                        Tasks
                                    </div>
                                    <div class="lv-body">
                                        <div class="lv-item">
                                            <div class="lv-title m-b-5">HTML5 Validation Report</div>

                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                    <span class="sr-only">95% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lv-item">
                                            <div class="lv-title m-b-5">Google Chrome Extension</div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lv-item">
                                            <div class="lv-title m-b-5">Social Intranet Projects</div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lv-item">
                                            <div class="lv-title m-b-5">Bootstrap Admin Template</div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete (warning)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="lv-item">
                                            <div class="lv-title m-b-5">Youtube Client App</div>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                    <span class="sr-only">80% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a class="lv-footer" href="">View All</a>
                                </div>
                            </div>
                        </li-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" href=""><i class="tm-icon zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu dm-icon pull-right">
                                <li class="skin-switch hidden-xs">
                                    <span class="ss-skin bgm-lightblue" data-skin="lightblue"></span>
                                    <span class="ss-skin bgm-bluegray" data-skin="bluegray"></span>
                                    <span class="ss-skin bgm-cyan" data-skin="cyan"></span>
                                    <span class="ss-skin bgm-teal" data-skin="teal"></span>
                                    <span class="ss-skin bgm-orange" data-skin="orange"></span>
                                    <span class="ss-skin bgm-blue" data-skin="blue"></span>
                                </li>
                                <li class="divider hidden-xs"></li>
                                <li class="hidden-xs">
                                    <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                                </li>
                                <li>
                                    <a data-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                                </li>
                                <li>
                                    <a href=""><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                                </li>
                                <li>
                                    <a href=""><i class="zmdi zmdi-settings"></i> Other Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs" id="chat-trigger" data-trigger="#chat">
                            <a href=""><i class="tm-icon zmdi zmdi-comment-alt-text"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!------- mail message template ---------->
            <div class="mail-t" style="display:none;">
                <a class="lv-item" href="">
                    <div class="media">
                        <div class="pull-left">
                            <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/4.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lv-title">Bill Phillips</div>
                            <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                        </div>
                    </div>
                </a>
            </div>
            

            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input type="text" id="mwsearch">
                    
                    
                        
                </div>
                
            </div>
        </header>
        
        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            
                            <img src="{{asset($base_material_path)}}/img/profile-pics/1.jpg" alt="">
                            <!--img src="{{url('static/images/home.jpg')}}" alt=""-->
                            
                        </div>
                        <div class="profile-info">
                            {{ strtoupper(session()->get('name')) }}
                            <input type="hidden" id="user_type" value="{{session()->get('user_type')}}">                                        

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                        
                    </a>

                    <ul class="main-menu">
                        <!--li>
                            <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li-->
                        <li>
                            <a href="#" id='logout'><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                @include('_layouts._partials.left_menu')
            </aside>
            
            <aside id="chat" class="sidebar c-overflow">
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>

                <div class="listview">
                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/2.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Jonathan Morris</div>
                                <small class="lv-small">Available</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/1.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">David Belle</div>
                                <small class="lv-small">Last seen 3 hours ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/3.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/4.jpg" alt="">
                                <i class="chat-status-online"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Glenn Jecobs</div>
                                <small class="lv-small">Availble</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/5.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Bill Phillips</div>
                                <small class="lv-small">Last seen 3 days ago</small>
                            </div>
                        </div>
                    </a>

                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/6.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Wendy Mitchell</div>
                                <small class="lv-small">Last seen 2 minutes ago</small>
                            </div>
                        </div>
                    </a>
                    <a class="lv-item" href="">
                        <div class="media">
                            <div class="pull-left p-relative">
                                <img class="lv-img-sm" src="{{asset($base_material_path)}}/img/profile-pics/7.jpg" alt="">
                                <i class="chat-status-busy"></i>
                            </div>
                            <div class="media-body">
                                <div class="lv-title">Teena Bell Ann</div>
                                <small class="lv-small">Busy</small>
                            </div>
                        </div>
                    </a>
                </div>
            </aside>
            
            
            <section id="content">
                <div class="container">
                    @yield('content')

                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; 2020 Megawin
            
            <!--ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
            </ul-->
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        
        
        
        
@section('js')

         <script type="text/javascript" src="{{asset('/')}}static/js/jquery-1.12.0.js"></script>
        <!--jQuery UI-->
        <script type="text/javascript" src="{{asset('/')}}jquery-ui-1.11.4/jquery-ui.js" ></script>
        
        <script type="text/javascript" src="{{asset('/')}}static/js/jquery.dataTables.min.js"></script>
<!--        <script type="text/javascript" src="{{asset('/')}}static/js/dataTables.editor.min.js"></script>-->
        <script type="text/javascript" src="{{asset('/')}}static/js/dataTables.keyTable.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="{{asset('/')}}static/js/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="{{asset('/')}}static/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}static/js/jszip.min.js"></script>
        <script type="text/javascript" src="{{asset('/')}}static/js/vfs_fonts.js"></script>
        <script type="text/javascript" src="{{asset('/')}}static/js/buttons.html5.min.js"></script>
     
        <!--
        <script src="{{asset($base_material_path)}}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        -->
        <script src="{{asset($base_material_path)}}/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="{{asset($base_material_path)}}/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/autosize/dist/autosize.min.js"></script>

        <script src="{{asset($base_material_path)}}/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>    
        
        
        <script src="{{asset($base_material_path)}}/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/summernote/dist/summernote-updated.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        
        
        <script src="{{asset($base_material_path)}}/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/fileinput/fileinput.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/input-mask/input-mask.min.js"></script>
        <script src="{{asset($base_material_path)}}/vendors/farbtastic/farbtastic.min.js"></script>

        
        <script src="{{asset($base_material_path)}}/js/flot-charts/curved-line-chart.js"></script>
        <script src="{{asset($base_material_path)}}/js/flot-charts/line-chart.js"></script>
        <script src="{{asset($base_material_path)}}/js/charts.js"></script>
        
        <script src="{{asset($base_material_path)}}/js/functions.js"></script>
        <!--<script src="{{asset($base_material_path)}}/js/demo.js">-->
        
         

        
        <!--<script type="text/javascript" src="{{asset('static/js/jquery.sgbz.mvrck232.js')}}"></script>-->
        <!--<script type="text/javascript" src="{{asset('static/js/jquery.sgbz.pqpg.dc232.js')}}"></script>-->
        
        <!-- Metis core scripts -->
        <!-- -->
        <script type="text/javascript" src="{{asset('static/js/metisMenu.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('static/js/screenfull.min.js')}}"></script>
        
        <script src="{{asset('/')}}Bootstrap-Admin/dist/assets/js/core.min.js"></script>
        
        <script src="{{asset('/')}}Bootstrap-Admin/dist/assets/js/app.min.js"></script>
        
        
        
        <!--script type="text/javascript" src="{{asset('static/js/jquery.form-validator.js')}}"></script>
        <script type="text/javascript" src="{{asset('/')}}jquery-form/jquery.form.min.js"></script-->        
                
           

        
        
        
        
        
        
        @show
        
        <script>
            
           
            $(window).load(function(){
                
                        //$(this).find('form').trigger('reset');

                        var _site_url = "{{url('/')}}/";
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                        
                        $("#logout").click(function(){
                                swal({   
                                 title: "Are you sure logout?",   
                                 text: "",   
                                 type: "warning",   
                                 showCancelButton: true,   
                                 confirmButtonText: "Yes, Loggout me!",
                                 cancelButtonText: "Cancel!",  
                                 closeOnConfirm: false
                             },function(){ 
                                        var controller = 'login/';
                                        $.ajax({
                                            method: "GET",
                                            url: _site_url + controller + "logout",
                                        }).done(function (data, textStatus, jqXHR) {
                                                window.location.reload();
                                        }).fail(function (jqXHR, textStatus, errorThrown) {
                                            console.log(" ajax fail ");
                                            //console.log(jqXHR, textStatus, errorThrown);
                                        }).always(function (data_jqXHR, textStatus, jqXHR_errorThrown) {
                                            console.log(" ajax always ");
                                            //console.log(data_jqXHR, textStatus, jqXHR_errorThrown);
                                        });
                             });
                        });
                        

					
                        
                    });
                    
           
        </script>
</body>
</html>