<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $select_query = "Select * from `products` where product_id=$edit_id";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];


    // category 
    $select_category = "Select * from `categories` where category_id = $category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category["category_title"];

    // brand 
    $select_brand = "Select * from `brands` where brand_id = $brand_id";
    $result_brand = mysqli_query($conn, $select_brand);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand["brand_title"];
}

?>


<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" value="<?php echo $product_title ?>"
                class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" name="product_desc" id="product_desc" value="<?php echo $product_description ?>"
                class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" value="<?php echo $product_keywords ?>"
                class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" id="product_category" class="form-select" required>
                <option value="<?php echo $category_title ?>">
                    <?php echo $category_title ?>
                </option>
                <?php
                $select_category_all = "Select * from `categories`";
                $result_category_all = mysqli_query($conn, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label">Product Brands</label>
            <select name="product_brand" id="product_brand" class="form-select" required>
                <option value="<?php echo $brand_title ?>">
                    <?php echo $brand_title ?>
                </option>
                <?php
                $select_brand_all = "Select * from `brands`";
                $result_brand_all = mysqli_query($conn, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image1 ?>" alt="product_image1" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="product_image2" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="product_image3" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" value="<?php echo $product_price ?>"
                class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <input type="submit" name="edit_product" id="edit_product" class="btn btn-info w-100 px-3 mb-3 text-light"
                value="Update Product">
        </div>
    </form>
</div>


<?php

if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $tmp_product_image1 = $_FILES['product_image1']['tmp_name'];
    $tmp_product_image2 = $_FILES['product_image2']['tmp_name'];
    $tmp_product_image3 = $_FILES['product_image3']['tmp_name'];

    if (
        $product_title == '' or $product_desc == '' or $product_keywords == '' or $product_category == '' or $product_brand == ''
        or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_price == ''
    ) {
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
        exit();
    } else {
        if ($_FILES['product_image1']['name']) {
            $_FILES['product_image1']['name'];
            $tmp_product_image1 = $_FILES['product_image1']['tmp_name'];
            move_uploaded_file($tmp_product_image1, "./product_images/$product_image1");
        }
        if ($_FILES['product_image2']['name']) {
            $_FILES['product_image2']['name'];
            $tmp_product_image2 = $_FILES['product_image2']['tmp_name'];
            move_uploaded_file($tmp_product_image2, "./product_images/$product_image2");
        }
        if ($_FILES['product_image3']['name']) {
            $_FILES['product_image3']['name'];
            $tmp_product_image3 = $_FILES['product_image3']['tmp_name'];
            move_uploaded_file($tmp_product_image3, "./product_images/$product_image3");
        }

        $update_query = "update `products` set product_title = '$product_title', product_description = '$product_desc', product_keywords = '$product_keywords',
                         category_id = '$product_category', brand_id = '$product_brand', product_image1 = '$product_image1', product_image2 = '$product_image2',
                         product_image3 = '$product_image3', product_price = '$product_price', date = NOW() where product_id = $edit_id";
        $result_update_query = mysqli_query($conn, $update_query);
        if ($result_update_query) {
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}

?>