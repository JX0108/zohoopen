<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"zohoopen");
mysqli_query($conn,"set names utf8");

    $sql2 = "select distinct *  from client";
    $result2 = mysqli_query($conn,$sql2);
    
    if (mysqli_num_rows($result2) > 0) {
        // 输出数据
        $list = array();
        while($row = mysqli_fetch_assoc($result2)) {
          $list[] = $row;
        }
        $Arr["data"] = $list;
    } else {
        $Arr["code"] = 207;
        $Arr["msg"] = "暂无记录";
    }
    mysqli_close($conn);
    die(json_encode($Arr));
?>