<?php
    $dbHost="127.0.0.1";
    $dbUser="root";
    $dbPass="";
    $dbName="progaming";

    $conn=mysqli_connect($dbHost,  $dbUser,  $dbPass,  $dbName);
    if ($conn)
        {
            $setLang=mysqli_query($conn,"SET NAMES 'utf8'");
        }
    else
        die("Kết nối thất bại".mysqli_connect_error());
?>