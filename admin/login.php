<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            background-image: url('https://img.freepik.com/premium-photo/romantic-restaurant-sunset_896558-4719.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }


        .main {
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            gap: 40px;
            padding: 100px 0;
            border: 2px solid white;
            height: 100px;
            width: 600px;
            margin: 150px 320px;
            background-color: rgba(0, 0, 0, 0.8);
       }

        input {
            width: 250px;
            height: 30px;
            margin-bottom: 20px;
        }

        input[type=submit] {
            background-color: blue;
            color: white;
            cursor: pointer;
            border: none;
        }

        .left {
            background-image: url(chef.png);
            background-size: cover;
            background-position: center;
            text-align: center;
            width: 500px;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: black;
            text-shadow: 0.5px 0.5px 1px rgba(255, 255, 255, 0.5);
        }

        .left p {
            padding: 0 15px;
            font-family: "Ubuntu", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .left h3 {
            margin-bottom: 2px;
            font-family: 'Oswald', sans-serif;
            font-size: 37px;

        }

        .right {
            color: white;
            padding-right: 20px;
        }

        .right h2 {
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            font-style: normal;

        }
        .right select{
            background-color:aqua;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            height:30px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
    <div class="main">
        <div class="left">
        </div>
        <div class="right">
            <h2>LOGIN</h2>
            <br>
            <label for="user"><input type="text" id="user" name="User" placeholder="Username"></label> <br>
            <label for="password"> <input type="password" id="password" name="Password" placeholder="Password"></label>
            <br>
            <input type="submit" value="Login" name="Login">
            <br>
        </div>
    </div>
    </form>
<?php
    session_start();
    include '../dbconnect.php';

    if(isset($_POST['Login'])){
        $user=$_POST['User'];
        $password=md5($_POST['Password']);

        $sql="SELECT * FROM credentials WHERE username='$user' and password='$password'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row){

            $_SESSION['username']=$user;
            header("Location:index.php");
            exit;
        }else{
            echo"<script>alert('Invalid credentials')
            </script>";
        }
    }
        
?>

</body>

</html>