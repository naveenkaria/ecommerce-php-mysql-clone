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

<body>

    <?php
    global $conn;

    $user_name = $_SESSION["user_name"];
    $select_query = "Select * from `user_table` where user_name = '$user_name'";
    $result = mysqli_query($conn, $select_query);
    $row_data = mysqli_fetch_assoc($result);
    $user_id = $row_data["user_id"];
    ?>

    <h3 class='text-success'>All my Orders</h3>
    <table class='table table-bordered mt-5'>
        <thead class="bg-info">
            <tr>
                <th>SNo</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete / Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary">
            <?php
            global $conn;
            $get_order_query = "Select * from `user_orders` where user_id=$user_id";
            $result_order = mysqli_query($conn, $get_order_query);
            $number = 1;
            while ($row_order = mysqli_fetch_array($result_order)) {
                $order_id = $row_order["order_id"];
                $amount_due = $row_order["amount_due"];
                $total_products = $row_order["total_products"];
                $invoice_number = $row_order["invoice_number"];
                $order_date = $row_order["order_date"];
                $order_status = $row_order["order_status"];
                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'Complete';
                }
                echo "
                <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='confirm_payment.php'>Confirm</a></td>
                </tr>
                ";
                $number++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>