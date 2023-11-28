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
    <title>E-Commerce - PHP - MYSQL - CLONE</title>

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
</style>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img class="logo" src="../images/logo.png" alt="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user_name'])) {
                            echo "<li class='nav-item'><a class='nav-link' href='./user_area/profile.php'>My Account</a>";
                        } else {
                            echo "<li class='nav-item'><a class='nav-link' href='./user_area/user_registration.php'>Register</a></li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
                                <sup>
                                    <?php cart_item() ?>
                                </sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:
                                <?php total_cart_price(); ?>/-
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                            aria-label="Search">
                        <input type="submit" value="Submit" name="search_data_product" class="btn btn-outline-light">
                    </form>
                </div>
            </div>
        </nav>

        <!-- second child -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['user_name'])) {
                    echo " <li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                } else {
                    echo " <li class='nav-item'><a class='nav-link' href='#'>Welcome " . $_SESSION['user_name'] . "</a></li>";
                }
                if (!isset($_SESSION['user_name'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='../user_area/user_login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='../user_area/logout.php'>Logout</a></li>";
                }
                ?>
            </ul>
        </nav>

        <!-- third child -->

        <div class="bg-light">
            <h3 class="text-center">E-Commerce</h3>
            <p class="text-center">E-Commerce Website with PHP and MYSQL</p>
        </div>

        <!-- fourth child -->

        <div class="row px-1">
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->

                <!-- brands display -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php
                    $user_name = $_SESSION["user_name"];
                    $user_image = "Select * from `user_table` where user_name = '$user_name'";
                    $user_image = mysqli_query($conn, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image["user_image"];
                    echo "                    
                    <li class='nav-item d-flex justify-content-center m-3'>
                    <div class='bg-white d-flex justify-content-center align-content-center'
                        style='width:100px; height:100px; border-radius:50px; object-fit: cover; overflow: hidden;'>
                        <img src='./user_images/$user_image' alt='profile_img'>
                    </div>
                </li>
                ";
                    ?>
                    <li class='nav-item'><a href='profile.php' class='nav-link text-light'>Pending Orders</a></li>
                    <li class='nav-item'><a href='profile.php?edit_account' class='nav-link text-light'>Edit Account</a>
                    </li>
                    <li class='nav-item'><a href='profile.php?my_orders' class='nav-link text-light'>My Orders</a></li>
                    <li class='nav-item'><a href='profile.php?delete_account' class='nav-link text-light'>Delete
                            Account</a></li>
                    <li class='nav-item'><a href='logout.php' class='nav-link text-light'>Logout</a></li>
                </ul>
            </div>
            <div class='col-md-10 text-center'>
                <?php
                get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                }
                if (isset($_GET['delete_account'])) {
                    include('delete_account.php');
                }
                ?>
            </div>
        </div>

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