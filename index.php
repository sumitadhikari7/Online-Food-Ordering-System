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
      background: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092');
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
    .desc p{
      background-color: rgba(0, 0, 0, 0.1);
      width: 250px;
      display:inline-block;
      text-align:center;
      justify-content:center;
      font-weight:bold;
      color:red;
    }
    .discover a {
      display: block;
    }
    .left-dis{
      display:flex;
      flex-direction:column;
      margin:0 30px;
    }
    .left-dis a{
      background-color: green;
      text-decoration:none;
      color:white;
      width:100px;
      text-align:center;
      transition: background-color 0.3s ease;
      font-weight:bold;
      height:30px;
      align-content:center;
      border-radius:10px;
    }
    .left-dis a:hover{
      background-color:aqua;
      color:black;
    }
    .reviews{
      margin:0 10px;
      text-align: center;
      gap:10px
    }
    .reviews h2{
      margin:bottom:10px;
      font-size:35px;
      color:red;
    }
    .rcontainer{
      display:flex;
      gap:50px;
      width:800px;
      align-items:center;
      justify-content:center;
      margin: 0 auto;
    }
    .review{
      background-color: rgba(252, 248, 221, 0.5);
      height:150px;
      border-radius:30px;
      padding-top:20px;
    }
    .poster {
        display: flex;
        gap: 10px;
        margin:10px 30px 0 10px;
      }

    .poster img {
        height: 300px;
        width: 250px;
      }

    .discover{
      display:flex;
      background-color:pink;
    }
    .left-dis{
      display:flex;
      flex:1;
    }
    #img-1{
      height:400px;
      width:350px;
    }
    .left-dis h2{
      font-size:50px;
      color:red;
    }
    .scol{
      display:flex;
      flex-direction:column;
      gap:10px;
      width:250px;
      padding-bottom:10px;
    }
    .fcol{
      width:350px;
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
    <h2>Delicious Food delivered to your door!</h2>
    <p>Order now and enjoy your meal</p>
  </section>
  <section class="discover">
    <div class="left-dis">
      <h2>Discover Great Meals <br> and Beverages.</h2>
      <a href="menu.php">Check Menu</a>
    </div>
    <div class="poster">
      <div class="fcol">
        <img src="uploads/1.jpg" alt="Image 1" id="img-1">
      </div>
      <div class="scol">
        <img src="uploads/2.jpg" alt="Image 2">
        <img src="uploads/3.jpg" alt="Image 3">
      </div>
    </div>
  </section>
  <section class="reviews">
  <h2>Customer Reviews</h2>
  <div class="rcontainer">
    <div class="review">
      <h4>Cristiano Ronaldo</h4>
      <p>The food was absolutely delicious and the delivery was super quick!</p>
    </div>
    <div class="review">
      <h4>Vinicius Jr.</h4>
      <p>Great service and really tasty dishes. Will order again!</p>
    </div>
    <div class="review">
      <h4>Arda Guler</h4>
      <p>Loved the presentation and the flavors were amazing. 5 stars.</p>
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