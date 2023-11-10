<?php
include("./includes/connect.php");
include("./functions/common_function.php");
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
                            <a class="nav-link active" aria-current="page"
                                href="/ecommerce-php-mysql/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i>
                                <sup>
                                    <?php cart_item() ?>
                                </sup>
                            </a>
                        </li>
                    </ul>
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
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <!-- php code to displaya dynamic data -->
                        <?php
                        global $conn;
                        $get_ip_address = getIpAddress();
                        $total_price = 0;
                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_address'";
                        $result = mysqli_query($conn, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id = '$product_id'";
                                $result_products = mysqli_query($conn, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($product_price);
                                    $total_price += $product_values;
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Product Title</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $product_title ?>
                                            </td>
                                            <td><img height="80" width="80"
                                                    src="./admin_panel/product_images/<?php echo $product_image1 ?>" alt="">
                                            </td>
                                            <td><input type="text" name="qty" class="form-input w-50"></td>
                                            <?php
                                            global $conn;
                                            $get_ip_add = getIpAddress();
                                            if (isset($_POST['update_cart'])) {

                                                $quantities = $_POST['qty'];
                                                $update_query = "update `cart_details` set quantity = '$quantities' where ip_address = '$get_ip_add'";
                                                $update_result = mysqli_query($conn, $update_query);
                                                $total_price = $total_price * $quantities;
                                            }
                                            ?>
                                            <td>
                                                <?php echo $price_table ?>/-
                                            </td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                                                <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                                    name="update_cart">
                                                <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3"
                                                    name="remove_cart">
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        } ?>

                    </table>

                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <?php
                        global $conn;
                        $get_ip_address = getIpAddress();
                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_address'";
                        $result = mysqli_query($conn, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "                        
                            <h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'> 
                            <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>checkout</a></button>
                            ";
                        } else {
                            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                        }

                        if (isset($_POST["continue_shopping"])) {
                            echo "<script>window.open('index.php', '_self')</script>";
                        }
                        ?>

                    </div>

                </form>
                <!-- function to remove item -->
                <?php
                function remove_cart_item()
                {
                    global $conn;
                    if (isset($_POST["remove_cart"])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            echo $remove_id;
                            $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                            $result = mysqli_query($conn, $delete_query);
                            if ($result) {
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }
                        }
                    }
                }
                echo $remove_item = remove_cart_item();

                ?>
            </div>
        </div>
    </div>

    <!-- last child -->
    <!-- include footer -->
    <?php
    include("./includes/footer.php");
    ?>

    <!-- bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>