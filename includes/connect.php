<?php

$conn = mysqli_connect("localhost", "root", "", "ecommerce-php");

if (!$conn) {
    die(mysqli_error($conn));
}

?>