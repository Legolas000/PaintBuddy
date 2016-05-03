<?php $__env->startSection('ArtContent'); ?>

    <?php /*Style for browse file bootstrap style*/ ?>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>

    <?php /*Update Price Modal below*/ ?>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="pricUpModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Price</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(array( 'url' => 'upDatePrice','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>


                        <div class="form-group">
                            <label for="iName">Item Name</label>
                            <input type="text" class="form-control" id="iName" name="iName" readonly>
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip" data-btn="btn1"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="iSize">Item Size:</label>
                            <input type="text" class="form-control" id="iSize" name="iSize" disabled>
                        </div>

                        <div class="form-group">
                            <label for="uiStk">Update stock by:</label>
                            <input type="number" class="form-control" id="uiStk"  name="uiStk">
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Item Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            <button type="submit" id = "upPBtn" class="btn btn-danger send-btn center-block" disabled = "" style="align-self: center">Update</button>
                        </div>

                        <?php echo Form::close(); ?>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php /*Add item Modal below*/ ?>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="itemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Items</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(array( 'url' => 'aitem/add','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <div class="form-group">
                            <?php if(isset($cats)): ?>
                                <?php echo Form::Label('catLabel', 'Category:'); ?>

                                <?php echo Form::select('cat_Name', $cats, null, ['class' => 'form-control']); ?>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="iName">Item Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose File</label>
                            <span class="btn btn-default btn-file">Browse <?php echo Form::file('image', null); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="iSize">Item Size:</label>
                            <input type="text" class="form-control" id="iSize" name="iSize">
                        </div>

                        <div class="form-group">
                            <label for="aiStk">Item availabe stock:</label>
                            <input type="number" class="form-control" id="aiStk"  name="aiStk">
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Item Price:</label>
                            <input type="text" class="form-control" id="iPrice" name="iPrice">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger send-btn center-block" style="align-self: center">Add</button>
                        </div>

                        <?php echo Form::close(); ?>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br/>

<?php /*Table Informations*/ ?>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover" id="aItemTab">
            <thead>
                <tr>
                    <th class="col-md-2 text-center">
                        Images
                    </th>
                    <th class="col-md-2 text-center">
                        Category
                    </th>
                    <th class="col-md-2 text-center">
                        Item Name
                    </th>
                    <th class="col-md-2 text-center">
                        Item Description
                    </th>
                    <th class="col-md-2 text-center">
                        Item Size
                    </th>
                    <th class="col-md-2 text-center">
                        Available quantity
                    </th>
                    <th class="col-md-2 text-center">
                        Price
                    </th>
                    <th class="col-md-2 text-center">
                        Update
                    </th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($items as $it): ?>
                <tr>
                    <td class="col-md-2 text-center td_IML" id ="td_IML">
                       <a class="image-link" id="Image_Link" href="img/tempEng/<?php echo e($it->imName); ?>"><img src="img/tempEng/<?php echo e($it->imName); ?>" alt="" class="img-responsive" width="300" height="200"></a>
                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->catRef; ?>

                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->itName; ?>

                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->itDescrip; ?>

                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->itSize; ?>

                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->avqty; ?>

                    </td>
                    <td class="col-md-2 text-center dbOrder">
                        <?php echo $it->price; ?>

                    </td>
                    <td class="col-md-1 text-center">
                    <a href="javascript:void(0);" class="btn btn-danger btn-block" role="button" onclick="return confirmRemItem(<?php echo $it->itID; ?>);">Remove</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Trigger the modal for adding templates with a button -->
        <div class="col-lg-12">
            <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#itemModal">Add Item</button>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.Artist.artMainTemp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>