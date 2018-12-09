<?php 
include("conn.php");

$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];    
$responseArr = array(
	"code" => 200,
	"data" => null,
	"msg" => "数据获取成功"
);
// var_dump($responseArr);
// echo $action;
switch ($action) {
	case 'clue':
		$sql = "select * from ".$action;
        //查询数据库，返回一个对象（记录集）
        $result = mysqli_query($conn,$sql);
        //判断返回查询的条数
        if(mysqli_num_rows($result)>0){
            $clueArr = array();
            //result通过mysqli_fetch_assoc转化为数组
            while($row=mysqli_fetch_assoc($result)){
                $clueArr[] = $row;
            }
            $responseArr["data"] = $clueArr;
            // var_dump($clueArr);
        }else{
            $responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
        }
		die(json_encode($responseArr));
		break;
	// case 'news':
	// 	$sql = "select * from ".$action;
	// 	$result = mysqli_query($conn,$sql);
	// 	if( mysqli_num_rows($result)>0 ){
	// 		$new = array();
	// 		while($row=mysqli_fetch_assoc($result)){
	// 			$new[]=$row;
	// 		}
	// 		// var_dump($studentlist);
	// 		$responseArr["data"] = $new;
	// 	}else{
	// 		$responseArr["code"] = 207;
	// 		$responseArr["msg"] = "暂无记录";
	// 	}
	// 	die(json_encode($responseArr));
	// 	break;
	
	default:
		echo "请指定正确的参数";
		break;
}
 ?>