<?php
include 'dbconnect.php';
include 'navbar.php';
?>
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
    <script src="https://kit.fontawesome.com/4ebcf5dd54.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
            font-family: 'Oswald', sans-serif;
        }

        .contact label {
            padding-left: 15px;
        }

        i {
            font-size: 25px;
        }

        #a {
            margin-top: 35px;
        }
        .contact{
            font-size:15px;
        }
        .form input {
            height: 40px;
            width: 300px;
            margin-bottom: 10px;

        }

        button i {
            font-size: 12px;
        }

        button {
            padding: 10px;
        }

        .social i {
            color: black;
            margin-top: 25px;
        }

        .contact i {
            margin-right: 2px;
        }
        .main{
            margin-left: 10px;
        }
        #c{
            margin-top:70px;
            color:red;
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
    <div class="main">
        <h2 id="c">Contact Us<h2>
        <div class="contact">
            <i class="fa-solid fa-location-dot"></i> <label for="ktm">Kathmandu, Nepal</label> <br><br>
            <i class="fa-solid fa-phone"></i> <label for="phn">Phone: +977-9818385754</label> <br><br>
            <i class="fa-solid fa-envelope"></i> <label for="mail">Email: sumitadhikari972@gmail.com</label>
        </div>
        <form action="" method="POST">
        <div class="form">
            <p id="a">Send Us Messages</p>
            <label for="Name">
                <input type="text" name="name" id="name" placeholder="Name" required>
            </label> <br>
            <label for="email">
                <input type="email" name="email" id="email" placeholder="Email" required>
            </label> <br>
            <label for="Subject">
                <input type="text" name="sub" id="sub" placeholder="Subject" required>
            </label> <br>
            <label for="Message">
                <input type="text" name="message" id="message" placeholder="Message" required>
            </label>
            <br>
            <button type="submit" name="submit"><i class="fa-solid fa-paper-plane"></i> SEND MESSAGE</button>
            <br><br>
            </form>
            <div class="social">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-square-instagram"></i>
                <i class="fa-brands fa-square-snapchat"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-square-pinterest"></i>
            </div>
        </div>
    </div>
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
    <?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['sub'];
        $message=$_POST['message'];

        $sql = "INSERT INTO contact (name, email, subject, message) 
        VALUES ('$name', '$email', '$subject', '$message')";

        $result=mysqli_query($conn,$sql);

        if($result){
            echo "<script>
        alert('Message successfully sent')
        window.location.href='index.php'
        </script>";
    }else{
        echo "<script>
        alert('Error in inserting records')
        </script>";
    }
        }
    ?>
</body>

</html>