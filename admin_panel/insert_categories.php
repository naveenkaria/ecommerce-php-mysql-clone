<?php
include("../includes/connect.php");
if (isset($_POST["insert_cat"])) {
    //varaiable
    $category_title = $_POST["cat_title"];
    //select query
    $select_query = "Select * from `categories` where category_title='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script> alert('This category is presented inside the database') </script>";
    } else {
        //insert query
        $insert_query = "insert into `categories` (category_title) values ('$category_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script> alert('Category has been inserted successfully') </script>";
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="categories"
            aria-describedby="basic-addon11">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="bg-info p-2 my-3 border-0" name="insert_cat" value="Insert Categories">
    </div>
</form>