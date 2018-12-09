<?php
$clueOwner = empty($_REQUEST["clueOwner"])?"null":$_REQUEST["clueOwner"];
$name = empty($_REQUEST["name"])?"null":$_REQUEST["name"];
$position = empty($_REQUEST["position"])?"null":$_REQUEST["position"];
$telephone = empty($_REQUEST["telephone"])?"null":$_REQUEST["telephone"];
$mobile = empty($_REQUEST["mobile"])?"null":$_REQUEST["mobile"];
$source = empty($_REQUEST["source"])?"null":$_REQUEST["source"];
$industry = empty($_REQUEST["industry"])?"null":$_REQUEST["industry"];
$income = empty($_REQUEST["income"])?"null":$_REQUEST["income"];
$company = empty($_REQUEST["company"])?"null":$_REQUEST["company"];
$surname = empty($_REQUEST["surname"])?"null":$_REQUEST["surname"];
$email = empty($_REQUEST["email"])?"null":$_REQUEST["email"];
$website = empty($_REQUEST["website"])?"null":$_REQUEST["website"];
$state = empty($_REQUEST["state"])?"null":$_REQUEST["state"];
$staff = empty($_REQUEST["staff"])?"null":$_REQUEST["staff"];
$grade = empty($_REQUEST["grade"])?"null":$_REQUEST["grade"];
$spare = empty($_REQUEST["spare"])?"null":$_REQUEST["spare"];
$chenghu = empty($_REQUEST["chenghu"])?"null":$_REQUEST["chenghu"];

$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];

$sql = "insert into clue(clueOwner,surname,name,chenghu,campany,position,email,telephone,mobile,source,industry,income,website,state,staff,grade,spare) value('$clueOwner','$surname','$name','$chenghu','$company','$position','$email','$telephone','$mobile','$source','$industry','$income','$website','$state','$staff','$grade','$spare')";

include("conn.php");

$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('数据添加成功')</script>";
    header("Refresh:1;url=clue-input.html");
}else{
    echo "<script>alert('数据添加失败')</script>".mysqli_error($conn);
}
 
 
mysqli_close($conn);
 
?>