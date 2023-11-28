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

<body class='bg-secondary'>
    <div class='container my-5'>
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <input type="text" class='form-control w-50 m-auto' name='invoice_number'>
            </div>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <label for="" class='text-light'>Amount</label>
                <input type="text" class='form-control w-50 m-auto' name='amount'>
            </div>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <select name="payment_mode" class='form-select w-50 m-auto'>
                    <option value="">Select Payment Mode</option>
                    <option value="UPI">UPI</option>
                    <option value="NetBanking">NetBanking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Payoffline">Payoffline</option>
                </select>
            </div>
            <div class='form-outline my-4 text-center w-50 m-auto'>
                <input type="submit" name="confirm_payment" class="bg-info py-2 px-3 border-0" value="Confirm">
            </div>
        </form>
    </div>
</body>

</html>