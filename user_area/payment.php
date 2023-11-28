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

</head>
<style>
    .payment_img {
        width: 100%;
        margin: auto;
        display: block;
    }
</style>

<body>
    <?php
    $user_ip = getIpAddress();
    $select_query = "Select * from `user_table` where user_ip = '$user_ip'";
    $result = mysqli_query($conn, $select_query);
    $fetch_data = mysqli_fetch_assoc($result);
    $user_id = $fetch_data["user_id"];
    echo "
    <div class='container'>
    <h2 class='text-center text-info'>Payment Options</h2>
    <div class='row d-flex justify-content-center align-items-center'>
        <div class='col-md-6'>
            <a href='https://www.paypal.com' target='_blank'><img class='payment_img' src='../images/payment.png'
                    alt='payment'></a>
        </div>
        <div class='col-md-6'>
            <a href='order.php?user_id=$user_id'>
                <h2 class='text-center'>Pay Offline</h2>
            </a>
        </div>
    </div>
</div>";
    ?>
</body>

</html>