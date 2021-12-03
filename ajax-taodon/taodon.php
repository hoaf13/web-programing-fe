<?php
ob_start();
session_start();
include_once '../ketnoi.php';
$options = json_decode($_POST['data']);
$sql = "INSERT INTO order_product VALUES (null,".$options->employer_id.",".$options->user_id.",'".$options->appointment."',".$options->phuongthucthanhtoan.",".$options->hinhthucvanchuyen.",".$options->chinhanh.",0,".$options->trangthaithanhtoan.",".$options->total.")";

$query=mysqli_query($conn,$sql);
$sql = "SELECT max(order_id) FROM order_product";
$query=mysqli_query($conn,$sql);


// $res = [];
// $res[] = [
//     'fullname' => $_SESSION['fullname'],
//     'id' => $_SESSION['id']
// ];
$row=mysqli_fetch_array($query);
// }
foreach ($options->product as $product) {
    $sql = "INSERT INTO detail_order VALUES (null,$product->product_id,$row[0],$product->quantity )";
    $query=mysqli_query($conn,$sql);
}

    echo json_encode([
        'message' => 'success'
    ]);
?>