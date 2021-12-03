<?php
session_start();
include_once '../ketnoi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$username' AND `password` = '$password' LIMIT 1";

// echo $sql;
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);


if($row){
    $_SESSION["username"]=$row['username'];
    $_SESSION["fullname"]=$row['fullname'];
    $_SESSION["id"]=$row['id'];
    echo json_encode([
        'message' => 'success',
        'data' => 'Đăng nhập thành công'
    ]);
} else echo json_encode([
    'message' => 'failed',
    'data' => 'Sai tên đăng nhập hoặc mật khẩu'
])
?>