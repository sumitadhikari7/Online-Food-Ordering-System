<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Oswald', sans-serif;
            color: black;
            padding-bottom: 20px;
        }
        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: 0 40px;
            width: 200px;
            font-weight: 700;
            font-size: 20px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-size: 16px;
            justify-content:center;
            margin: 0 auto;
        }
        .btn {
            text-align: right;
            margin-top: 15px;
        }

        .btn input[type='submit'] {
            background-color: #00E5FF;
            width: 150px;
            border-radius: 6px;
            border: none;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            font-family: 'Oswald', sans-serif;
            transition: background-color 0.7s ease;
        }

        .btn input[type="submit"]:hover {
            background-color: green;
            color: white;
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
        h2{
            margin-top:70px;
        }
        

    </style>

</head>
<body>
    <h2>Track your Order</h2>
    <form action="view_order.php" method="POST">
        <div class="form-group">
            <label for="name"><input type="text" placeholder="Enter Name" name="name" required></label>
        </div>
        <div class="form-group">
            <label for="phone"><input type="number" placeholder="Enter phone number" name="phone" required></label>
        </div>
        <div class="form-group">
            <div class="btn">
                <input type="submit" name="submit" value="Check Order">
            </div>
        </div>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];

        $sql="SELECT o.id, o.name, o.address, o.order_time, o.status, oi.food_name, oi.quantity,oi.price
        FROM orders o
        JOIN order_items oi ON o.id=oi.order_id
        WHERE o.name='$name' AND o.phone='$phone'";

        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
            ?>
            <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Ordered Time</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            <?php
                if($num>0){       
                while($row=mysqli_fetch_assoc($result))
                {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['order_time']; ?></td>
                    <td><?php echo $row['food_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']*$row['quantity']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php
            }
        }
        else{
            ?>
            <tr>
                <td colspan=7>No orders found</td>
            </tr>;
            <?php
        }
        ?>
        </table>
        <?php
        exit();
    }
    ?>
</body>
</html>