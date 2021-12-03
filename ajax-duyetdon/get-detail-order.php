<?php
session_start();
include_once '../ketnoi.php';
$order_id = $_POST['order_id'];

$sql = "SELECT * FROM order_product INNER JOIN employer ON employer.employer_id=order_product.employer_id INNER JOIN users ON users.id=order_product.user_id  WHERE order_id = $order_id" ;

$query=mysqli_query($conn,$sql);
$res = [];
$row=mysqli_fetch_array($query);
$res['order_id'] = $row['order_id'];
$res['appointment'] = $row['appointment'];
$res['total'] = $row['total'];
$res['employer_fullname'] = $row['employer_fullname'];
$res['fullname'] = $row['fullname'];
$res['address'] = $row['address'];
$res['phone'] = $row['phone'];
$res['trangthaiduyet'] = $row['trangthaiduyet'];
$res['trangthaithanhtoan'] = $row['trangthaithanhtoan'];
$res['detail'] = [];
$sql = "SELECT * FROM detail_order WHERE order_id = $order_id" ;
$query=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($query)) {
    $product_id = $row['product_id'];
    $sql1 = "SELECT * FROM product WHERE product_id = $product_id" ;
    $query1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($query1);
    $res['detail'][] = [
        'product_id' => $row['product_id'],
        'product_name' => $row1['product_name'],
        'quantity' => $row['quantity'],
        'price' => $row1['price'],
        'unit' => $row1['unit'],
    ];
}
echo json_encode([
        'data' => $res
    ]);
?>
