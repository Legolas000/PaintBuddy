<html>

<body>




        @foreach($data as $datas)

            <li>{{$datas['name']}}</li>


            <li>{{$datas['price']}}</li>



         @endforeach

        <div class="table-responsive">
            @if(count($data))
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
                    @foreach($data as $item)
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{asset('img/product1.jpg')}}" alt="White Blouse Armani">
                                </a>
                            </td>
                            <td><a href="#">{{$item['name']}}</a>
                            </td>
                            <td>
                                <input type="number" value="1" class="form-control">
                            </td>
                            <td>${{$item['price']}}</td>
                            <td>$0.00</td>
                            <td>${{$item->subtotal}}</td>
                            <td><a href="{{url('trash')}}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <p>You have no items in the shopping cart</p>
                    @endif

                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="5">Total</th>
                        <th colspan="2">${{Cart::total()}}</th>
                    </tr>
                    </tfoot>
                </table>

        </div>

</body>

</html>