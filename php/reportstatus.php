<?php 
 // 连接数据库
 $conn = mysqli_connect("localhost","root","");
 // 选择要操作的数据库
 mysqli_select_db($conn,"report");
 // 设置读取数据库的编码不然汉字刽乱码
 mysqli_query($conn,"set names utf8");
 $responseArr=array(
	"code"=>200,
	"msg"=>"数据获取成功"
	);
 $action=empty($_REQUEST['action'])?"null":$_REQUEST['action'];
 $reid=empty($_REQUEST['reid'])?"null":$_REQUEST['reid'];
 if($action=="upload"){
    $sql = "update report set status = 2 where id = '{$reid}'";
 }else{
    $sql = "update report set status = 1 where id = '{$reid}'";
 }
 $result = mysqli_query($conn,$sql);
	if ($result) {
		$responseArr["mag"]="数据修改成功";
	}else{
		$responseArr["mag"]="数据修改失败";
	}
mysqli_close($conn);
die(json_encode($responseArr));
?>