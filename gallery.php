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
        .category img{
            width: 100%;
            height:120px;
            object-fit:cover;
        }
        .gallery{
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        .category{
            margin:10px;
            width:300px;
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
    ?>
    <section class="desc">
        <h2>Gallery</h2>
    </section>
    <section class="gallery">
            <div class="category">
                <h2>Starters</h2>
                <img src="gallery/chicken wings.jpg" alt="Starters" title="Chicken Wings">
                <img src="gallery/momo.jpg" alt="Starters" title="Momo">
            </div>
            <div class="category">
                <h2>Main Course</h2>
                <img src="gallery/grilled chicken.jpg" alt="Main Course" title="Grilled Chicken">
                <img src="gallery/fried rice.jpg" alt="Main Course" title="Fried Rice">
            </div>
            <div class="category">
                <h2>Desserts</h2>
                <img src="gallery/chocolate brownie.jpg" alt="Desserts" title="Chocolate Brownie">
                <img src="gallery/cheese cake.jpg" alt="Desserts" title="Cheese Cake">
            </div>
            <div class="category">
                <h2>Beverages</h2>
                <img src="gallery/fresh lemonade.jpg" alt="Beverages" title="Fresh Lemonade">
                <img src="gallery/coffee.jpg" alt="Beverages" title="Coffee">
            </div>
            <div class="category">
                <h2>Specials</h2>
                <img src="gallery/biryani.jpg" alt="Specials" title="Biryani">
                <img src="gallery/pizza.jpg" alt="Specials" title="Special Pizza">
            </div>
        </div>
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