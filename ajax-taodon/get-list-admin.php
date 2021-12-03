<?php
session_start();
include_once '../ketnoi.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id <> $id";

$query=mysqli_query($conn,$sql);
$res = [];
$res[] = [
    'fullname' => $_SESSION['fullname'],
    'id' => $_SESSION['id']
];
while ($row=mysqli_fetch_array($query)) {
    $res[] = $row;
}

echo json_encode([
    'data' => $res
]);

// echo "<script> console.log('$res') </script>"
?>