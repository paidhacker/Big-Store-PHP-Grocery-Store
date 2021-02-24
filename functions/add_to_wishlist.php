<?php
//values
$pid = $_POST["pid"];
$name = $_POST["hidden_name"];
$image = $_POST["image"];
$price = $_SESSION["price"];
//storing in product array
if(isset($_COOKIE["shopping_cart"])){
    $cookie_data = stripslashes($_COOKIE["shopping_cart"]);
    $cart_data = json_decode($cookie_data, true);
}
else{
    $cart_data = array();
}
$item_id_list = array_column($cart_data,'item_id');
if(in_array($pid, $item_id_list)){
    echo '<script>alert("Item already added to wishlist");</script>';
}
else{
    $item_array = array(
        'item_id' => $pid, 
        'item_name' => $name,
        'item_image' => $image,
        'item_price' => $price
    );
    
    $cart_data[] = $item_array;
}
    //encoding data
$item_data = json_encode($cart_data);
//seting cookie
setcookie('shopping_cart', $item_data, time() + (86400 * 30), "/");

header("location:../wishlist.php");
?>