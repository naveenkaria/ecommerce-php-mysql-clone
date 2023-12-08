<?php

if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];

    $delete_query = "Delete from `products` where product_id = $delete_id";
    $result = mysqli_query($conn, $delete_query);
    if ($result) {
        echo "<script>alert('Product deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_products', '_self')</script>";
    }

}

?>