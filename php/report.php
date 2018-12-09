<?php
    // 连接数据库
    $conn = mysqli_connect("localhost","root","");
    // 选择要操作的数据库
    mysqli_select_db($conn,"report");
    // 设置读取数据库的编码不然汉字刽乱码
    mysqli_query($conn,"set names utf8");
    $action=empty($_REQUEST['action'])?"null":$_REQUEST['action'];
    $responseArr=array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功"
	);
switch ($action){
	case $action:
		$sql="select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if ( mysqli_num_rows($result)>0) {
			$studentlist=array();
			while ($row = mysqli_fetch_assoc($result)){
				$studentlist[]=$row;
			}
			// var_dump($studentlist);
			$responseArr["data"]=$studentlist;
		}else{
			$responseArr["msg"]="暂无记录";
			$responseArr["code"]=207;
		}
		die(json_encode($responseArr));
	break;
	default:
	echo "请输入正确的参数";
	break;
}
 // 关闭数据库
mysqli_close($conn);
?>