<?php

$conn = mysqli_connect("localhost:3307", "root", "", "ecommerce-php");

if (!$conn) {
    die(mysqli_error($conn));
}

?>