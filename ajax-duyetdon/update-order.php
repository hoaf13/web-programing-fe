<?php

include_once '../ketnoi.php';
    $id = $_POST['id'];
    $trangthaithanhtoan = $_POST['trangthaithanhtoan'];
    $trangthaiduyet = $_POST['trangthaiduyet'];
    $appointment = $_POST['appointment'];
    $total = $_POST['total'];
        $sql = "UPDATE  order_product SET trangthaiduyet = $trangthaiduyet, trangthaithanhtoan = $trangthaithanhtoan, appointment = $appointment, total = $total WHERE order_id=$id";
    $query=mysqli_query($conn,$sql);
    echo json_encode([
        'message' => 'success'
    ]);
?>