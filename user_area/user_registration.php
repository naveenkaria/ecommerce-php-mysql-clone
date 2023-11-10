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

<body>
    <div class="container-fluid my-3">
        <h1 class="text-center">New User Registration</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control"
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
                        <label for="user_contact">Contact</label>
                        <input type="number" name="user_contact" id="user_contact" class="form-control"
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