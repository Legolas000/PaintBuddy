<?php $__env->startSection('ArtContent'); ?>


<br/>
<div class="row">
    <div clas="col-md-12">
        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtUserDetsController@getActiveUsrDets')); ?>'" class="btn btn-success col-md-3" role="button">Active Users</button>
        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtUserDetsController@getInActiveUsrDets')); ?>'" class="btn btn-success col-md-3" role="button">InActive Users</button>
        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtUserDetsController@getAdminUsrDets')); ?>'" class="btn btn-success col-md-3" role="button">Administrators</button>
        <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtUserDetsController@getCustUsrDets')); ?>'" class="btn btn-success col-md-3" role="button">Customers</button>
    </div>
</div>

<br/><br/>
<?php /*Table Informations*/ ?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover" id="CusrTab">
            <thead>
            <tr>
                <th class="col-md-2 text-center">
                    First Name
                </th>
                <th class="col-md-2 text-center">
                    Last Name
                </th>
                <th class="col-md-2 text-center">
                    E-Mail
                </th>
                <th class="col-md-2 text-center">
                    Address
                </th>
                <th class="col-md-2 text-center">
                    City
                </th>
                <th class="col-md-2 text-center">
                    State
                </th>
                <th class="col-md-2 text-center">
                    Phone Number
                </th>
                <th class="col-md-2 text-center">
                    Created at
                </th>
                <th class="col-md-2 text-center">
                    Updated At
                </th>
                <th class="col-md-2 text-center">
                    Role
                </th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($usrDets as $dets): ?>
                <tr class="success">
                    <td class="col-md-2 text-center">
                        <?php echo $dets->name; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->lname; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->email; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->address; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->city; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->state; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->PhoneNo; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->created_at; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->updated_at; ?>

                    </td>
                    <td class="col-md-2 text-center">
                        <?php echo $dets->role; ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.Artist.artMainTemp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>