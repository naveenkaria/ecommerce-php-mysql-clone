<?php
include('../includes/connect.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/logo.png" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="from-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username"
                            required="required" class="form-control">
                    </div>

                    <div class="from-outline mb-4">
                        <label for="admin_password" class="form-label">password</label>
                        <input type="password" id="admin_password" name="admin_password"
                            placeholder="Enter your password" required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light" name="admin_login"
                            value="login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account <a href="admin_registration.php"
                                class="link-denger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_POST['admin_login'])) {
    global $conn;

    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    $select_query = "Select * from `admin_table` where admin_name = '$admin_name'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $row_admin_name = $row_data["admin_name"];

    if ($row_count > 0) {
        $_SESSION['session_admin_name'] = $row_admin_name;
        if (password_verify($admin_password, $row_data["admin_password"])) {
            $_SESSION['session_admin_name'] = $row_admin_name;
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>