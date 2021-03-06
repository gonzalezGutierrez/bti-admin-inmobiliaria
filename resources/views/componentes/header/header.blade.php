<nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="material-icons">apps</i>
        </button>
        <a class="navbar-brand" href="#">
            <img class="main-logo" src="{{asset('assets/dist/img/light-logo.png')}}" alt="">
            <!--<span>AdminPage</span>-->
        </a>
    </div>
    <div class="nav-container">
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav hidden-xs">
            <li><a id="fullscreen" href="#"><i class="material-icons">fullscreen</i> </a></li>
            <!-- /.Fullscreen -->
            <li class="hidden-xs">
                <a class="search-trigger" href="#">
                    <i class="material-icons">search</i>
                </a>
                <div class="fullscreen-search-overlay" id="search-overlay">
                    <a href="#" class="fullscreen-close" id="fullscreen-close-button"><i class="ti-close"></i></a>
                    <div id="fullscreen-search-wrapper">
                        <form method="get" id="fullscreen-searchform" action="">
                            <input type="text" value="" placeholder="Type keyword(s) here" id="fullscreen-search-input">
                            <i class="ti-search fullscreen-search-icon"><input value="" type="submit"></i>
                        </form>
                    </div>
                </div>
            </li>
            <!-- /.Full page search -->
            <li><a id="menu-toggle" href="#"><i class="material-icons">search</i></a></li>
            <!-- /.Sidebar menu toggle icon -->
            <!--Start dropdown menu-->
            <li class="dropdown hidden-sm"><a href="#" class="dropdown-toggle material-ripple" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li><a href="#">Dropdown Link 1</a></li>
                    <li><a href="#">Dropdown Link 2</a></li>
                    <li><a href="#">Dropdown Link 3</a></li>
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu Link 4.1</a></li>
                            <li><a href="#">Submenu Link 4.2</a></li>
                            <li><a href="#">Submenu Link 4.3</a></li>
                            <li><a href="#">Submenu Link 4.4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Submenu Link 5.1</a></li>
                            <li><a href="#">Submenu Link 5.2</a></li>
                            <li><a href="#">Submenu Link 5.3</a></li>
                            <li class="divider"></li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Submenu Link 5.4.1</a></li>
                                    <li><a href="#">Submenu Link 5.4.2</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4.3</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Submenu Link 5.4.3.1</a></li>
                                            <li><a href="#">Submenu Link 5.4.3.2</a></li>
                                            <li><a href="#">Submenu Link 5.4.3.3</a></li>
                                            <li><a href="#">Submenu Link 5.4.3.4</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Submenu Link 5.4.4</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Submenu Link 5.4.4.1</a></li>
                                            <li><a href="#">Submenu Link 5.4.4.2</a></li>
                                            <li><a href="#">Submenu Link 5.4.4.3</a></li>
                                            <li><a href="#">Submenu Link 5.4.4.4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!--End Start dropdown menu-->
            <!--Start dropdown mega menu-->
            <li class="dropdown mega-dropdown hidden-sm">
                <a href="#" class="dropdown-toggle material-ripple" data-toggle="dropdown">Megamenu <b class="caret"></b></a>
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="row">
                        <div class="col-menu col-md-3">
                            <ul class="menu-col">
                                <li><a href="buttons.html"><i class="fa fa-window-minimize"></i>Buttons</a></li>
                                <li><a href="tabs.html"><i class="fa fa-tablet"></i>Tab</a></li>
                                <li><a href="notification.html"><i class="fa fa-exclamation-triangle"></i>Notification</a></li>
                                <li><a href="tree-view.html"><i class="fa fa-tree"></i>Tree View</a></li>
                                <li><a href="progressbars.html"><i class="fa fa-minus"></i>Progressber</a></li>
                                <li><a href="list.html"><i class="fa fa-list-ol"></i>List View</a></li>
                                <li><a href="typography.html"><i class="fa fa-text-width"></i>Typography</a></li>
                                <li><a href="panels.html"><i class="fa fa-keyboard-o"></i>Panels</a></li>
                            </ul>
                        </div>
                        <!-- end col-3 -->
                        <div class="col-menu col-md-3">
                            <ul class="menu-col">
                                <li><a href="modals.html"><i class="fa fa-file-text-o"></i>Modals</a></li>
                                <li><a href="icheck_toggle_pagination.html"><i class="fa fa-check-square-o"></i>iCheck, Toggle</a></li>
                                <li><a href="labels-badges-alerts.html"><i class="fa fa-exclamation"></i>labels, Badges, Alerts</a></li>
                                <li><a href="charts_flot.html"><i class="fa fa-area-chart"></i>Flot Chart</a></li>
                                <li><a href="charts_Js.html"><i class="fa fa-bar-chart"></i>Chart js</a></li>
                                <li><a href="charts_morris.html"><i class="fa fa-pie-chart"></i>Morris Charts</a></li>
                                <li><a href="charts_sparkline.html"><i class="fa fa-line-chart"></i>Sparkline Charts</a></li>
                                <li><a href="maps_data.html"><i class="fa fa-map-marker"></i>Data Maps</a></li>
                            </ul>
                        </div>
                        <!-- end col-3 -->
                        <div class="col-menu col-md-3">
                            <ul class="menu-col">
                                <li><a href="maps_jvector.html"><i class="fa fa-puzzle-piece"></i>Jvector Maps</a></li>
                                <li><a href="maps_google.html"><i class="fa fa-google"></i>Google map</a></li>
                                <li><a href="maps_snazzy.html"><i class="fa fa-map-signs"></i>Snazzy Map</a></li>
                                <li><a href="widgets.html">
                                        <i class="fa fa-windows"></i> <span>Widgets</span>
                                        <span class="pull-rightr">
                                                        <small class="label pull-right bg-green">new</small>
                                                    </span>
                                    </a>
                                </li>
                                <li><a href="table.html"><i class="fa fa-table"></i>Simple tables</a></li>
                                <li><a href="dataTables.html"><i class="ti-layout-tab-window"></i>Data tables</a></li>
                                <li><a href="footable.html"><i class="ti-layout-width-default"></i>FooTable</a></li>
                                <li><a href="x-editable.html"><i class="ti-close"></i>X-editable</a></li>
                            </ul>
                        </div>
                        <div class="col-menu col-md-3">
                            <ul class="menu-col">
                                <li><a href="icons_bootstrap.html"><i class="fa fa-bold"></i>Bootstrap Icons</a></li>
                                <li><a href="icons_fontawesome.html"><i class="fa fa-fort-awesome"></i>Fontawesome Icon</a></li>
                                <li><a href="icons_flag.html"><i class="fa fa-flag-checkered"></i>Flag Icons</a></li>
                                <li><a href="icons_material.html"><i class="fa fa-meetup"></i>Material Icons</a></li>
                                <li><a href="icons_weather.html"><i class="fa fa-bolt"></i>Weather Icons </a></li>
                                <li><a href="icons_line.html"><i class="fa fa-lemon-o"></i>Line Icons</a></li>
                                <li><a href="icons_pe.html"><i class="fa fa-diamond"></i>Pe Icons</a></li>
                                <li><a href="icon_socicon.html"><i class="fa fa-share-alt"></i>Socicon Icons</a></li>
                            </ul>
                        </div>
                        <!-- end col-3 -->
                        <div class="col-menu col-md-3">
                            <ul class="menu-col">
                                <li><a href="invoice.html"><i class="fa fa-file-text-o"></i>Invoice</a></li>
                                <li><a href="timeline.html"><i class="fa fa-hourglass-o"></i>Vertical timeline</a></li>
                                <li><a href="horizontal_timeline.html"><i class="fa fa-hourglass-end"></i>Horizontal timeline</a></li>
                                <li><a href="pricing.html"><i class="fa fa-usd"></i>Pricing Table</a></li>
                                <li><a href="slider.html"><i class="fa fa-sliders"></i>Slider</a></li>
                                <li><a href="carousel.html"><i class="fa fa-long-arrow-left"></i>Carousel</a></li>
                                <li><a href="code_editor.html"><i class="fa fa-code"></i>Code editor</a></li>
                                <li>
                                    <a href="calender.html">
                                        <i class="ti-calendar"></i><span>Calendar</span>
                                        <span class="pull-right">
                                                        <small class="label pull-right bg-red m-r-5">9</small>
                                                        <small class="label pull-right bg-yellow m-r-5">29</small>
                                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- end col-3 -->
                    </li><!-- end row -->
                </ul>
            </li>
            <!--End dropdown mega menu-->
            <li>
                <a href="#" class="btn-buy">Buy now $25</a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">chat</i>
                    <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li class="rad-dropmenu-header"><a href="#">New Messages</a></li>
                    <li>
                        <a href="#" class="rad-content">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Naeem Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rad-content">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar2.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Sala Uddin</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status away pull-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rad-content">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar3.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Mozammel</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status busy pull-right"></span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rad-content">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar4.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Tanzil Ahmed</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status offline pull-right"></span>
                            </div>
                        </a>
                    </li>
                    <li class="rad-dropmenu-footer"><a href="#">View All messages</a></li>
                </ul> <!-- /.Dropdown-messages -->
            </li><!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <!--<i class="ti-flag-alt"></i>-->
                    <i class="material-icons">flag</i>
                    <span class="label label-success">4</span>
                    <!--<i class="ti-angle-down"></i>-->
                </a>
                <ul class="dropdown-menu dropdown-tasks">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li class="rad-dropmenu-header"><a  href="#">Your Task</a></li>
                    <li>
                        <a href="#">
                            <div>
                                <p><strong>Task 1</strong>
                                    <span class="pull-right sm-text">40% Complete</span></p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <p><strong>Task 2</strong>
                                    <span class="pull-right sm-text">20% Complete</span></p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <p><strong>Task 3</strong>
                                    <span class="pull-right sm-text">60% Complete</span></p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <p><strong>Task 4</strong>
                                    <span class="pull-right sm-text">80% Complete</span></p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="rad-dropmenu-footer"><a href="#">See All Tasks</a></li>
                </ul><!-- /.Dropdown-tasks -->
            </li><!-- /.Dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">add_alert</i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    <!--<i class="ti-announcement"></i>-->
                    <!--<i class="ti-angle-down"></i>-->
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <!--<li class="ui_popover_tooltip"></li>-->
                    <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-html5 fa-2x color-red"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Introduction to fetch()</div>
                                <div class="sm-text">The fetch API</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-bitbucket fa-2x color-violet"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Check your BitBucket</div>
                                <div class="sm-text">Last Chance</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-google fa-2x color-info"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Google Account</div>
                                <div class="sm-text">example@gmail.com</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="rad-content" href="#">
                            <div class="pull-left"><i class="fa fa-amazon fa-2x color-green"></i>
                            </div>
                            <div class="rad-notification-body">
                                <div class="lg-text">Amazon Simple Notification ...</div>
                                <div class="sm-text">Lorem Ipsum is simply dummy text...</div>
                            </div>
                        </a>
                    </li>
                    <li class="rad-dropmenu-footer"><a href="#">See all notifications</a></li>
                </ul>  <!-- /.dropdown-alerts -->
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.Dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="material-icons">person</i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/"><i class="ti-user"></i>&nbsp; {{Auth::user()->nombre}} {{Auth::user()->apellido}}</a></li>
                    <li><a href="/"><i class="ti-email"></i>&nbsp; My Messages</a></li>
                    <li><a href="/"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                    <li><a href="/"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                    <li><a id="btnLogout" href="#"><i class="ti-layout-sidebar-left"></i>&nbsp; Salir</a></li>
                </ul><!-- /.dropdown-user -->
            </li><!-- /.Dropdown -->
        </ul> <!-- /.navbar-top-links -->
    </div>
</nav>

<form action="{{asset('auth/logout')}}" id="formularioLogout" method="POST">
    @csrf
</form>
