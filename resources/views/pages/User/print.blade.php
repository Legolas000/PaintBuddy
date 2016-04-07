<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 3px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .center {
            margin: auto;
            width: 100%;
            border: 3px solid #73AD21;
            padding: 10px;}
    </style>


<div class="center">
<h1>PaintBuddy</h1>


<p>
<table>

        <div class="table-responsive">
            <table class="table table-hover">

                <tr>
                    <th>Image</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Ordered Date</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
                    <tbody>
                        @foreach ($results as $item)
                           <tr>
                               <td><img src="img/tempEng/{{ $item->imName }}" style="width:100px;height:100px"/></td>
                               <td> {{ $item->itID }}</td>
                               <td> {{ $item->itName }}</td>
                               <td> {{ $item->ordDate }}</td>
                               <td> {{ $item->itDescrip }}</td>
                               <td> {{ $item->price }} LKR</td>
                               <td> {{ $item->qty }}</td>
                               <td> {{ $item->status }}</td>
                           </tr>
                        @endforeach
                    </tbody>

    </table>
            <p>


            @if (Auth::check())
                <b>Ordered By : </b> <?php echo Auth::user()->name;?>
            @endif
</div>

</html>

