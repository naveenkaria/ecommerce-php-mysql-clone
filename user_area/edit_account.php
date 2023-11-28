<?php
global $conn;

if (isset($_GET['edit_account'])) {
    $user_name = $_SESSION['user_name'];
    $select_query = "Select * from `user_table` where user_name = '$user_name'";
    $select_result = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($select_result);
    $user_id = $row_fetch["user_id"];
    $user_name = $row_fetch["user_name"];
    $user_email = $row_fetch["user_email"];
    $user_address = $row_fetch["user_address"];
    $user_mobile = $row_fetch["user_mobile"];
    $user_image = $row_fetch["user_image"];


    if (isset($_POST['user_update'])) {
        $update_user_id = $user_id;
        $user_name = $_POST["user_name"];
        $user_email = $_POST["user_email"];
        $user_address = $_POST["user_address"];
        $user_mobile = $_POST["user_mobile"];
        if ($_FILES["user_image"]['name']) {
            $user_image = $_FILES["user_image"]['name'];
            $user_image_tmp = $_FILES["user_image"]['tmp_name'];
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        }

        $update_query = "update `user_table` set user_name='$user_name', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' where user_id = $update_user_id";
        $update_result = mysqli_query($conn, $update_query);
        if ($update_result) {
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }
    }
}

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

</head>

<style>
    .edit_image {
        width: 60px;
        height: 60px;
        border-radius: 50px;
        margin-left: 10px;
    }
</style>

<body>
    <h3 class='text-success mb-4'>Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name ?>" name='user_name'>
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name='user_email'>
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name='user_image'>
            <img src="./user_images/<?php echo $user_image ?>" class="edit_image" alt="update_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name='user_address'>
        </div>
        <div class="form-outline mb-4">
            <input type="number" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name='user_mobile'>
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Update" class="bg-info py-2 px-3 border-0 w-50 m-auto text-center text-light"
                name='user_update'>
        </div>
    </form>
</body>

</html>