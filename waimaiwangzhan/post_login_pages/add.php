<?php
$userID=$_COOKIE['userID'];
$PID=$_POST['PID'];
$PName=$_POST['PName'];
$PPrice=$_POST['PPrice'];
$PDes=$_POST['PDes'];
$PDisc=$_POST['PDisc'];
require_once('db_setup.php');
$sql='use xzh116;';
$conn->query($sql);
$data=array("userID"=>$userID);
//echo $PID;
//echo $PName;
//echo $PPrice;
//echo $PDes;
//echo $PDisc;
$sql="insert into Prod values('$PID','$PName','$PPrice','$PDes','$PDisc');";
if ($conn->query($sql)===TRUE){
	$sql="insert into RProduct values('$userID','$PID');";
	$conn->query($sql);
	header('HTTP/1.1 200 OK');
	header("Content-type: application/json");
	echo json_encode($data);
	//echo 'success';
}else
{
	header('HTTP/1.1 500 Internal Server Error');
	header("Content-type: application/json");
	die(json_encode($data));
	//echo 'error';
}
?>