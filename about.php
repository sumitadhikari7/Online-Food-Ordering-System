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
        .desc h2{
            font-size:30px;
            margin-bottom:15px;
            color:aqua;
            background-color: rgba(0, 0, 0, 0.1);
        }
        .discover{
            width:500px;
            text-align:justify;
            margin: 30px auto;
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
    </style>
</head>
<body>
    <?php
    include 'navbar.php';
    include 'dbconnect.php';
    ?>
    <section class="desc">
        <h2>About Us</h2>
    </section>
    <section class="discover">
        <p><b>Welcome to FoodZone!</b> At FoodZone, we believe great food has the power to bring people 
            together. Founded with a passion for flavor and a commitment to convenience, FoodZone offers 
            a wide range of freshly prepared meals and beverages delivered straight to your doorstep. Whether 
            you're craving a hearty lunch, a cozy dinner, or a quick snack, our diverse menu has something for everyone.
            What sets us apart is our focus on quality — every dish is made using carefully selected ingredients, hygienically
            prepared by experienced chefs, and packaged with care. We don’t just deliver food; we deliver a complete dining experience
            right at home. From traditional favorites to creative fusion options, FoodZone is where taste meets innovation.
            With fast delivery, friendly service, and affordable pricing, we aim to make your meal moments simple, 
            delicious, and memorable. Your satisfaction is our priority, and we’re constantly evolving to serve you better. 
            Join the FoodZone family today — because good food should never be out of reach.</p>
    </section>
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