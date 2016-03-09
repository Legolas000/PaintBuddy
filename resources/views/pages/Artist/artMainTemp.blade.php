<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Paint Buddy</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<<<<<<< HEAD

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- FullCalendar 2.6.0 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

=======
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}


    <!-- FullCalendar 2.6.0 -->
    <script src='js/jquery-1.9.1.min.js'></script>
    <script src='js/jquery-ui.js'></script>
    <script src='js/fullcalendar.min.js'></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
>>>>>>> origin/master
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
<<<<<<< HEAD

=======
>>>>>>> origin/master
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

<<<<<<< HEAD
    <!-- LobiBox -->
    <link rel="stylesheet" href="css/Lobibox.min.css"/>

    <!-- Cursor for datatables -->
    <style>
        #aItemTab tr,
        #artOrdersTab tr,
        #asDateTab tr{
            cursor: pointer;
        }
    </style>

=======
>>>>>>> origin/master
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini ">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/dboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Paint</b>Buddy</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
<<<<<<< HEAD
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">@if(isset($dDateArr) && count($dDateArr)>0) {!! count($dDateArr) !!} @endif</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have @if(isset($dDateArr)) {!! count($dDateArr) !!} @else 0 @endif notifications.</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @if(isset($dDateArr))
                                        @foreach($dDateArr as $dets)
                                            @if(isset($dets['dLineIDs']))
                                                <li>
                                                    <a href="/viewOrDets={!! $dets['dLineIDs'] !!}">
                                                        <i class="fa fa-warning text-yellow"></i>The Order ID {!! $dets['dLineIDs'] !!} is reaching the deadline.
                                                    </a>
                                                </li>
                                            @endif
                                            @if(isset($dets['passIDs']))
                                                <li>
                                                    <a href="/viewOrDets={!! $dets['passIDs'] !!}">
                                                        <i class="fa fa-users text-red"></i> The Order ID {!! $dets['passIDs'] !!} has passed the deadline.
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
=======

>>>>>>> origin/master
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Sinthujan Ganeshalingam</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    Sinthujan Ganeshalingam
                                    <small>Member since Jan. 2016</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">

                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">

                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Sinthujan Ganeshalingam</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <?php $url = $_SERVER['REQUEST_URI'];?>
                @if($url == '/ArtMainOrdersC')
                    {!! $act1='active' !!}
                @endif
<<<<<<< HEAD

                <li><a href="/dboard"><i class="fa fa-laptop"></i> <span>DashBoard</span></a></li>
                <li><a href="/aitem"><i class="fa  fa-folder-open"></i> <span>Templates</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-share"></i> <span>Order Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/ArtMainOrders"><i class="fa fa-circle-o"></i> <span>View Orders</span></a></li>
                        <li class="active"><a href="/ArtAsDead"><i class="fa fa-circle-o"></i> <span>Assign Deadlines</span></a></li>
                    </ul>
                </li>
                <li><a href="/artRep"><i class="fa fa-book"></i> <span>Reports</span></a></li>
                <li><a href="/artPView"><i class="fa fa-book"></i> <span>View Count</span></a></li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('ArtContent')
            <!-- Your Page Content Here -->

=======

                <li><a href="/aitem"><i class="fa fa-laptop"></i> <span>Templates</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-share"></i> <span>Order Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/ArtMainOrders"><i class="fa fa-circle-o"></i> <span>View Orders</span></a></li>
                        <li class="active"><a href="/ArtAsDead"><i class="fa fa-circle-o"></i> <span>Assign Deadlines</span></a></li>
                    </ul>
                </li>
                <li><a href="/artPayRep"><i class="fa fa-book"></i> <span>Reports</span></a></li>
                <li><a href="/artPView"><i class="fa fa-book"></i> <span>View Count</span></a></li>
                <li><a href="/artChartView"><i class="fa fa-pie-chart"></i> <span>Chart View</span></a></li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('ArtContent')
            <!-- Your Page Content Here -->

>>>>>>> origin/master
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">

        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="/">PaintBuddy Ver 1.2.0</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->


{{--Full calandar event details modal--}}

<div id="fullCalModal" class="modal fade modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<<<<<<< HEAD
                <div id = "getOrdModBtn" class="pull-left" ></div>
=======
>>>>>>> origin/master
            </div>
        </div>
    </div>
</div>


<<<<<<< HEAD
{{--Email from orders modal--}}
<style>
    #emailOrd .modal-dialog  {width:75%;}
