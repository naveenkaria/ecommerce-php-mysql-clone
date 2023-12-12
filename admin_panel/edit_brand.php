<?php
if (isset($_GET['edit_brand'])) {
    $edit_brand = $_GET['edit_brand'];

    $select_query = "Select * from `brands` where brand_id = $edit_brand";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row["brand_title"];
}

if (isset($_POST["edit_band"])) {
    $band_title = $_POST['brand_title'];

    $update_query = "update `brands` set brand_title = '$band_title' where brand_id = $edit_brand";
    $result_band = mysqli_query($conn, $update_query);
    if ($result_band) {
        echo "<script>alert('Brand is been updated successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>

<div class='container mt-5'>
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class='text-center'>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class='form-label'>Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class='form-control'
                value="<?php echo $brand_title ?>" required>
        </div>
        <input type="submit" value="Update Brand" name="edit_band" class="btn btn-info px-3 mb-3">
    </form>
</div>