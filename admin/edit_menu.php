<?php
include '../dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['food_id'];
    $deletesql = "DELETE FROM foods WHERE id = '$id'";
    mysqli_query($conn, $deletesql);
    header("Location: edit_menu.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['toggle'])) {
    $id = $_POST['food_id'];
    $currentStatus = $_POST['current_status'];
    if ($currentStatus == 'available') {
        $newStatus = 'not available';
    } else {
        $newStatus = 'available';
    }
    $updatesql = "UPDATE foods SET availability = '$newStatus' WHERE id = '$id'";
    mysqli_query($conn, $updatesql);
    header("Location: edit_menu.php");
    exit();
}
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
        .delete button{
            background-color: red;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
            transition: background-color 0.9s ease;
            color:white;
            cursor: pointer;
        }
        .delete button:hover{
            background-color: aqua;
            color:black;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
        }
        .buttons{
            display:flex;
            gap:20px;
        }
        .edit button{
            background-color: green;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
            transition: background-color 0.9s ease;
            color:white;
            cursor: pointer;
        }
        .edit button:hover{
            background-color: blue;
            color:white;
            font-weight:bold;
            padding:0 5px;
            border-radius:10px;
        }
        .toggle button {
            background-color: orange;
            transition: background-color 0.3s ease;
            border-radius:10px;
        }
        .toggle button:hover {
            background-color: darkorange;
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
    include '../dbconnect.php';
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
        <img src="<?php echo $row['photo'];?>" alt="">
        <div class="details">
            <h3><?php echo $row['name'];?></h3>
            <?php
            $statuscolor=$row['availability']=='available'?'green':'red';
            ?>
            <p>Status: <strong style="color:<?php echo $statuscolor; ?>">
            <?php echo $row['availability']; ?>
        </strong></p>
            <p><?php echo $row['description'];?></p>
            <div class="price">
                <h4>&#8377; <?php echo $row['price'];?></h4>
            </div>
            <div class="buttons">
                
                <div class="toggle">
                    <form method="POST" action="">
                        <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="current_status" value="<?php echo $row['availability']; ?>">
                        <button type="submit" name="toggle">
                            <?php echo $row['availability'] == 'available' ? 'Mark Not Available' : 'Mark Available'; ?>
                        </button>
                    </form>
                </div>
            </div>
            <form action="" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                <input type="hidden" name="food_id" value="<?php echo $row['id'];?>">
                <div class="buttons">
                <div class="delete">
                    <button type="submit" name="delete">Delete</button>
                </div>
            </form>
            <div class="edit">
                <form action="updt_menu.php" method="GET" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Edit</button>
                </form>
            </div>

            </div>
            </form>
        </div>
    </div>

    </div>

    <?php
        }
    }
    ?>

</body>
</html>