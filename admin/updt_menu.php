<?php
include '../dbconnect.php';

if(!isset($_GET['id'])){
    header("Location: edit_menu.php");
    exit();
}
$id=$_GET['id'];

$sql="SELECT * FROM foods where id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);


//now to handle update, we use post
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $availability = mysqli_real_escape_string($conn, $_POST['availability']);

    $photo=$row['photo']; //keep existing picture.

    if(isset($_FILES['photo'])){
        $pic=$_FILES['photo']['name'];
        $temp1=$_FILES['photo']['tmp_name'];
        $folder1='menu/'.$pic;
        move_uploaded_file($temp1,$folder1);
        $photo=$folder1; //updating the photo path
    }
    if(empty($name) || empty($desc) || empty($price) || empty($category) || empty($availability) || (empty($row['photo']) && empty($_FILES['photo']['name']))){
        echo "<script> alert('All fields must be filled')
        </script>";
    }
    else{

    $update = "UPDATE foods SET name='$name', description='$desc', price='$price', photo='$photo', category='$category', availability='$availability' WHERE id='$id'";
    if (!mysqli_query($conn, $update)) {
    echo "Error updating record: " . mysqli_error($conn);
    exit();
}

    header("Location: edit_menu.php");
    exit();
}
}
?>
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
        }

        body {
            background-image: url(https://img.freepik.com/premium-photo/realistic-photo-blurred-restaurant-background-with-some-people-eating-chefs-waiters-working-high-resolution-superdetail-16k_967785-42409.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
    </style>
</head>
<body>
<div class="main">
    <div class="welcome">
        <div class="heading">
            <h1>Edit Menu Item</h1>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label> 
                    <textarea name="description" required><?php echo $row['description']; ?></textarea>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" accept="Image/*" required>
                    <br>
                    <img src="<?php echo $row['photo']; ?>" width="120" alt="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" required>
                        <option value="Starters" <?php if($row['category'] == 'Starters') echo 'selected'; ?>>Starters</option>
                        <option value="Main Course" <?php if($row['category'] == 'Main Course') echo 'selected'; ?>>Main Course</option>
                        <option value="Desserts" <?php if($row['category'] == 'Desserts') echo 'selected'; ?>>Desserts</option>
                        <option value="Beverages" <?php if($row['category'] == 'Beverages') echo 'selected'; ?>>Beverages</option>
                        <option value="Special" <?php if($row['category'] == 'Special') echo 'selected'; ?>>Special</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="avai">Availability:</label>
                    <select name="availability" required>
                        <option value="available" <?php if($row['availability'] == 'available') echo 'selected'; ?>>Available</option>
                        <option value="not available" <?php if($row['availability'] == 'not available') echo 'selected'; ?>>Not Available</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="btn">
                    <input type="submit" name="submit" value="Update Item">
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>