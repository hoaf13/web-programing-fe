<?php
session_start();
include_once '../ketnoi.php';
$search = $_POST['search'];
$date = $_POST['date'];
$status = $_POST['status'];
$user_id = $_POST['user_id'];
$limit = intval($_POST['limit']);
$_SESSION['limit'] = $limit;
$page = ($_POST['page']>0)?intval($_POST['page']):1;
// $change = $_POST['change'];
$sql = "SELECT * FROM order_product INNER JOIN employer ON employer.employer_id=order_product.employer_id WHERE (order_product.order_id LIKE '%$search%' OR order_product.employer_id IN (SELECT employer_id FROM employer WHERE employer_fullname LIKE '%$search%' OR phone LIKE '%$search%'))" ;

if ($date) $sql.="AND appointment = '$date' ";
if ($status!=='') {
    switch($status){
        case 0: $sql.= "AND trangthaiduyet=0 ";
        break;
        case 1: $sql.= "AND trangthaiduyet=1 AND trangthaithanhtoan=0 ";
        break;
        case 2: $sql.= "AND trangthaiduyet=1 AND trangthaithanhtoan=1 ";
        break;
        case 3: $sql.= "AND trangthaiduyet=2 ";
        break;
        default:
        $sql.= "AND trangthaiduyet=0 ";
        break;
    }
}
if($user_id) {
    $sql.= "AND order_product.user_id=$user_id";
}
$start = ($page-1)* $limit;
$query=mysqli_query($conn,$sql);
$total = mysqli_num_rows($query);
// die($total);
$sql.=" LIMIT $start,$limit";
$query=mysqli_query($conn,$sql);
$res = [];

while ($row=mysqli_fetch_array($query)) {
    $res[] = $row;
}

echo json_encode([
    'data' => $res,
    'total' => $total,
    'page' => $page,
    'limit' => $limit
]);
// echo "<script> console.log('abcd') </script>";
?>
