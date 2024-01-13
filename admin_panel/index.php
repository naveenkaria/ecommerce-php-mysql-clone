<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
                    <ul>
                        <?php
                        if (!isset($_SESSION['session_admin_name'])) {
                            echo " <li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                        } else {
                            echo " <li class='nav-item'><a class='nav-link' href='#'>Welcome " . $_SESSION['session_admin_name'] . "</a></li>";
                        }
                        ?>
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
                    <?php
                    if (!isset($_SESSION['session_admin_name'])) {
                        echo "<p class='text-light text-center'>Admin Name</p>";
                    } else {
                        echo "<p class='text-light text-center'>" . $_SESSION['session_admin_name'] . "</p>";
                    }
                    ?>
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
                        <a href="index.php?view_categories" class="nav-link text-light  m-3">View Categories</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?insert_brands" class="nav-link text-light m-3">Insert Brands</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?view_brands" class="nav-link text-light  m-3">View Brands</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?list_orders" class="nav-link text-light  m-3">All Orders</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?list_payments" class="nav-link text-light  m-3">All Payments</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?list_users" class="nav-link text-light  m-3">List Users</a>
                    </button>
                    <button class="bg-info">
                        <a href="index.php?logout" class="nav-link text-light  m-3">Logout</a>
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
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['edit_brand'])) {
            include('edit_brand.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brand'])) {
            include('delete_brand.php');
        }
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['logout'])) {
            include('logout.php');
        }
        ?>
    </div>


    <!-- last child -->
    <!-- include footer -->
    <?php
    include("../includes/footer.php");
    ?>



    <!-- bootstrap JS link -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>