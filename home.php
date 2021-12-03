<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <!-- import boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

<?php
session_start();
if (!isset($_SESSION['id'])) 	header('location: index.html');

$link = '';
    if(isset($_GET['page'])){
        switch($_GET['page']){
        case 'duyet-don-hang': $link= 'duyet-don-hang.php';
        break;
        default:
        $link= 'tao-don-hang.php';
        break;
    }
    }
    else $link= 'tao-don-hang.php';
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="nav-bg">
                <nav class="nav nav-pills">
                    <a class="nav-link nav-item <?php if ($link == 'tao-don-hang.php') echo 'active'?>" href="?page=tao-don-hang">Tạo Đơn Hàng</a>
                    <a class="nav-link nav-item <?php if ($link == 'duyet-don-hang.php') echo 'active'?>"" href="?page=duyet-don-hang">Duyệt Đơn Hàng</a>
                    <a class="nav-link nav-item" href="./login/logoff.php" class="log-off">Đăng xuất</a>
                </nav>
            </div>

            <!-- Workspace -->
            <div class="col-md-10">
                <div class="row" id="nav-menu">
                    <!-- <div class="btn btn-primary" style="width: 50px; ">Tạo đơn và duyệt </div>
                    <div class="btn btn-primary"> Trợ giúp </div> -->
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col">
                                <div class="display-6" style="color: black; margin-left: 50px;">
                                    <?php
                                        if(isset($_GET['page'])){
                                            switch($_GET['page']){
                                            case 'duyet-don-hang': echo 'Duyệt Đơn Hàng';
                                            break;
                                            default:
                                            echo 'Tạo Đơn Hàng';
                                            break;
                                        }
                                        }
                                        else echo 'Tạo Đơn Hàng';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" >
                        <div class="row">
                            <div class="col"> <div class="btn btn-warning"> Trợ giúp </div></div>
                        </div>
                    </div>
                </div>

                <?php
                include_once($link);
                ?>
</div>
</div>
</div>
</body>

<footer class="text-center text-white" style="background-color: #f1f1f1;">
<!-- Copyright -->
<div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
<a class="text-dark" href="https://www.facebook.com/hoaf13.6/">Nguyen Van Hoa - B18DCCN236</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Copyright -->
</footer>

</html>