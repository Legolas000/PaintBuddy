<?php $__env->startSection('ArtContent'); ?>

    <br/>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Radar Chart</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="pViewChart" style="height:250px"></canvas>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Item View Count</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <div class="box-body">
                <table class="table table-bordered table-hover" id="aPageView">
                    <thead>
                    <tr>
                        <th class="col-md-2 text-center">
                            Item Name
                        </th>
                        <th class="col-md-2 text-center">
                            View Count
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php foreach($countDets as $it): ?>
                            <tr>
                                <td class="col-md-2 text-center dbOrder">
                                    <?php echo $it->PageName; ?>

                                </td>
                                <td class="col-md-2 text-center dbOrder">
                                    <?php echo $it->PageCount; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
            </div>
        </div>

    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.Artist.artMainTemp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>