<!DOCTYPE html>
<html>
<head>

	<?php 
	require_once('db_setup.php');
	$sql="use jqi8";
	$conn->query($sql);
	$Company=$_POST['company'];
	$Etype=$_POST['etype'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	if ($Etype!='All'){
		$sql="select sum(Amount) as sum from Consume where Cname='$Company' and Etype='$Etype' and Year>='$start' and Year<='$end';";
	}else{
		$sql="select sum(Amount) as sum from Consume where Cname='$Company' and Year>='$start' and Year<='$end';";
	}
	$result=$conn->query($sql);	
	?>
	<title></title>
</head>
<body style="background:#FFFFCC">
	<center>
	<h3>Energy Type: <?php echo $Etype; ?></h3>
	<h3>Company: <?php echo $Company; ?></h3>
	<h3>From <?php echo $start; ?> to <?php echo $end; ?></h3>
	<h3>Consumed Amount: <?php 
		while ($row=$result->fetch_assoc()){
			if($row['sum']){echo $row['sum'];
		}else{
			echo "0";
		}
		}
	?> kJ</h3>
	<button type="button" onclick="javascript:window.location.href='index.php'">Back to Homepage</button>
	</center>
</body>
</html>