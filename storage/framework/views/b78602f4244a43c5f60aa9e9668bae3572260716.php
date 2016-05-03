<?php $__env->startSection('ArtContent'); ?>

    <!-- jQuery Version 1.11 required for FullCalendar to function properly -->
    <script src="js/jquery.1.11.min.js"></script>

<br/>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders Calendar</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="calendar">
                        <?php echo $calendar->calendar(); ?>

                        <?php echo $calendar->script(); ?>

                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Orders Table</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="artOrdersTable">
                        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtsOrdersController@ViewAOrders')); ?>'" class="btn btn-info col-md-4" role="button">All Orders</button>
                        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtsOrdersController@ViewCOrders')); ?>'" class="btn btn-info col-md-4" role="button">Completed Orders</button>
                        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtsOrdersController@ViewOOrders')); ?>'" class="btn btn-info col-md-4" role="button">Ongoing Orders</button>
                        <br/><br/>
                        <table  class="table table-bordered table-hover" id="artOrdersTab">
                            <thead>
                            <tr>
                                <th class="col-md-2 text-center">
                                    Order ID
                                </th>
                                <th class="col-md-2 text-center">
                                    Ordered Date
                                </th>
                                <th class="col-md-2 text-center">
                                    Due Date
                                </th>
                                <th class="col-md-2 text-center">
                                    Status
                                </th>
                                <?php $url = $_SERVER['REQUEST_URI'];?>
                                <?php if($url != '/ArtMainOrdersC'): ?>
                                    <th class="col-md-2 text-center">Update</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach($order as $ord): ?>
                                <?php $cond = "";
                                $extra="";?>
                                <?php if($ord->status == 'Completed'): ?>
                                    <?php $cond = "success";
                                    if($url == '/ArtMainOrdersC')
                                        $extra="";
                                    else
                                        $extra="<td></td>";?>
                                <?php elseif($ord->status == 'Ongoing'): ?>
                                    <?php $cond = "danger";
                                    $extra="<td class=\"col-md-1 text-center\"><a href='javascript:void(0);' class='btn btn-default btn-block' role='button' onclick='return confirmComOrd($ord->ordID);'>Done</a></td>
                                            ";?>
                                <?php endif; ?>
                                <tr class =<?php echo $cond; ?>>
                                    <td class="col-md-2 text-center artOrdRe">
                                        <?php echo $ord['ordID']; ?>

                                    </td>
                                    <td class="col-md-2 text-center artOrdRe">
                                        <?php echo $ord['ordDate']; ?>

                                    </td>
                                    <td class="col-md-2 text-center artOrdRe">
                                        <?php echo $ord['DueDate']; ?>

                                    </td>
                                    <td class="col-md-2 text-center artOrdRe">
                                        <?php echo $ord['status']; ?>

                                    </td>
                                    <?php echo $extra; ?>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Colour Definition</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <button type="button" class="btn btn-default col-sm-12" style="background-color: #00a65a; color: #d6d6d6; font-family:'sans-serif';">Completed</button></br>
                    <button type="button" class="btn btn-default col-sm-12" style="background-color: #f39c12; color: #d6d6d6; font-family:'sans-serif';">Passed delivery Date</button></br>
                    <button type="button" class="btn btn-default col-sm-12" style="background-color: #f56954; color: #d6d6d6; font-family:'sans-serif';">Close to due date</button></br>
                    <button type="button" class="btn btn-default col-sm-12" style="background-color: #00c0ef; color: #d6d6d6; font-family:'sans-serif';">Ongoing</button>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.Artist.artMainTemp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>