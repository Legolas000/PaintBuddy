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
    <br/>
    <div class="row">
        <div clas="col-md-12">
            <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtsTempController@loadDesDets')); ?>'" class="btn btn-success col-md-6" role="button">Designs</button>
            <button type="button" onclick="document.location.href='<?php echo e(action('Artist\ArtsTempController@loadBacDets')); ?>'" class="btn btn-success col-md-6" role="button">Backgrounds</button>
         </div>
    </div>


    <?php /*Update Price Modal below*/ ?>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="pricUpModalTemp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Price</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(array( 'url' => '/upTempPrice','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>


                        <div class="form-group">
                            <label for="iID">ID</label>
                            <input type="text" class="form-control" id="iID" name="iID" readonly>
                        </div>

                        <div class="form-group">
                            <label for="iName">Name</label>
                            <input type="text" class="form-control" id="iName" name="iName" readonly>
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip" data-btn="btn1"></textarea>
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
    <?php /*For adding to backgrounds*/ ?>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="BKitemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Backgrounds</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(array( 'url' => 'aTempBac/add','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <?php /*<div class="form-group">*/ ?>
                            <?php /*<?php if(isset($cats)): ?>*/ ?>
                                <?php /*<?php echo Form::Label('catLabel', 'Category:'); ?>*/ ?>
                                <?php /*<?php echo Form::select('cat_Name', $cats, null, ['class' => 'form-control']); ?>*/ ?>
                            <?php /*<?php endif; ?>*/ ?>
                        <?php /*</div>*/ ?>

                        <div class="form-group">
                            <label for="iName">Background Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for Front</label>
                            <span class="btn btn-default btn-file">Browse <?php echo Form::file('fileFront', null); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for Back </label>
                            <span class="btn btn-default btn-file">Browse <?php echo Form::file('fileBack', null); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Background Price:</label>
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

    <?php /*For adding to designs*/ ?>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade modal-info" id="DEitemModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Designs</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo Form::open(array( 'url' => '/aTempDes/add','class' => 'form','novalidate' => 'novalidate','files' => true)); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                        <div class="form-group">
                            <?php if(isset($cats)): ?>
                                <?php echo Form::Label('catLabel', 'Category:'); ?>

                                <?php echo Form::select('cat_Name', $cats, null, ['class' => 'form-control']); ?>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="iName">Design Name</label>
                            <input type="text" class="form-control" id="iName" name="iName">
                        </div>

                        <div class="form-group">
                            <label for="iDescrip">Description:</label>
                            <textarea class="form-control" rows="5" id="iDescrip" name="iDescrip"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="cFile">Choose file for design</label>
                            <span class="btn btn-default btn-file">Browse <?php echo Form::file('fileDesign', null); ?></span>
                        </div>

                        <div class="form-group">
                            <label for="iPrice">Design Price:</label>
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
            <table class="table table-bordered table-hover" id="aTempTab">
                <thead>
                <tr>
                    <th class="col-md-2 text-center">
                        ID
                    </th>
                    <?php $url = $_SERVER['REQUEST_URI'];?>
                    <?php if($url == '/aTempDes'): ?>
                        <th class="col-md-2 text-center">
                            FileDesign
                        </th>
                    <?php elseif($url == '/aTempBac'): ?>
                        <th class="col-md-2 text-center">
                            FileFront
                        </th>
                        <th class="col-md-2 text-center">
                            FileBack
                        </th>
                    <?php endif; ?>
                    <th class="col-md-2 text-center">
                        Name
                    </th>
                    <th class="col-md-2 text-center">
                        Description
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
                <?php if(isset($items)): ?>
                    <?php foreach($items as $it): ?>
                        <tr>
                            <td class="col-md-2 text-center teOrder">
                                <?php echo $it->id; ?>

                            </td>
                            <?php if($url == '/aTempDes'): ?>
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Designs/<?php echo e($it->fileDesign); ?>"><img src="img/cusTempEng/Designs/<?php echo e($it->fileDesign); ?>" alt="" class="img-responsive" width="100" height="100"></a>
                                </td>
                            <?php elseif($url == '/aTempBac'): ?>
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Background/<?php echo e($it->fileFront); ?>"><img src="img/cusTempEng/Background/<?php echo e($it->fileFront); ?>" alt="" class="img-responsive" width="300" height="200"></a>
                                </td>
                                <td class="col-md-2 text-center td_IML" id ="td_IML">
                                    <a class="image-link" id="Image_Link" href="img/cusTempEng/Background/<?php echo e($it->fileBack); ?>"><img src="img/cusTempEng/Background/<?php echo e($it->fileBack); ?>" alt="" class="img-responsive" width="300" height="200"></a>
                                </td>
                            <?php endif; ?>
                            <td class="col-md-2 text-center teOrder">
                                <?php echo $it->name; ?>

                            </td>
                            <td class="col-md-2 text-center teOrder">
                                <?php echo $it->description; ?>

                            </td>
                            <td class="col-md-2 text-center teOrder">
                                <?php echo $it->price; ?>

                            </td>
                            <td class="col-md-1 text-center">
                                <a href="javascript:void(0);" class="btn btn-danger btn-block" role="button" onclick="return confirmRemTemp(<?php echo $it->id; ?>);">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <!-- Trigger the modal for adding templates with a button -->
            <div class="col-lg-12">
                <?php $url = $_SERVER['REQUEST_URI'];?>
                <?php if($url == '/aTempDes'): ?>
                    <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#DEitemModal">Add Item</button>
                <?php elseif($url == '/aTempBac'): ?>
                    <button type="button" class="btn btn-info btn-lg col-lg-12" data-toggle="modal" data-target="#BKitemModal">Add Item</button>
                <?php endif; ?>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.Artist.artMainTemp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>