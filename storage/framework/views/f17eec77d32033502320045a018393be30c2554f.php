<?php $__env->startSection('content'); ?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
    _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="#">Painting </a>
                                    <ul>
                                        <li><a href="cat.Acrylic">Acrylic</a>
                                        </li>
                                        <li><a href="cat.AirBrush">Airbrush</a>
                                        </li>
                                        <li><a href="cat.Enamel">Enamel</a>
                                        </li>
                                        <li><a href="cat.Oil">Oil</a>
                                        </li>
                                    </ul>
                                </li>
                                <li >
                                    <a href="#">Sculpture </a>
                                    <ul>
                                        <li><a href="cat.Wood">Wood</a>
                                        </li>
                                        <li><a href="cat.Metal">Metals</a>
                                        </li>
                                        <li><a href="cat.Glass">Glass</a>
                                        </li>
                                        <li><a href="cat.Ceramic">Ceramic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Arts</a>
                                    <ul>
                                        <li><a href="cat.Digital Painting">Digital Painting</a>
                                        </li>
                                        <li><a href="cat.Collages">Collages</a>
                                        </li>
                                        <li><a href="cat.Photo Montage">Photo Montage</a>
                                        </li>
                                        <li><a href="cat.3D Images">3D Images</a>
                                        </li>
                                        <li><a href="cat.Vector">Vector</a>
                                        </li>
                                        <li><a href="cat.Photoshop">Photoshop</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Arts and Crafts</a>
                                    <ul>
                                        <li><a href="#">Paper marbling</a>
                                        </li>
                                        <li><a href="#">Textile Crafts</a>
                                        </li>
                                        <li><a href="#">Decorative Crafts</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Drawing</a>
                                    <ul>
                                        <li><a href="#">Abstract</a>
                                        </li>
                                        <li><a href="#">Fine Art</a>
                                        </li>
                                        <li><a href="#">Pop Art</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>


                <div class="col-md-9">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><?php echo $catName; ?></li>
                    </ul>

                    <div class="box">
                        <h1><?php echo $catName; ?></h1>
                        <p> we offer wide selection of the best products from <?php echo $catName; ?> we have created and these products will amaze you.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>
                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <style>
                        .cat-item{
                            width: 500px;
                            height: 200px;
                            background-position: center;
                            background-size: cover;
                        }
                    </style>



                    <div class="row products">

                        <?php foreach($imDets as $dets): ?>
                            <div class="col-md-4 col-sm-3">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="viewDets.<?php echo $dets->itID; ?>">
                                                    <img src="img/tempEng/<?php echo e($dets->imName); ?>" alt="" class="img-responsive cat-item">
                                                </a>

                                                <?php if(session()->has('items')): ?>

                                                    <?php foreach($data as $item): ?>

                                                        <?php if($item['id'] == $dets->itID): ?>
                                                            <p class="bg-danger">This product already added to the cart </p>
                                                        <?php endif; ?>

                                                    <?php endforeach; ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="back">
                                                <a href="viewDets.<?php echo $dets->itID; ?>">
                                                    <img src="img/tempEng/<?php echo $dets->imName; ?>" alt="" class="img-responsive cat-item">
                                                </a>
                                                <?php if(session()->has('items')): ?>

                                                    <?php foreach($data as $item): ?>

                                                        <?php if($item['id'] == $dets->itID): ?>
                                                            <p class="bg-danger">This product already added to the cart </p>
                                                        <?php endif; ?>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <a href="viewDets.<?php echo $dets->itID; ?>" class="invisible">
                                        <img src="img/tempEng/<?php echo $dets->imName; ?>" alt="" class="img-responsive cat-item">
                                    </a>


                                    <div class="text">
                                        <h3><a href="viewDets.<?php echo $dets->itID; ?>"><?php echo $dets->itName; ?></a></h3>
                                        <p class="price">LKR <?php echo $dets->price; ?></p>
                                        <form method="POST" action="<?php echo e(url('cart')); ?>">
                                            <input type="hidden" name="item_id" value="<?php echo e($dets->itID); ?>">
                                            <input type="hidden" name="catName" value="<?php echo e($catName); ?>">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">


                                            <p class="buttons">
                                                <a href="viewDets.<?php echo $dets->itID; ?>" class="btn btn-default">View detail</a>

                                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>

                                            </p>
                                        </form>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>