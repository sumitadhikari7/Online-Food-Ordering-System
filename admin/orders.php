<?php
include '../dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status = '$status' WHERE id = $order_id";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oswald', sans-serif;
        }
        table {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            margin: 35px auto 50px auto;
            font-family: 'Oswald', sans-serif;
            text-align: center;
            border-collapse: collapse;
            width: 90%;
            max-width: 900px;
            color:white;
        }

        table th {
            background-color: red;
            padding: 10px;
        }

        table td {
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: rgba(90, 10, 249, 0.2);
        }
        select{
            background-color:green;
            border-radius:10px;
            color:white;
            padding:3px;
        }
    </style>
</head>
<body>
    <?php
    include '../dbconnect.php';
    include 'navbar.php';
    ?>
    <section class="disc">
        <h1>Ordered Items</h1>
    </section>
    <?php
    $sql="SELECT o.*,order_items.food_name,order_items.quantity,order_items.price
    FROM orders o
    JOIN order_items on order_items.order_id=o.id";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    ?>
    <table border=1>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Order Time</th>
            <th>Food</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    <?php

    if($num>0){
        while($row=mysqli_fetch_assoc($result))
        {
    ?>
    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['order_time']; ?></td>
    <td><?php echo $row['food_name']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['price']*$row['quantity']; ?></td>
    <td>
        <form action="" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
            <select name="status" onchange="this.form.submit()">
                <option value="pending" <?php if($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                <option value="processing" <?php if($row['status'] == 'processing') echo 'selected'; ?>>Processing</option>
                <option value="completed" <?php if($row['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                <option value="cancelled" <?php if($row['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
            </select>
        </form>
    </td>
</tr>

<?php
    
     }
}
else{
    echo '<tr><td colspan=8>No orders found</td></tr>';
}
?>
</table>
</body>
</html>