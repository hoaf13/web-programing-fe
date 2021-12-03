<?php

session_start();
include_once '../ketnoi.php';
    $data = $_POST['ids'];
    foreach ($data as $id) {
        $sql = "UPDATE order_product SET trangthaithanhtoan=1 WHERE order_id=$id";
    }
    $query=mysqli_query($conn,$sql);
    echo json_encode([
        'message' => 'success'
    ]);
?>