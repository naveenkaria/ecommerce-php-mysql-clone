<?php
include("../includes/connect.php");
if (isset($_POST["brand_cat"])) {
    //varaiable
    $brand_title = $_POST["brand_title"];
    //select query
    $select_query = "Select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script> alert('This brand is presented inside the database') </script>";
    } else {
        //insert query
        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script> alert('Brand has been inserted successfully') </script>";
        }
    }
}
?>

<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands"
            aria-describedby="basic-addon11">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="brand_cat" value="Insert Brands">
    </div>
</form>