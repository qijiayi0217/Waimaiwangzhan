<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src='checkcookie.js'></script>
	<?php 
		date_default_timezone_set('America/New_York');
		require_once('db_setup.php');
		$sql="use xzh116;";
		$conn->query($sql);
		$user=$_COOKIE['userID'];
		$bid=uniqid();
		$date=date("Y-m-d H:i:s");
		$addr=$_POST['addr'];
		$card=$_POST['card'];
		$sql="insert into Bill values('$bid','$user','$addr','$date','$card')";
	?>
</head>
<body><form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br><center>
	<?php
		if($conn->query($sql)){
			echo '<h2 style="color:green">Save billing information succesully</h2>';
		}else{
			echo '<h2 style="color:red">Fail to save billing information</h2>';
		}
	?>
		<h4>Bill ID: <?php echo $bid?> Bill Date: <?php echo $date?></h4>
	<button onclick='javascript:window.location.href="welcome.php"'>Back to Homepage</button></center>
</body>
</html>