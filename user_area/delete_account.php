<h3 class='text-danger mb-4'>Delete Account</h3>
<form action="" method="post" class='mt-5'>
    <div class='form-outline mb-4'>
        <input type="submit" class='form=control w-50 m-auto' name='delete' value="Delete Account">
    </div>
    <div class='form-outline mb-4'>
        <input type="submit" class='form=control w-50 m-auto' name='dont_delete' value="Don't Delete Account">
    </div>
</form>

<?php

global $conn;
if (isset($_POST['delete'])) {
    $user_name = $_SESSION['user_name'];
    $delete_query = "delete from `user_table` where user_name = '$user_name'";
    $result = mysqli_query($conn, $delete_query);
    if ($result) {
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php', '_self')</script>";
}
?>