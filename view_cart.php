<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['removeid'])){
    $removeid=$_POST['removeid'];

    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key=>$item){
            // $key is the position (like 0, 1, 2...)
            // $item is the actual product (an array with id, name, price, etc.)

            if($item['id']==$removeid){
                //what these two do? loops through eash key and removes as soon as the id matches.
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                // Rebuild the cart array so that keys are reindexed (0,1,2...).
                break;
            }
        }
    }
    header('Location:view_cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
            font-family: 'Oswald', sans-serif;
        }
        .cart-item{
            background-color: rgba(252, 248, 221, 0.5);
            border-radius:10px;
            margin:10px 10px;
            display:flex;
            gap:20px;
            padding:10px;
            align-items:center;
        }
        img{
            height:100px;
            width:100px;
        }
        .btn a{
            text-decoration:none;
            background-color:green;
            border-radius:10px;
            padding:5px 10px;
            color:white;
            font-weight:bold;
            transition: background-color 0.3s ease;
        }
        .btn a:hover{
            background-color:aqua;
            color:black;
        }
        h2{
            margin-top:70px;
        }
    </style>
</head>
<body>
    <h2>Your Cart</h2>

    <?php
    $total=0;
    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
        //checks if cart is initialized and there is atleast 1 item
        foreach($_SESSION['cart'] as $product){
            $subtotal=$product['price'] * $product['quantity'];
            // 'price' 'quantity' are the keys used in cart.php earlier
            // eg: $cart_item=['price'=>$num['price']]; "The left side values(keys) are used here"
            $total=$total+$subtotal;
        ?>
            <div class="cart-item">
                <img src="admin/<?php echo $product['photo'];?>" alt="">
                <div class="info">
                    <h3><?php echo $product['name'];?></h3>
                    <p>Price: &#8377;<?php echo $product['price'];?></p>
                    <p>Quantity: <?php echo $product['quantity'];?></p>
                    <p>Subtotal: &#8377;<?php echo $subtotal;?></p>
                    <form method="POST">
                        <input type="hidden" name="removeid" value="<?php echo $product['id'];?>">
                        <button type="submit">Remove</button>
                    </form>
                </div>
            </div>

            <?php
        }
        echo "<h3>Total: &#8377;$total</h3>";
        
    }else{
        echo "<p> Your cart is empty</p>";
    }
    ?>
    <div class="btn">
        <a href="order_form.php">Place Order</a>
    </div>
    
</body>
</html>