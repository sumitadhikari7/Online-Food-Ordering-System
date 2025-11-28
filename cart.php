<?php
session_start();
include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $foodid=$_POST['food_id'];
    $quantity=$_POST['quantity'];

    $sql="SELECT * FROM foods where id=$foodid";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_fetch_assoc($result);
    //$num gives food details

    if(!$num){
        die("Invalid");
    }
    $cart_item=[
        'id'=>$num['id'], //here the same above $num becomes associative array
        'name'=>$num['name'],
        'price'=>$num['price'],
        'quantity'=>$quantity,
        'photo'=>$num['photo']
    ];

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=[];
        // //initialize the cart session variable as empty array,
        // whenever user visits the site for 1st time.

        //this initializes cart if not set.
    }

    $found=false;
    foreach($_SESSION['cart'] as &$item){

        //cart ma vako harek item lai euta euta garera check garxa

        //we used $_SESSION['cart'] here because that's literally
        // where the data is stored.

        // Go through all items already in the cart and check
        //  if the one being added matches any of them

        // //reference vayeko bhayera & rakheko

        // //reference ko matlab any change in &$item directly updates real item inside ($_session['cart']) array.

        // normally in foreach we get copy value but 
        // using reference gives us to work with actual data.
        if($item['id']==$foodid){
            if($item['quantity'] + $quantity <=10){
            //checks if current item in cart has same id
            //as the customer is trying to select
            // also checks if the item in cart + the item customer
            // is trying to add exceeds 10 or not.
                $item['quantity']+=$quantity;
            }
            else{
                echo "<script>
                alert('Cannot add more than 10 items')
                window.location.href='menu.php';
                </script>";
                exit();
            }
            $found=true;
            break;
        }
    }
    unset($item); //this breaks the reference.
    //unset should always be done after using reference in foreach

    if(!$found){ //yedi cart ma item vetiyena bhane
        $_SESSION['cart'][]=$cart_item;
    } 
    //if the item was not found in the cart then adds it as new entry.
    // [] use garnu ko matlab chai add this item to last of an array vaneko ho 
    // yedi tyo use garena vane override garera add garxa which is not 
    // suitable for cart
    echo "<script>
    alert('Added to Cart');
    window.location.href='menu.php';
    </script>";
exit();

    exit();
}
?>