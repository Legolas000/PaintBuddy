<?php $__env->startSection('content'); ?>

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>Shopping cart</li>
                </ul>
            </div>

            <div class="col-md-9" id="basket">

                <div class="box">

                    <form method="post" action="<?php echo e(url('cartUpdate')); ?>">

                        <h1>Shopping cart</h1>

                        <?php $i=0; ?>
                        <?php $total=0; ?>
                        <?php $quantity=0; ?>

                        <div class="table-responsive">
                            <?php if(count($data)): ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Discount</th>
                                        <th colspan="2">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($data as $item): ?>

                                        <?php $i++; ?>

                                            <tr>
                                            <td>
                                                <a href="viewDets.<?php echo e($item['id']); ?>">
                                                    <img src="img/tempEng/<?php echo e($item['imgpath']); ?>" alt="">
                                                </a>
                                            </td>
                                            <td><a href="viewDets.<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></a>
                                            </td>
                                            <td>
                                                <input type="number" name="<?php echo e($item['id']); ?>quantity" value="<?php echo e($item['quantity']); ?>" class="form-control" min="1" max="3">

                                                <?php $quantity = $quantity + $item['quantity']  ?>

                                                <input type="hidden" name="item_id" value="<?php echo e($item['id']); ?>">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            </td>
                                            <td>LKR <?php echo e($item['price']); ?></td>
                                            <td>LKR 0.00</td>

                                            <td><?php $item['price']=$item['price']*$item['quantity'] ?>LKR <?php echo e($item['price']); ?></td>
                                            <td><button class="btn btn-default" type="submit" name="cartDestroy" value="<?php echo e($item['id']); ?>"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>

                                        <?php $total=$total+$item['price']; ?>

                                    <?php endforeach; ?>


                                        <p class="text-muted">You currently have <?php echo e($i); ?>  item(s) in your cart.</p>

                                    <?php else: ?>
                                        <p>You have no items in the shopping cart</p>
                                    <?php endif; ?>

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">LKR <?php echo e($total); ?></th>
                                    </tr>
                                    </tfoot>
                                </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="cat.<?php echo $cat_name; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                <input type="hidden" name="catName" value="<?php echo $cat_name; ?>">
                            </div>
                            <div class="pull-right">

                                <?php /*enabling and disabling buttons*/ ?>

                                <?php if(session()->has('items')): ?>
                                    <button class="btn btn-default" type="submit" name="UpdateCart" value="UpdateCart"><i class="fa fa-refresh"></i> Update basket</button>
                                <?php else: ?>
                                    <button class="btn btn-default disabled" type="submit" name="UpdateCart" value="UpdateCart"><i class="fa fa-refresh"></i> Update basket</button>
                                <?php endif; ?>

                                <?php if(session()->has('items')): ?>
                                    <a href="<?php echo e(url('checkoutCreate')); ?>" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('checkoutCreate')); ?>" class="btn btn-primary disabled">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                                <?php endif; ?>

                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.box -->


                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/487682016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/487682016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/487682016-02-03.jpg.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">LKR 143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/620792016-02-03.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">LKR 143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="#">
                                            <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="#">
                                            <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="invisible">
                                <img src="img/tempEng/650852016-02-03.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">LKR 143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted"><strong class="text-primary">Delivery is FREE </strong>of charge Islanwide.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th name="ordersub">LKR <?php echo e($total); ?></th>

                            <?php
//                                session_start();
                                 //   session_destroy();
                                $_SESSION["subtotal"] = $total;
                            ?>

                            </tr>

                            <tr>
                                <td>Total Quantities</td>
                                <th name="quantities">QTY <?php echo e($quantity); ?></th>

                            <?php
                                $_SESSION["quantities"] = $quantity;
                            ?>

                            </tr>


                            <tr>
                                <td>Delivery charges</td>
                                <th name="delcharge">LKR  0 </th>

                            <?php
                                $_SESSION["del"] = 0;
                            ?>

                            </tr>

                            </tr>

                            <tr>
                                <td>Total</td>
                                <th name="total">LKR <?php echo e($total); ?></th>
                            </tr>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

    <!-- *** FOOTER ***
_________________________________________________________ -->
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>