<?php
ob_start();
session_start();
include_once '../ketnoi.php';
$data = '%'.$_POST['data'].'%';
$sql = "SELECT * FROM product WHERE product_id LIKE '$data' OR `product_name`LIKE '$data'";
// echo $sql;

$query=mysqli_query($conn,$sql);
$res = [];
while ($row=mysqli_fetch_array($query)) {
    $res[] = [
        'product_id' => $row['product_id'],
        'product_name' => $row['product_name'],
        'product_price' => $row['price'],
        'product_quantity' => $row['quantity'],
        'product_unit' => $row['unit'],
    ];
}

    echo json_encode([
        'data' => $res,
    ]);
?>