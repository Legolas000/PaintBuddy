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

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

    <!-- LobiBox -->
    <link rel="stylesheet" href="css/Lobibox.min.css"/>

    <!-- Cursor for datatables -->
    <style>
        #aItemTab tr,
        #artOrdersTab tr,
        #asDateTab tr,
        #custDetsTab tr,
        #aTempTab tr{
            cursor: pointer;
        }
    </style>

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
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?php if(isset($dDateArr) && count($dDateArr)>0): ?> <?php echo count($dDateArr); ?> <?php endif; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?php if(isset($dDateArr)): ?> <?php echo count($dDateArr); ?> <?php else: ?> 0 <?php endif; ?> notifications.</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php if(isset($dDateArr)): ?>
                                        <?php foreach($dDateArr as $dets): ?>
                                            <?php if(isset($dets['dLineIDs'])): ?>
                                                <li>
                                                    <a href="/viewOrDets=<?php echo $dets['dLineIDs']; ?>">
                                                        <i class="fa fa-warning text-yellow"></i>The Order ID <?php echo $dets['dLineIDs']; ?> is reaching the deadline.
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(isset($dets['passIDs'])): ?>
                                                <li>
                                                    <a href="/viewOrDets=<?php echo $dets['passIDs']; ?>">
                                                        <i class="fa fa-users text-red"></i> The Order ID <?php echo $dets['passIDs']; ?> has passed the deadline.
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
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
                <?php if($url == '/ArtMainOrdersC'): ?>
                    <?php echo $act1='active'; ?>

                <?php endif; ?>

                <li><a href="/dboard"><i class="fa fa-laptop"></i> <span>DashBoard</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa  fa-folder-open"></i> <span>Product Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/aitem"><i class="fa fa-circle-o"></i> <span>Items</span></a></li>
                        <li class="active"><a href="/aTempDes"><i class="fa fa-circle-o"></i> <span>Templates</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-share"></i> <span>Order Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/ArtMainOrders"><i class="fa fa-circle-o"></i> <span>View Orders</span></a></li>
                        <li class="active"><a href="/ArtAsDead"><i class="fa fa-circle-o"></i> <span>Assign Deadlines</span></a></li>
                    </ul>
                </li>
                <li><a href="/artRep"><i class="fa fa-briefcase"></i> <span>Reports</span></a></li>
                <li><a href="/artPView"><i class="fa fa-book"></i> <span>View Count</span></a></li>
                <li><a href="/gUsrDetsA"><i class="glyphicon glyphicon-user"></i> <span>User Details</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-envelope"></i> <span>Mailbox</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/getMailBox.type=1"><i class="fa fa-circle-o"></i> <span>Inbox</span></a></li>
                        <li class="active"><a href="/getMailBox.type=2"><i class="fa fa-circle-o"></i> <span>Sent Mail</span></a></li>
                    </ul>
                </li>
                <li><a href="/getsPage"><i class="glyphicon glyphicon-console"></i> <span>Settings</span></a></li>
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
            <?php echo $__env->yieldContent('ArtContent'); ?>
            <!-- Your Page Content Here -->

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


<?php /*Full calandar event details modal*/ ?>

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
                <div id = "getOrdModBtn" class="pull-left" ></div>
            </div>
        </div>
    </div>
</div>


<?php /*Email from orders modal*/ ?>
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
                                <?php echo Form::open(array( 'url' => '/cMail','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>

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
                                            <?php echo Form::file('file', null); ?>

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
                            <?php echo Form::close(); ?>

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


<!-- REQUIRED JS SCRIPTS -->

<!-- Other required jQuery scripts included here -->
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- FullCalendar 2.6.0 -->
<script src='js/jquery-ui.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="js/jquery.magnific-popup.js"></script>

<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>

<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>


<!-- {LobiBox} jQuery Files + Laravel Scripts -->
<script src="js/Lobibox.min.js"></script>
<script src="js/messageboxes.min.js"></script>
<script src="js/notifications.min.js"></script>
<?php if(Session::has('success')): ?>
    <script>
        var txt = "<?php echo Session::get('message', ''); ?>";
        Lobibox.alert('success', {
            msg: txt
        });
    </script>
<?php elseif(count($errors) > 0): ?>
    <?php
    $ext="";
    foreach ($errors->all() as $error){
        $ext .=  "<li>". $error ."</li>";
    }
    ?>
    <script>
        var txt = "<ul>";
        txt +='<?php echo $ext; ?>';
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
<?php endif; ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->

<!-- Page Script -->
<script type="text/javascript" src="js/ArtistMainScript.js"></script>

<!-- Ajax Scripts to load graphs -->
<script  type="text/javascript">
    jQuery(window).load(function() {
        $(document).ready(function () {
            $.ajax({
                url: "/retColData",
                data: {_token: "<?php echo csrf_token(); ?>"},
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
                data: {_token: "<?php echo csrf_token(); ?>"},
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
</script>

</body>
</html>