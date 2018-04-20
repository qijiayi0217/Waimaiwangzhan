<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src='checkcookie.js'></script>
</head>
<body>
	<form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br>
	<center>
<?php
	$userID=$_COOKIE['userID'];
	require_once('db_setup.php');
	$sql="use xzh116";
	$conn->query($sql);
	$sql="select OrID,UserID,ODate from Orders where UserID='$userID';";
	$result=$conn->query($sql);
	if ($result->num_rows >0){
		while ($row=$result->fetch_assoc()){
			echo "<br><p>Order ID: ".$row['OrID']." Order Date: ".$row['ODate']."</p>";
			$oid=$row['OrID'];
			$sql1="select p.PName,o.Quan from Prod p,ProdOrder o where o.PID=p.PID and o.OrID='$oid';";
			$result1=$conn->query($sql1);
			echo "<table border='8'><tr><th>Product</th><th>Quantity</th></tr>";
			while ($row1=$result1->fetch_assoc()){
				echo "<tr><td>".$row1['PName']."</td><td>".$row1['Quan']."</td></tr>";
			}
			echo "</table>";
		}
	}else{
		echo "You have no order before.";
	}
?>
	<br>
	<button onclick='javascript:window.location.href="welcome.php"'>Back to Homepage</button>
</center>
</body>
</html>