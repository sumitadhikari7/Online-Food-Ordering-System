<?php
include '../dbconnect.php';
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
<?php
include 'navbar.php';
?>
<div class="main">
    <div class="welcome">
        <div class="heading">
            <h1>Add Menu Items</h1>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label> 
                    <textarea name="description" id=""></textarea>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo:</label>
                    <input type="file" name="photo" accept="Image/*" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="" required>
                        <option value="Starters">Starters</option>
                        <option value="Main Course">Main Course</option>
                        <option value="Desserts">Desserts</option>
                        <option value="Beverages">Beverages</option>
                        <option value="Special">Special</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="avai">Availability:</label>
                    <select name="availability" id="" required>
                        <option value="available">Available</option>
                        <option value="not available">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="btn">
                    <input type="submit" name="submit" value="Add Item">
                </div>
            </div>
        </form>
    </div>
</div>
    <?php
    if(isset($_POST['submit']))
    {
        $name=trim($_POST['name']);
        $description=trim($_POST['description']);
        $price=trim($_POST['price']);
        $pic=$_FILES['photo']['name'];
        // photo is the name attribute of my image.
        $temp1=$_FILES['photo']['tmp_name'];
        $folder1='menu/'.$pic;
        move_uploaded_file($temp1,$folder1);
        $category=$_POST['category'];
        $availability=$_POST['availability'];
        if (empty($name) || empty($description) || empty($price) || empty($_FILES['photo']['name']) || empty($category) || empty($availability)) {
    echo "<script>alert('All fields must be filled');</script>";
} else {

        $sql="INSERT INTO foods(name,description,price,photo,category,availability)
        VALUES('$name','$description','$price','$folder1','$category','$availability')";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script>
            window.location.href='add_menu.php'
            </script>";
        }
        else{
            echo "<script>
            alert('Error in inserting records')
            </script>";
        }
    }
}
    ?>
</body>
</html>