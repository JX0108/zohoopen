<?php
    $conn = mysqli_connect("localhost","root","");
    // if($conn){
    //     echo "连接成功";
    // }else{
    //     echo "连接失败".mysqli_connect_error();
    // }

    mysqli_select_db($conn,"zohoopen");
    mysqli_query($conn,"set names utf8");
?>