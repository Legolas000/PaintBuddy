
<html>
<body>
        <?php
//        session_start();
        $products =  session()->get('items');
        ?>

        <?php $i=0; ?>
        <?php $total=0; ?>
        <?php $quantity=0; ?>

        <div class="content">

            <div class="container-fluid" align="right">

                <img src="<?php echo $message->embed('img/logo1.png'); ?>">

            </div>


            <div class="table-responsive">

        @if(count($products))

                    <hr>
                    <h2 align="center" style="color:#262626"> ====== My Order Details ====== </h2>
                    <hr>
                    <table class="table" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" style="color: #a2c8f1">Product</th>
                            <th style="color: #a2c8f1">Quantity</th>
                            <th style="color: #a2c8f1">Unit price</th>
                            <th style="color: #a2c8f1">Discount</th>
                            <th colspan="2" style="color: #a2c8f1">Total</th>
                        </tr>
                    </thead>


                    <tbody>

        @foreach($products as $item)

            <?php $i++; ?>
            <tr>

                <td align="center">
                    {{$item['name']}}
                </td>

                <td>
                    <td align="center">{{ $item['quantity'] }}</td>
                    <?php $quantity = $quantity + $item['quantity']  ?>
                </td>

                <td align="center">LKR {{$item['price']}}</td>

                <td align="center">LKR 0.00</td>

                <td align="center"><?php $item['price']=$item['price']*$item['quantity'] ?>LKR {{$item['price']}}</td>

            </tr>

            <?php $total=$total+$item['price']; ?>
            {{--$i++;--}}
        @endforeach

        @endif

                       </tbody>
                       <tfoot>

                        <tr>
                        </tr>

                        <tr>
                            <th colspan="3" style="font-size: medium">Total</th>
                            <th colspan="2" style="font-size: medium">LKR {{$total}}</th>

                        </tr>
                        </tfoot>
                    </table>

            </div>
            <!-- /.table-responsive -->


            <br>



        <blockquote>
            Once again, many thanks for choosing PaintBuddy.com !
        </blockquote>

        <blockquote>
            Best Wishes,
        </blockquote>

        <blockquote>
            www.paintbuddy.com
        </blockquote>

            <p>*and mention if you have chosen express delivery then additional LKR 450 will be added to this total</p>

        </div>

        <br>


        <p><strong>PaintBuddy Lanka (pvt) Ltd</strong>
             <br>13/25 Duplication Road
             <br>Kollupitiya
             <br>Colombo - 03
             <br>Sri Lanka
             <br>
        <strong>South Asia</strong>
        </p>


</body>
</html>