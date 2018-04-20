<!DOCTYPE html>
<html>
<head>
	<title>Pay!</title>
	<script type="text/javascript" src='checkcookie.js'></script>
</head>
<body>
	<form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br>
	<center>
		<?php 
		date_default_timezone_set('America/New_York');
		$restaurant=$_COOKIE['restaurant'];
		$user=$_COOKIE['userID'];
		setcookie("restaurant","",time()-3600,'/');
		require_once('db_setup.php');
		$sql="use xzh116;";
		$conn->query($sql);
		$keys=array();
		$values=array();
		foreach($_POST as $key=>$value){
			array_push($keys,$key);
			array_push($values,$value);
		}
		$ordID=uniqid();
		$num=count($keys);
		$date=date("Y-m-d H:i:s");
		$sql="insert into Orders values('$ordID','$user','$date','$date');";
		if($conn->query($sql)){
		for($x=0;$x<$num;$x++){
			if ($values[$x]!=0){
			$sql="insert into ProdOrder values('$ordID','$keys[$x]','$values[$x]');";
			if($conn->query($sql)){
				$message='<p style="color:green">Order received!</p>';
			}else{
				$message='<p style="color:red">Fail to Order!</p>';
			}

			}
			}
		}else{
			$message='<p style="color:red">Fail to Order!</p>';
		}
		
	?>
		<?php echo $message; ?>
		<form method='POST' action='createbill.php'>
			<table>
				<tr>
					<td>Address: </td><td><input type="text" name="addr"></td>
				</tr>
				<tr>
					<td>Credit Card Number: </td><td><input type="text" name="card"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" value="Submit"></td>
				</tr>
			
		</table>
		</form>
	</center>
</body>
</html>
