<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
</head>

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .center {
            margin: auto;
            width: 100%;
            border: 3px solid #73AD21;
            padding: 10px;}
    </style>

<body>
<div class="center">
<h1>PaintBuddy</h1>
<p>


    <img src="images/<?php echo $img ?>" style="width:228px;height:228px"/>

    <table >

        <p>
        <tr>
            <th>Ordered by</th><td><?php echo $cname ?></td>
        </tr>

        <tr>
            <th>Item ID</th><td>#<?php echo $id ?></td>
        </tr>
        <tr>
            <th>Item Name</th><td><?php echo $name ?></td>
        </tr>
        <tr>
            <th>Description</th><td><?php echo $desc ?></td>
        </tr>
        <tr>
            <th>Price</th><td><?php echo $price ?></td>
        </tr>
        <tr>
            <th>Quantity</th><td><?php echo $qty ?></td>
        </tr>
        <tr>
            <th>Ordered date</th><td><?php echo $date ?></td>
        </tr>
        <tr>
            <th>Status</th><td><?php echo $status ?></td>
        </tr>

    </table>

</div>
</body>
</html>