<?php
include('../includes/connect.php');
include("../functions/common_function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Registration</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    body {
        overflow-x: hidden;
    }
</style>

<body>
    <div class="container-fluid my-3">
        <h1 class="text-center">New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_name">Username</label>
                        <input type="text" name="user_name" id="user_name" class="form-control"
                            placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control"
                            placeholder="Enter your email" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image">User Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control"
                            placeholder="Enter your password" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password">Confirm Password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control"
                            placeholder="Confirm password" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address">Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control"
                            placeholder="Enter your address" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_mobile">Contact</label>
                        <input type="number" name="user_mobile" id="user_mobile" class="form-control"
                            placeholder="Enter your mobile number" autocomplete="off" required>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 text-light"
                            name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a class="text-danger"
                                href="user_login.php"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['user_register'])) {
    global $conn;
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIpAddress();

    $seleect_query = "Select * from `user_table` where  user_email = '$user_email'";
    $result = mysqli_query($conn, $seleect_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('User already exists')</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('Password do not match')</script>";
    } else {
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address, user_mobile)
    values ('$user_name', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
        $sql_execute = mysqli_query($conn, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            die(mysqli_error($conn));
        }
    }

    //select cart items
    $select_cart_items = "Select * from `cart_details` where ip_address = '$user_ip'";
    $result_cart = mysqli_query($conn, $select_cart_items);
    $row_count = mysqli_num_rows($result_cart);
    if ($row_count > 0) {
        $_SESSION['user_name'] = $user_name;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    } else {
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}


?>