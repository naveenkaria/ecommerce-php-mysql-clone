<h3 class='text-center text-success'>All Brands</h3>
<table class='table table-bordered text-center mt-5'>
    <thead class='bg-info'>
        <tr>
            <th>Sno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary'>
        <?php
        $select_brands = "Select * from `brands`";
        $result = mysqli_query($conn, $select_brands);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
            ?>
            <tr>
                <td>
                    <?php echo $number; ?>
                </td>
                <td>
                    <?php echo $brand_title; ?>
                </td>
                <td><a href="#" class='text-dark'><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="#" class='text-dark'><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>