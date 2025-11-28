<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}
include '../dbconnect.php';

$totalorders= $conn->query("SELECT COUNT(*) AS total from orders")->fetch_assoc()['total'];
$pending=$conn->query("SELECT COUNT(*) AS total from orders where status='pending'")->fetch_assoc()['total'];
$processing=$conn->query("SELECT COUNT(*) AS total from orders where status='processing'")->fetch_assoc()['total'];
$completed=$conn->query("SELECT COUNT(*) AS total from orders where status='completed'")->fetch_assoc()['total'];
$cancel=$conn->query("SELECT COUNT(*) AS total from orders where status='cancelled'")->fetch_assoc()['total'];

$conn->close();

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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Oswald', sans-serif;
        }
        body {
            background-image: url(https://img.freepik.com/premium-photo/menu-place-restaurant-background_87720-38967.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Oswald', sans-serif;
            color: white;
            padding-bottom: 20px;
        }
        .welcome {
            background-color: rgba(255, 255, 255, 0.05);
            height: 700px;
            margin: 0 5px;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .welcome h1 {
            color: green;
            font-family: 'Oswald', sans-serif;
            font-weight: 700;
            text-align: center;
            padding: 20px 0;
        }


        .stats{
            display:flex;
            justify-content:center;
            flex-wrap:wrap;
        }
        .statgroup{
            background: rgba(0,0,0,0.7);
            border-radius: 15px;
            width: 300px;
            padding:20px;
            box-shadow:0 0 15px red;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .statgroup:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 28px aqua;
        }
        .circle{
            width: 100px;
            height:100px;
            border-radius:50%;
            border:5px solid white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:28px;
            font-weight:bold;
            color:white;
            margin: 0 auto 25px;
        } 
        .label{
            color:white;
            font-weight:bold;
            font-size:20px;
            margin-bottom:25px;
            text-align:center;
        }
        .plabel{
            color:white;
            font-weight:bold;
        }
        .progressgroup{
            margin-bottom:12px;
        }
        progress{
            width:100%;
            height:20px;
            border-radius:10px;
            overflow:hidden;
            -webkit-appearance:none;
        }
        progress::-webkit-progress-bar{
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        progress::-webkit-progress-value{
            background-color:aqua;
            border-radius:10px;
        }
        .pvalue{
            font-size:16px;
            font-weight:bold;
            text-align:right;
            color:white;
        }
    </style>
    
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="main"> 
        <div class="welcome">
            <h1>Welcome, Admin</h1>
            <div class="stats">
                <div class="statgroup" onclick="window.location.href='orders.php'">
                    <div class="circle"><?php echo $totalorders; ?></div>
                    <div class="label">Total Orders</div>
                    <div class="progressgroup">
                        <div class="plabel">Pending</div>
                        <progress max="<?php echo $totalorders;?>" value="<?php echo $pending; ?>"></progress>
                        <div class="pvalue"><?php echo $pending; ?></div>
                    </div>

                    <div class="progressgroup">
                        <div class="plabel">Processing</div>
                        <progress max="<?php echo $totalorders;?>" value="<?php echo $processing; ?>"></progress>
                        <div class="pvalue"><?php echo $processing; ?></div>
                    </div>

                    <div class="progressgroup">
                        <div class="plabel">Completed</div>
                        <progress max="<?php echo $totalorders;?>" value="<?php echo $completed; ?>"></progress>
                        <div class="pvalue"><?php echo $completed; ?></div>
                    </div>

                    <div class="progressgroup">
                        <div class="plabel">Cancelled</div>
                        <progress max="<?php echo $totalorders;?>" value="<?php echo $cancel; ?>"></progress>
                        <div class="pvalue"><?php echo $cancel; ?></div>
                    </div>
                </div>

</body>
</html>