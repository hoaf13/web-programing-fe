<?php
	include_once '../ketnoi.php';
    $id = $_POST['id'];
    // foreach ($data as $id) {
        $sql = "DELETE FROM order_product WHERE order_id=$id";
    // }
    $query=mysqli_query($conn,$sql);
    echo json_encode([
        'message' => 'success'
    ]);
?>