<?php


function displayProducts()
{
    global $conn;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $pro_select_query = "Select * from `products` order by rand() LIMIT 0,9";
            $pro_result_query = mysqli_query($conn, $pro_select_query);
            while ($row_data = mysqli_fetch_assoc($pro_result_query)) {
                $product_id = $row_data["product_id"];
                $product_title = $row_data["product_title"];
                $product_description = $row_data["product_description"];
                $product_image1 = $row_data["product_image1"];
                $product_price = $row_data["product_price"];
                $category_id = $row_data["category_id"];
                $brand_id = $row_data["brand_id"];

                echo "
                <div class='col-md-4 mb-2'>
                <div class='card'>
                    <div style='display:flex; justify-content:center;' class='m-1'>
                        <img style='height:200px; width:200px;' src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text' >$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>
            ";
            }
        }
    }
}


function displayBrands()
{
    global $conn;
    $select_brands = "Select * from `brands`";
    $result_brands = mysqli_query($conn, $select_brands);
    while ($rows_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $rows_data['brand_title'];
        $brand_id = $rows_data['brand_id'];
        echo "<li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-right'>$brand_title</a></li>";
    }
}



function displayCategories()
{
    global $conn;
    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($conn, $select_categories);
    while ($rows_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $rows_data['category_title'];
        $category_id = $rows_data['category_id'];
        echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-right'>$category_title</a></li>";
    }
}


function displayUniqueCategory()
{
    global $conn;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "Select * from `products` where category_id=$category_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='card-text text-danger'>There is no stock of this category</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_id = $row_data["product_id"];
            $product_title = $row_data["product_title"];
            $product_description = $row_data["product_description"];
            $product_image1 = $row_data["product_image1"];
            $product_price = $row_data["product_price"];
            $category_id = $row_data["category_id"];
            $brand_id = $row_data["brand_id"];

            echo "
                <div class='col-md-4 mb-2'>
                <div class='card'>
                    <div style='display:flex; justify-content:center;' class='m-1'>
                        <img style='height:200px; width:200px;' src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text' >$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}


function displayUniqueBrand()
{
    global $conn;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "Select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='card-text text-danger'>There is no stock of this brand</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_id = $row_data["product_id"];
            $product_title = $row_data["product_title"];
            $product_description = $row_data["product_description"];
            $product_image1 = $row_data["product_image1"];
            $product_price = $row_data["product_price"];
            $category_id = $row_data["category_id"];
            $brand_id = $row_data["brand_id"];

            echo "
                <div class='col-md-4 mb-2'>
                <div class='card'>
                    <div style='display:flex; justify-content:center;' class='m-1'>
                        <img style='height:200px; width:200px;' src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text' >$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}


function displaySearchProduct()
{
    global $conn;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $select_query = "Select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='card-text text-danger'>No match found, there is no product</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_id = $row_data["product_id"];
            $product_title = $row_data["product_title"];
            $product_description = $row_data["product_description"];
            $product_image1 = $row_data["product_image1"];
            $product_price = $row_data["product_price"];
            $category_id = $row_data["category_id"];
            $brand_id = $row_data["brand_id"];

            echo "
                <div class='col-md-4 mb-2'>
                <div class='card'>
                    <div style='display:flex; justify-content:center;' class='m-1'>
                        <img style='height:200px; width:200px;' src='./admin_panel/product_images/$product_image1' class='card-img-top' alt='$product_image1'>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text' >$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to cart</a>
                        <a href='#' class='btn btn-secondary'>View more</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}


?>