</style>

<div id="emailOrd" class="modal fade modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title">Compose New Message</h4>
            </div>
            <div id="modalBody" class="modal-body">
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                {!! Form::open(array( 'url' => '/cMail','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                                <div class="box-header with-border">
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <input class="form-control" name="toH" id ="toH" placeholder="To:" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="subjectH" placeholder="Subject:">
                                    </div>
                                    <div class="form-group">
                                        <textarea id="compose-textarea" class="form-control" name="mailDets" style="height: 300px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-default btn-file">
                                            <i class="fa fa-paperclip"></i> Attachment
                                            {!! Form::file('file', null) !!}
                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                    </div>
                                </div><!-- /.box-footer -->
                            </div><!-- /. box -->
                            {!! Form::close() !!}
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
=======

>>>>>>> origin/master


<!-- REQUIRED JS SCRIPTS -->

<<<<<<< HEAD
<!-- Other required jQuery scripts included here -->
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

=======
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
{{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
>>>>>>> origin/master
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- FullCalendar 2.6.0 -->
<<<<<<< HEAD
<script src='js/jquery-ui.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
=======
<script src='js/jquery-1.9.1.min.js'></script>
<script src='js/jquery-ui.js'></script>
<script src='js/fullcalendar.min.js'></script>

>>>>>>> origin/master

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="js/jquery.magnific-popup.js"></script>

<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<<<<<<< HEAD

<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

=======
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>

<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
>>>>>>> origin/master
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>


<<<<<<< HEAD
<!-- {LobiBox} jQuery Files + Laravel Scripts -->
<script src="js/Lobibox.min.js"></script>
<script src="js/messageboxes.min.js"></script>
<script src="js/notifications.min.js"></script>
@if(Session::has('success'))
    <script>
        var txt = "{!! Session::get('message', '') !!}";
        Lobibox.alert('success', {
            msg: txt
        });
    </script>
@elseif (count($errors) > 0)
    <?php
    $ext="";
    foreach ($errors->all() as $error){
        $ext .=  "<li>". $error ."</li>";
    }
    ?>
    <script>
        var txt = "<ul>";
        txt +='{!! $ext !!}';
        txt += "</ul>";
        Lobibox.alert('error', {
            msg: txt,
            callback: function ($this, type) {
                Lobibox.notify('info', {
                    msg: 'Make the necessary changes and try again.'
                });
            }
        });
    </script>
@endif

=======
<!-- Page Script -->
>>>>>>> origin/master
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<<<<<<< HEAD
<!-- Page Script -->
<script type="text/javascript" src="js/ArtistMainScript.js"></script>

<!-- Ajax Scripts to load graphs -->
<script  type="text/javascript">
    jQuery(window).load(function() {
        $(document).ready(function () {
            $.ajax({
                url: "/retColData",
                data: {_token: "{!!csrf_token()!!}"},
                dataType: 'json',
                method: "post"
            }).done(function (data) {
                console.log(data);
                if (data === null) {
                    var ctx = document.getElementById("barChart").getContext("2d");
                    var ctx2 = document.getElementById("lineChart").getContext("2d");
                    ctx.font = "15px Verdana";
                    ctx2.font = "15px Verdana";
                    ctx.fillText("Database is empty!", 70, 50, 300);
                    ctx2.fillText("Database is empty!", 70, 50, 300);
                } else {
                    var ctx = document.getElementById("barChart").getContext("2d");
                    var myBarChart = new Chart(ctx).Bar(data);

                    var ctx2 = document.getElementById("lineChart").getContext("2d");
                    var myBarChart = new Chart(ctx2).Line(data);
                }
            });

            $.ajax({
                url: "/retPViewDate",
                data: {_token: "{!!csrf_token()!!}"},
                dataType: 'json',
                method: "post"
            }).done(function (data) {
                if (data === null) {
                    var ctx = document.getElementById("pViewChart").getContext("2d");
                    ctx.font = "15px Verdana";
                    ctx.fillText("Database is empty!", 70, 50, 300);
                }
                else {
                    var ctx = document.getElementById("pViewChart").getContext("2d");
                    var myRadarChart = new Chart(ctx).Radar(data);
                }
            });
        });
    });
=======
{{--Other required jQuery scripts included here--}}
<script type="text/javascript">
    $(document).ready(function() {
        //$( "#datepicker" ).datepicker();
        //$('#reservation').daterangepicker();
        $("#ddMask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
        $('.dTab table tbody tr  td').on('click', function () {
        $("#asDateModal").modal("show");
        $("#ordID").val($.trim($(this).closest('tr').children()[0].textContent));
        $("#ordDate").val($.trim($(this).closest('tr').children()[1].textContent));
        $("#dDate").val($.trim($(this).closest('tr').children()[2].textContent));
        //$("#ddDate").val($.trim($(this).closest('tr').children()[3].textContent));
       //$("#ddMask").inputmask(setvalue, {"placeholder": "yyyy-mm-dd"});
        $("#ddMask").val($.trim($(this).closest('tr').children()[3].textContent));
        });
    });

    $(document).ready(function() {
        $('table tbody tr  td.dbOrder').on('click', function () {
            $("#pricUpModal").modal("show");
            $("#iName").val($.trim($(this).closest('tr').children()[2].textContent));
            $("#iDescrip").val($.trim($(this).closest('tr').children()[3].textContent));
            $("#iSize").val($.trim($(this).closest('tr').children()[4].textContent));
            $("#iPrice").val($.trim($(this).closest('tr').children()[5].textContent));
        });
    });


    $(document).ready(function() {
        var table = $("#aItemTab").DataTable({
            "columnDefs": [ {
                "targets": [0,6],
                "orderable": false
            } ]
        });
        $(document).ready(function() {
            $("#compose-textarea").wysihtml5();
            //Date range picker
//            $('#dRange').daterangepicker()({
//                timePicker: true,
//                timePickerIncrement: 30,
//                locale: {
//                    format: 'MM/DD/YYYY h:mm A'
//                }
//            });
            $('#dRange').daterangepicker({
                format: 'YYYY-MM-DD'});
        });

//        $('#aItemTab tbody').on('click', 'tr', function () {
//            var data = table.row( this ).data();
//            alert( 'You clicked on '+data[1]+'\'s row' );
//            $(this).find('a.image-link').magnificPopup({
//                type: 'image',
//                closeOnContentClick: true,
//                closeBtnInside: false,
//                fixedContentPos: true,
//                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
//                image: {
//                    verticalFit: true
//                },
//                zoom: {
//                    enabled: true,
//                    duration: 300 // don't foget to change the duration also in CSS
//                }
//            }).magnificPopup('open');
//
//        } );



        $("#artOrdersTab").DataTable();
        $("#asDateTab").DataTable();
        $("#aPageView").DataTable({
            "order" : [[1, "desc" ]]
        });
    });


    jQuery(window).load(function() {
        $('#aItemTab tbody').on('click', 'tr', function () {
            $(document).ready(function () {
                $(this).find('a.image-link').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300 // don't foget to change the duration also in CSS
                    }
                });
            });
        });
    });



    $(document).ready(function() {
        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
//        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
//        // This will get the first returned node in the jQuery collection.
//        var areaChart = new Chart(areaChartCanvas);

//        $.ajax({
//            type: "GET",
//            url: "/artChartView",
//            //data: jsonData, if you need to post some data to the controller.
//            contentType: "application/json; charset=utf-8",
//            dataType: "json",
//            success: OnSuccess,
//            error: OnErrorCall
//        });
//
//        function OnSuccess(response) {
//            var aData = response.d;
//            console.log(aData);
//            //build here your **data** as object wanted by Bar. Colors which you want and so on, options could be empty object {}. I think is possible to call bar without options, you need to read the documentation.
//
//            var ctx = $("#areaChart").get(0).getContext("2d");
//            var myBarChart = new Chart(ctx).Bar(data, options);
//        }
//
//        function OnErrorCall(response)
//        {
//            alert('error');
//        }


        $.ajax({
            url: "/retColData",
            data: {_token: "{!!csrf_token()!!}"},
            dataType: 'json',
            method: "post"


        }).done(function (data) {
            console.log(data);

            if (data === null)
            {
               // alert("none available");
                var ctx = document.getElementById("barChart").getContext("2d");
                var ctx2 = document.getElementById("lineChart").getContext("2d");
                ctx.font="15px Verdana";
                ctx2.font="15px Verdana";
                ctx.fillText("Database is empty!",70,50,300);
                ctx2.fillText("Database is empty!",70,50,300);
            }else
            {
                var ctx = document.getElementById("barChart").getContext("2d");         //For bar chart
                var myBarChart = new Chart(ctx).Bar(data);

                var ctx = document.getElementById("lineChart").getContext("2d");        //For
                var myBarChart = new Chart(ctx).Line(data);
            }

        });


        $.ajax({
            url: "/retPViewDate",
            data: {_token: "{!!csrf_token()!!}"},
            dataType: 'json',
            method: "post"


        }).done(function (data) {
            if (data === null)
            {
                var ctx = document.getElementById("pViewChart").getContext("2d");
                ctx.font="15px Verdana";
                ctx.fillText("Database is empty!",70,50,300);
            }
            else {
                var ctx = document.getElementById("pViewChart").getContext("2d");         //For bar chart
                var myRadarChart = new Chart(ctx).Radar(data);
            }
        });


        {{--var areaChartData = {--}}
            {{--labels: ["January", "February", "March", "April", "May", "June", "July"],--}}
            {{--datasets: [--}}
                {{--{--}}
                    {{--label: "Electronics",--}}
                    {{--fillColor: "rgba(210, 214, 222, 1)",--}}
                    {{--strokeColor: "rgba(210, 214, 222, 1)",--}}
                    {{--pointColor: "rgba(210, 214, 222, 1)",--}}
                    {{--pointStrokeColor: "#c1c7d1",--}}
                    {{--pointHighlightFill: "#fff",--}}
                    {{--pointHighlightStroke: "rgba(220,220,220,1)",--}}
                    {{--data: [65, 59, 80, 81, 56, 55, 40]--}}
                {{--},--}}
                {{--{--}}
                    {{--label: "Digital Goods",--}}
                    {{--fillColor: "rgba(60,141,188,0.9)",--}}
                    {{--strokeColor: "rgba(60,141,188,0.8)",--}}
                    {{--pointColor: "#3b8bba",--}}
                    {{--pointStrokeColor: "rgba(60,141,188,1)",--}}
                    {{--pointHighlightFill: "#fff",--}}
                    {{--pointHighlightStroke: "rgba(60,141,188,1)",--}}
                    {{--data: [28, 48, 40, 19, 86, 27, 90]--}}
                {{--}--}}
            {{--]--}}
        {{--};--}}

        {{--var areaChartOptions = {--}}
            {{--//Boolean - If we should show the scale at all--}}
            {{--showScale: true,--}}
            {{--//Boolean - Whether grid lines are shown across the chart--}}
            {{--scaleShowGridLines: false,--}}
            {{--//String - Colour of the grid lines--}}
            {{--scaleGridLineColor: "rgba(0,0,0,.05)",--}}
            {{--//Number - Width of the grid lines--}}
            {{--scaleGridLineWidth: 1,--}}
            {{--//Boolean - Whether to show horizontal lines (except X axis)--}}
            {{--scaleShowHorizontalLines: true,--}}
            {{--//Boolean - Whether to show vertical lines (except Y axis)--}}
            {{--scaleShowVerticalLines: true,--}}
            {{--//Boolean - Whether the line is curved between points--}}
            {{--bezierCurve: true,--}}
            {{--//Number - Tension of the bezier curve between points--}}
            {{--bezierCurveTension: 0.3,--}}
            {{--//Boolean - Whether to show a dot for each point--}}
            {{--pointDot: false,--}}
            {{--//Number - Radius of each point dot in pixels--}}
            {{--pointDotRadius: 4,--}}
            {{--//Number - Pixel width of point dot stroke--}}
            {{--pointDotStrokeWidth: 1,--}}
            {{--//Number - amount extra to add to the radius to cater for hit detection outside the drawn point--}}
            {{--pointHitDetectionRadius: 20,--}}
            {{--//Boolean - Whether to show a stroke for datasets--}}
            {{--datasetStroke: true,--}}
            {{--//Number - Pixel width of dataset stroke--}}
            {{--datasetStrokeWidth: 2,--}}
            {{--//Boolean - Whether to fill the dataset with a color--}}
            {{--datasetFill: true,--}}
            {{--//String - A legend template--}}
            {{--legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",--}}
          {{--//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container--}}
          {{--maintainAspectRatio: true,--}}
          {{--//Boolean - whether to make the chart responsive to window resizing--}}
          {{--responsive: true--}}
        {{--};--}}

        {{--//Create the line chart--}}
        {{--areaChart.Line(areaChartData, areaChartOptions);--}}
    });


>>>>>>> origin/master
</script>

</body>
</html>