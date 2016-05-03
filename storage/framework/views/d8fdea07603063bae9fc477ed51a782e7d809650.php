<?php $__env->startSection('content'); ?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <?php foreach( $catDets as $catDetails): ?>
                            <li><a href="#"><?php echo $catDetails->catName; ?></a>
                            </li>
                            <li><?php echo $itDets->itName; ?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>

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

                    <div class="panel panel-default sidebar-menu">
                    </div>

                    <div class="panel panel-default sidebar-menu">
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                <style>
                    .cat-item{
                        background-position: center;
                        background-size: cover;
                    }
                </style>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="img/tempEng/<?php echo $itDets->imName; ?>" alt="" class="img-responsive cat-item" style="width: 980px ; height: 300px">

                                <?php if(session()->has('items')): ?>

                                    <?php foreach($data as $item): ?>

                                        <?php if($item['id'] == $itDets->itID): ?>
                                            <p class="bg-danger">This product already added to the cart </p>
                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">

                                <form method="POST" action="<?php echo e(url('cart')); ?>">

                                    <input type="hidden" name="item_id" value="<?php echo $itDets->itID; ?>">

                                    <?php foreach( $catDets as $catDetails): ?>

                                        <input type="hidden" name="catName" value="<?php echo $catDetails->catName; ?>">

                                    <?php endforeach; ?>

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                    <h1 class="text-center"><?php echo $itDets->itName; ?></h1>
                                    <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                    </p>
                                    <p class="price">LKR <?php echo $itDets->itPrice; ?></p>

                                    <p class="buttons">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </p>

                                </form>
                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="img/tempEng/<?php echo $itDets->imName; ?>" class="thumb" style="width: 120px ; height: 50px">
                                        <img src="img/tempEng/<?php echo $itDets->imName; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/tempEng/<?php echo $itDets->imName; ?>" class="thumb" style="width: 120px ; height: 50px">
                                        <img src="img/tempEng/<?php echo $itDets->imName; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="img/tempEng/<?php echo $itDets->imName; ?>" class="thumb" style="width: 120px ; height: 50px">
                                        <img src="img/tempEng/<?php echo $itDets->imName; ?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                        <h4>Product details</h4>
                        <p><?php echo $itDets->itDescrip; ?></p>
                        <h4>Dimensions</h4>
                        <ul>
                            <li><?php echo $itDets->itSize; ?></li>
                        </ul>

                        <blockquote>
                            <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                            </p>
                        </blockquote>

                        <hr>
                        <div class="social">
                            <h4>Show it to your friends</h4>
                            <p>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-4 col-sm-2">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-1">
                            <div class="">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-2">

                            <?php foreach($itOtherDet as $itOther): ?>

                                <div class="product same-height">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="viewDets.<?php echo $itOther->itID; ?>">
                                                    <img src="img/tempEng/<?php echo $itOther->imName; ?>" class="img-responsive">

                                                </a>
                                                <div class="text">
                                                    <h3><?php echo $itOther->itName; ?></h3>
                                                    <p class="price">LKR <?php echo $itOther->itPrice; ?></p>
                                                </div>
                                            </div>
                                            <div class="back">
                                                <a href="viewDets.<?php echo $itOther->itID; ?>">
                                                    <img src="img/tempEng/<?php echo $itOther->imName; ?>" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="viewDets.<?php echo $itOther->itID; ?>" class="invisible">
                                        <img src="img/tempEng/<?php echo $itOther->imName; ?>" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><?php echo $itOther->itName; ?></h3>
                                        <p class="price">LKR <?php echo $itOther->itPrice; ?></p>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                                        <!-- /.product -->
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-4">

                    </div>
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <!-- /.product -->
                    </div>

                </div>

            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>