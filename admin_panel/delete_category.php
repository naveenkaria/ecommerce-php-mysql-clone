<?php

if (isset($_GET['delete_category'])) {
    $delete_category = $_GET['delete_category'];

    $delete_query = "Delete from `categories` where category_id = $delete_category";
    $delete_result = mysqli_query($conn, $delete_query);
    if ($delete_result) {
        echo "<script>alert('Category is been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}

?>