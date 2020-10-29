<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inmobiliaria :  @yield('title')</title>
    <!-- FEVICON AND TOUCH ICON -->
    <link rel="shortcut icon" href="{{asset('assets/dist/img/ico/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('assets/dist/img/ico/apple-touch-icon-57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('assets/dist/img/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('assets/dist/img/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('assets/dist/img/ico/apple-touch-icon-144-precomposed.png')}}">
    <!-- STATRT GLOBAL MANDATORY STYLE -->
    <link href="{{asset('assets/dist/css/base.css')}}" rel="stylesheet" type="text/css"/>
    <!-- START PAGE LABEL PLUGINS -->
    <!-- START THEME LAYOUT STYLE -->
    <link href="{{asset('assets/dist/css/component_ui.min.css')}}" rel="stylesheet" type="text/css"/>
    <link id="defaultTheme" href="{{asset('assets/dist/css/skins/skin-dark-1.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/dist/css/custom.css')}}" rel="stylesheet" type="text/css"/>

    @yield('css')

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

</head>
<body>
<div id="wrapper" class="wrapper animsition">

    @include('componentes.header.header')

    @include('componentes.sidebar-menu.menu-sidebar')

    <!-- /.Left Sidebar-->
    <div class="side-bar right-bar">
        <div class="">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs right-sidebar-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="material-icons">search</i></a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="material-icons">person_add</i></a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="material-icons">chat</i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  in active" id="home">
                    <ul id="styleOptions" title="switch styling">
                        <li><b>Dark Skin</b></li>
                        <li><a href="javascript: void(0)" data-theme="skin-blue.min"><img src="assets/dist/img/theme-color/1.jpg" alt=""/></a></li>
                        <li><a href="javascript: void(0)" data-theme="skin-dark.min"><img src="assets/dist/img/theme-color/2.jpg" alt=""/></a></li>
                        <li><a href="javascript: void(0)" data-theme="skin-red-light.min" class="skin-logo"><img src="assets/dist/img/theme-color/5.jpg" alt=""/></a></li>
                        <li><b>Dark Skin sidebar</b></li>
                        <li><a href="javascript: void(0)" data-theme="skin-default.min"><img src="assets/dist/img/theme-color/7.jpg" alt=""/> </a></li>
                        <li><a href="javascript: void(0)" data-theme="skin-red-dark.min"><img src="assets/dist/img/theme-color/6.jpg" alt=""/></a></li>
                        <li><a href="javascript: void(0)" data-theme="skin-dark-1.min"><img src="assets/dist/img/theme-color/8.jpg" alt=""/></a></li>
                        <li><b>Light Skin sidebar</b></li>
                        <li><a href="javascript: void(0)" data-theme="skin-default-light.min" class="skin-logo"><img src="assets/dist/img/theme-color/3.jpg" alt=""/></a></li>
                        <li><a href="javascript: void(0)" data-theme="skin-white.min"><img src="assets/dist/img/theme-color/4.jpg" alt=""/></a> </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade " id="profile">
                    <h3 class="sidebar-heading">Activity</h3>
                    <div class="rad-activity-body">
                        <div class="rad-list-group group">
                            <a href="#" class="rad-list-group-item">
                                <div class="rad-list-icon bg-red pull-left"><i class="fa fa-phone"></i></div>
                                <div class="rad-list-content"><strong>Client meeting</strong>
                                    <div class="md-text">Meeting at 10:00 AM</div>
                                </div>
                            </a>
                            <a href="#" class="rad-list-group-item">
                                <div class="rad-list-icon bg-yellow pull-left"><i class="fa fa-refresh"></i></div>
                                <div class="rad-list-content"><strong>Created ticket</strong>
                                    <div class="md-text">Ticket assigned to Dev team</div>
                                </div>
                            </a>
                            <a href="#" class="rad-list-group-item">
                                <div class="rad-list-icon bg-primary pull-left"><i class="fa fa-check"></i></div>
                                <div class="rad-list-content"><strong>Activity completed</strong>
                                    <div class="md-text">Completed the dashboard html</div>
                                </div>
                            </a>
                            <a href="#" class="rad-list-group-item">
                                <div class="rad-list-icon bg-green pull-left"><i class="fa fa-envelope"></i></div>
                                <div class="rad-list-content"><strong>New Invitation</strong>
                                    <div class="md-text">Max has invited you to join Inbox</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.sidebar-menu -->
                    <h3 class="sidebar-heading">Tasks Progress</h3>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="#">
                                <h4 class="subheading">
                                    Task one
                                    <span class="label label-danger pull-right">40%</span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 40%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h4 class="subheading">
                                    Task two
                                    <span class="label label-success pull-right">20%</span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 20%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h4 class="subheading">
                                    Task Three
                                    <span class="label label-warning pull-right">60%</span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 60%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h4 class="subheading">
                                    Task four
                                    <span class="label label-primary pull-right">80%</span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary progress-bar-striped active" style="width: 80%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </div>
                <div role="tabpanel" class="tab-pane fade " id="messages">
                    <div class="message_widgets">
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Naeem Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar2.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Sala Uddin</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status away pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar3.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Mozammel</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status busy pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar4.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Tanzil</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status offline pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar5.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Amir Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Salman Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Tahamina</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar4.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Jhon</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status offline pull-right"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Right Sidebar -->
    <!-- /.Navbar  Static Side -->
    <div class="control-sidebar-bg"></div>
    <!-- Page Content -->
    <div id="page-wrapper">
        <!-- main content -->
        <div class="content">
            @yield('content')
        </div> <!-- /.main content -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!-- START CORE PLUGINS -->
<script src="{{asset('assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/metisMenu/metisMenu.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/animsition/js/animsition.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- STRAT PAGE LABEL PLUGINS -->
<!-- START THEME LABEL SCRIPT -->
<script src="{{asset('assets/dist/js/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dist/js/jQuery.style.switcher.min.js')}}" type="text/javascript"></script>
@yield('js')
<script>
    "use strict"; // Start of use strict
    function myFunction() {
        window.print();
    }

    let btnLogout        =  document.getElementById('btnLogout');
    let formularioLogout = document.getElementById('formularioLogout');

    btnLogout.addEventListener("click",function (){
        formularioLogout.submit();
    });
</script>
</body>
</html>
