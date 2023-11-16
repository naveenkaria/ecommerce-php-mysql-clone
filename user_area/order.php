<?php
include("../includes/connect.php");
include("../functions/common_function.php");

global $conn;

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIpAddress();
$total_price = 0;
$cart_query_price = "Select * from `cart_details` where ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($conn, $cart_query_price);
$invoice_number = mt_rand();
$status = "pending";
$count_products = mysqli_num_rows($result_cart_price);
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "Select * from `products` where product_id = $product_id";
    $run_price = mysqli_query($conn, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = array($row_product_price['product_price']);
        $product_value = array_sum($product_price);
        $total_price += $product_value;
    }
}

//getting quantity from cart

$get_cart = "Select * from `cart_details`";
$run_cart = mysqli_query($conn, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

// insert order

$insert_order = "Insert into `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) values 
                ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
$result_query_insert = mysqli_query($conn, $insert_order);
if ($result_query_insert) {
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// order pending 

$insert_pending_order = "Insert into `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) values 
                ($user_id, $invoice_number, $product_id, $quantity, '$status')";
$result_pending_order = mysqli_query($conn, $insert_pending_order);

// delete item from cart

$empty_cart = "Delete from `cart_details` where ip_address = '$get_ip_address'";
$result_delete = mysqli_query($conn, $empty_cart);

?>