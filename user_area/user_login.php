<?php
include('../includes/connect.php');
include("../functions/common_function.php");
@session_start();
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
        <h1 class="text-center">User Login</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_email">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control"
                            placeholder="Enter your email" autocomplete="off" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password">Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control"
                            placeholder="Enter your password" autocomplete="off" required>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 text-light"
                            name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?<a class="text-danger"
                                href="user_registration.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    global $conn;

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_ip = getIpAddress();

    $select_query = "Select * from `user_table` where user_email = '$user_email'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_name = $row_data["user_name"];

    //cart items select
    $select_query_cart = "Select * from `cart_details` where ip_address = '$user_ip'";
    $select_cart = mysqli_query($conn, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    if ($row_count > 0) {
        $_SESSION['user_name'] = $user_name;
        if (password_verify($user_password, $row_data["user_password"])) {
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['user_name'] = $user_name;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['user_name'] = $user_name;
                echo "<script>alert('Login Successfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>