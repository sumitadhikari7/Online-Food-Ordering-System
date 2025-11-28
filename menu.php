<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
            font-family: 'Oswald', sans-serif;
        }
        .desc{
            text-align: center;
            padding: 6rem 0;
            background: url('https://img.freepik.com/premium-photo/rustic-wood-restaurant-background_87720-46308.jpg');
            background-repeat: no-repeat;
            background-position:center center;
            background-size:cover;
            color: white;
            left:0;
            }
        .item{
            background-color: rgba(252, 248, 221, 0.5);
            border-radius:10px;
            margin:10px 10px;
            display:flex;
            gap:20px;
            padding:10px;
        }
        img{
            height:100px;
            width:100px;
        }
        input[type='submit']{
            background-color: aqua;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
            transition: background-color 0.9s ease;
        }
        input[type='submit']:hover{
            background-color: red;
            color:white;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
        }
        .footer{
            background-color: rgba(252, 248, 221, 0.5);
        }
        .fcontent{
            display:flex;
            margin: 10px 30px;
        }
        .fbox{
            display:flex;
            flex-direction:column;
            flex:1;
        }
        .fbox h3{
            color:red;
        }
        .scontent{
            display:flex;
            justify-content: flex-end;
            gap:150px;
            width: 45%;
        }
        .copy{
            text-align:center;
        }
        .fbox a{
            text-decoration:none;
            color:green;
        }
        .fbox a:hover{
            color:blue;
        }
        h2{
            color:aqua;
        }
        
        .item {
            transition: transform 0.3s ease;
        }

        .item:hover {
            transform: scale(1.02);
        }
        

    </style>
</head>
<body>
    <?php
    include 'dbconnect.php';
    include 'navbar.php'; 
    ?>
    <section class="desc">
        <h2>Menu Items</h2>
    </section>
    <?php

    $sql="SELECT * FROM foods";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num>0){
        while($row = mysqli_fetch_assoc($result))
        {
    ?>
    <div class="item">
        <img src="admin/<?php echo $row['photo'];?>" alt="">
        <div class="details">
            <h3><?php echo $row['name'];?></h3>
            <?php
            $statuscolor= $row['availability']== 'available' ? 'green':'red';
            ?>
            Status: <strong style="color:<?php echo $statuscolor?>"><?php echo $row['availability'];?></strong>
            <p><?php echo $row['description'];?></p>
            <div class="price">
                <h4>&#8377; <?php echo $row['price'];?></h4>
            </div>
            <form action="cart.php" method="POST">
                <input type="hidden" name="food_id" value="<?php echo $row['id'];?>">
                <input type="number" name="quantity" min="1" max="10" required>
                <input type="submit" value="Add to Cart" <?php if ($row['availability']=='not available') echo 'disabled';?>>
            </form>
        </div>
    </div>

    </div>

    <?php
        }
    }
    ?>
    <footer class="footer">
        <div class="fcontent">
            <div class="fbox">
            <h3>FoodZone</h3>
            <p>Fast and Fresh Delicious Meals</p>
        </div>
            <div class="scontent">
                <div class="fbox">
                    <h3>Location</h3>
                    <p>Kathmandu, Nepal</p>
                    <p>Email: foodzone@gmail.com</p>
                    <p>Phone: +977-1233456789</p>
                </div>
                <div class="fbox">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>
        </div>
        </div>
        <div class="copy">
            <p>&copy; 2025 FoodZone. All rights reserved</p>
        </div>
    </footer>
</body>
</html>