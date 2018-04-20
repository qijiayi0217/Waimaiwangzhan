
<?php
	$userID=$_POST['userID'];
	$passwd=$_POST['password'];
	$usertype=$_POST['usertype'];
	require_once('db_setup.php');
	$sql='use xzh116;';
	$conn->query($sql);

	
	$sql="select * from Users where UserID='$userID' and password='$passwd' and Usertype='$usertype';";
	$result =$conn->query($sql);
	$conn->close();
	$data=array("type"=>$usertype);
	if ($result->num_rows > 0) {
		header('HTTP/1.1 200 OK');
		header("Content-type: application/json");
		setcookie("userID","$userID",time()+180,'/');
		setcookie("passwd","$passwd",time()+180,'/');
		setcookie("usertype","$usertype",time()+180,'/');
		echo json_encode($data);
		
	}
	else {
		header('HTTP/1.1 500 Internal Server Error');
		header("Content-type: application/json");
		die(json_encode($data));
		//echo "error";
	}

?>
