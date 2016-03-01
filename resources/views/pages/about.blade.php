

        <html>

        <body>

                    @foreach($products as $product)
                        <article>

                        <li><a href="#">{{$product->name}}</a></li>

                        </article>
                    @endforeach

        </body>
        </html>