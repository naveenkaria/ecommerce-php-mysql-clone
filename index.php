<?php
include("./includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce - PHP - MYSQL - CLONE</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom CSS -->
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img class="logo" src="./images/logo.png" alt="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Welcome Guest</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            </ul>
        </nav>

        <!-- third child -->

        <div class="bg-light">
            <h3 class="text-center">E-Commerce</h3>
            <p class="text-center">E-Commerce Website with PHP and MYSQL</p>
        </div>

        <!-- fourth child -->

        <div class="row px-1">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    $pro_select_query = "Select * from `products` order by rand() LIMIT 0,3";
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
                    ?>
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->

                <!-- brands display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <?php
                    $select_brands = "Select * from `brands`";
                    $result_brands = mysqli_query($conn, $select_brands);
                    while ($rows_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $rows_data['brand_title'];
                        $brand_id = $rows_data['brand_id'];
                        echo "<li class='nav-item'><a href='index.php?brand=$brand_id' class='nav-link text-right'>$brand_title</a></li>";
                    }
                    ?>
                </ul>

                <!-- category display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                    $select_categories = "Select * from `categories`";
                    $result_categories = mysqli_query($conn, $select_categories);
                    while ($rows_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $rows_data['category_title'];
                        $category_id = $rows_data['category_id'];
                        echo "<li class='nav-item'><a href='index.php?brand=$category_id' class='nav-link text-right'>$category_title</a></li>";
                    }
                    ?>
                </ul>

            </div>
        </div>

    </div>

    <!-- last child -->
    <!-- <div class="bg-info p-3 text-center">
        <p>All Rights Reserved &copy;- 2023</p>
    </div> -->

    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>