<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom CSS -->
    <link rel="stylesheet" href="../style.css">

</head>
<style>
    body {
        overflow-x: hidden;
    }

    .product_img {
        width: 60px;
        object-fit: contain;
    }
</style>

<body>

    <div class="container-fluid p-0 nn">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="../images/logo.png" alt="logo">
                <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Welcome guest</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="m-3">
                    <a href="#"><img class="admin_image" src="../images/logo.png" alt="logo"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <!-- buttons -->
                <div class="button text-center">
                    <button class="bg-info">
                        <a href="insert_product.php" class="nav-link text-light  m-3"> Insert Products</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?view_products" class="nav-link text-light  m-3">View Products</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?insert_categories" class="nav-link text-light  m-3">Insert Categories</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">View Categories</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?insert_brands" class="nav-link text-light m-3">Insert Brands</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">View Brands</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">All Orders</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">All Payments</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">List Users</a>
                    </button>
                    <button class="bg-info">
                        <a href="#" class="nav-link text-light  m-3">Logout</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- fourth child -->

    <div class="container my-3">
        <?php
        if (isset($_GET['insert_categories'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brands'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_products'])) {
            include('delete_products.php');
        }
        ?>
    </div>


    <!-- last child -->
    <!-- include footer -->
    <?php
    include("../includes/footer.php");
    ?>



    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>