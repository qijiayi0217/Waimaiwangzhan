<?php
	$userID=$_POST['userID'];
	$passwd=$_POST['password'];
	$usertype=$_POST['usertype'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$postcode=$_POST['postcode'];
	$address=$_POST['address'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$rname=$_POST['rname'];
	require_once('db_setup.php');
	$sql='use xzh116;';
	$conn->query($sql);

	
	$sql="insert into Users values('$userID','$phone','$email','$postcode','$address','$first','$last','$rname','$usertype','$passwd');";
	
	//$sql="select * from Users where UserID='$userID';";
	//$result=$conn->query($sql);
	//$conn->close();
	$data=array("user"=>$userID,"password"=>$passwd);
	if ($conn->query($sql)===TRUE) {
		header('HTTP/1.1 200 OK');
		header("Content-type: application/json");
		echo json_encode($data);
		
	}
	else {
		header('HTTP/1.1 500 Internal Server Error');
		header("Content-type: application/json");
		die(json_encode($data));
		//echo "error";
	}
?>