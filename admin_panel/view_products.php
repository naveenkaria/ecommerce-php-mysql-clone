<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5 mb-5 text-center">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary">
        <?php
        global $conn;
        $select_query = "select * from `products`";
        $result = mysqli_query($conn, $select_query);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $product_title; ?>
                </td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img'></td>
                <td>
                    <?php echo $product_price; ?>/-
                </td>
                <td>
                    <?php
                    global $conn;
                    $select_query = "select * from `orders_pending` where product_id = $product_id";
                    $result_count = mysqli_query($conn, $select_query);
                    $row_count = mysqli_num_rows($result_count);
                    echo $row_count;
                    ?>
                </td>
                <td>
                    <?php echo $status; ?>
                </td>
                <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i
                            class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-dark'><i
                            class='fa-solid fa-trash'></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>