<?php

include_once '../includes/dbh.inc.php';

    $productname = mysqli_real_escape_string($conn,$_POST['productname']);
    $productinfo = mysqli_real_escape_string($conn,$_POST['productinfo']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $sql = "insert into tbl_products (product_name, product_info, image, price) values ('".$productname."', '".$productinfo."', '".$imgContent."', ".$price.")";
        mysqli_query($conn, $sql);
    }
    header("location: ./updateproduct.php?msg=success");
?>