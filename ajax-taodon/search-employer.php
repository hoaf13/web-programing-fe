<?php
ob_start();
session_start();
include_once '../ketnoi.php';
$data = '%'.$_POST['data'].'%';
$sql = "SELECT * FROM employer WHERE employer_id LIKE '$data' OR `employer_fullname`LIKE '$data' OR phone LIKE '$data'";
// echo $sql;

$query=mysqli_query($conn,$sql);
$res = [];
while ($row=mysqli_fetch_array($query)) {
    $res[] = [
        'employer_id' => $row['employer_id'],
        'fullname' => $row['employer_fullname'],
        'phone' => $row['phone'],
        'address' => $row['address'],
    ];
}

    echo json_encode([
        'data' => $res,
    ]);
?>