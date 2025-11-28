<?php
session_start();
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
    die("Your cart is empty");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: rgba(252, 248, 221, 1);
            font-family: 'Oswald', sans-serif;
            color: white;
            padding-bottom: 20px;
        }

        .welcome {
            background-color: rgba(255, 255, 255, 0.05);
            margin: 0 5px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            padding-bottom: 60px;
            margin-top: 20px;
        }

        .heading{
            text-align:center;
        }

        .welcome h1 {
            color: aqua;
            background-color:rgba(0, 0, 0, 0.2);
            border radius:10px;
            font-weight: 700;
            text-align: center;
            padding: 20px 0;
            text-shadow: 0.5px 0.5px 1px rgba(0, 0, 0, 0.5);
            display:inline-block;
            margin:0 auto;
        }

        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            margin: 0 auto 40px;
            width: 600px;
            font-weight: 700;
            font-size: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-size: 16px;
        }

        input,
        select {
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-family: 'Oswald', sans-serif;
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
        textarea{
            height:38px;
            border-radius:5px;
        }
        table {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            margin: 20px auto 50px auto;
            font-family: 'Oswald', sans-serif;
            text-align: center;
            border-collapse: collapse;
            width: 90%;
            max-width: 900px;
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
        .wel h1 {
            color: aqua;
            background-color:rgba(0, 0, 0, 0.2);
            border-radius:10px;
            font-weight: 700;
            text-align: center;
            padding: 20px 0;
            text-shadow: 0.5px 0.5px 1px rgba(0, 0, 0, 0.5);
            margin:0 auto;
            width:fit-content;
        }
    </style>
</head>
<body>
    <div class="wel">
    <h1>Order Summary</h1>
    </div>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        
        <?php
        $total=0;
        foreach($_SESSION['cart'] as $product){
            $subtotal=$product['price'] * $product['quantity'];
            // 'price' 'quantity' are the keys used in cart.php earlier
            // eg: $cart_item=['price'=>$num['price']]; "The left side values(keys) are used here"
            $total=$total+$subtotal;
            echo "<tr>
            <td>{$product['name']}</td>
            <td>{$product['quantity']}</td>
            <td>{$product['price']}</td>
            <td>&#8377;$subtotal</td>
            ";
        }
        ?>
        <tr>
            <th colspan="3" style="text-align:right;">Total:</th>
            <th>&#8377;<?php echo $total;?></th>
        </tr>
    </table>
<div class="main">
    <div class="welcome">
        <div class="heading">
            <h1>Enter your details</h1>
        </div>
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label> 
                    <input type="text" name="address" required>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Contact No.</label>
                    <input type="number" name="phone" required>
                </div>
            </div>
            <div class="form-group">
                <div class="btn">
                    <input type="submit" name="submit" value="Confirm Order">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include 'dbconnect.php';
if(isset($_POST['submit']))
{
    $name=trim($_POST['name']);
    $address=trim($_POST['address']);
    $phone=trim($_POST['phone']);
    if (empty($name) || empty($address) || empty($phone)) {
    echo "<script>alert('All fields must be filled');</script>";
} else {

    $sql="INSERT INTO orders(name,address,phone) 
    VALUES('$name','$address','$phone')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $order_id=mysqli_insert_id($conn);
        //gets the id of last inserted value from my db
        //using this we insert value into order_items.
        foreach($_SESSION['cart'] AS $product){
            $foodid=$product['id'];
            $foodname=$product['name'];
            $quantity=$product['quantity'];
            $price=$product['price'];

            $sqlsession="INSERT INTO order_items (order_id,food_id,price,quantity,food_name)
            VALUES($order_id,$foodid, $price, $quantity,'$foodname')";
            mysqli_query($conn,$sqlsession);
        }
        unset($_SESSION['cart']);

        echo "<script>
        alert('Order successfully placed')
        window.location.href='view_order.php'
        </script>";
    }else{
        echo "<script>
        alert('Error in inserting records')
        </script>";
    }
}
}
?>
</body>
</html>