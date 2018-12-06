<?php
 //进入数据库
 $conn=mysqli_connect("localhost","root","");
 //选择要操作的数据库
 mysqli_select_db($conn,"zohoopen");
 //设置读取数据库编码，不然有可能显示乱码
 mysqli_query($conn,"set names utf8");
 $action=empty($_REQUEST['action'])?"add":$_REQUEST['action'];
 $array=array(
     "code" => 200,
     "data" =>null,
     "msg" =>"数据获取成功",
 );
 switch($action){
     case 'jiaoyi':
     $sql="select * from ".$action;
     $result=mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
         $jiaoyi=array();
         while($row=mysqli_fetch_assoc($result)){
             $jiaoyi[]=$row;
         }
         $array['data']=$jiaoyi;
     }else{
         $array['code']=207;
         $array['msg']="暂无记录";
     }
     die(json_encode($array));
     break;
 }
?>