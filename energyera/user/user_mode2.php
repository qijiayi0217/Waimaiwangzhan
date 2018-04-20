<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require_once('db_setup.php');
	$sql="use jqi8";
	$conn->query($sql);
	$State=$_POST['State'];
	$Resources=$_POST['Resources'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$sql="select sum(Amount) as sum from Own where Sname='$State' and Year>='$start' and Year<='$end' and Rname='$Resources';";
	?>
</head>
<body style="background:#FFFFCC">
	<center>
	<h3>Resources Type: <?php echo $Resources; ?></h3>
	<h3>State: <?php echo $State; ?></h3>
	<h3>From <?php echo $start; ?> to <?php echo $end; ?></h3>
	<h3> Owned Amount: <?php 
	//if ($result->num_rows>0){
		$result=$conn->query($sql);	
		
		while ($row=$result->fetch_assoc()){
			if ($row['sum']){echo $row['sum'];
		}else{
			echo "0";
			//$check=1;
		}
		}
		
		//}else{
		//	$num=0;
		//	echo $num;
		//}
	?> kJ</h3>
	<button type="button" onclick="javascript:window.location.href='index.php'">Back to Homepage</button>
	</center>
</body>
</html>