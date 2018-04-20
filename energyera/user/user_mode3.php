<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require_once('db_setup.php');
	$sql="use jqi8";
	$conn->query($sql);
	$company=$_POST['company'];
	$etype=$_POST['etype'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$sql="select Rname,sum(Amount) as sum from Produce where Cname='$company' and Year>='$start' and Year<='$end' and Etype='$etype' group by Rname;";
	$result=$conn->query($sql);	
	?>
</head>
<body style="background:#FFFFCC">
	<center>
	<h3>Produced Energy Type: <?php echo $etype; ?></h3>
	<h3>Company: <?php echo $company; ?></h3>
	<h3>From <?php echo $start; ?> to <?php echo $end; ?></h3>
	<h3>
	<?php 
		if($result->num_rows>0){
		while ($row=$result->fetch_assoc()){
			if($row['sum']){
				echo "By ".$row['Rname'].": ".$row['sum']." kJ<br>";
			}
		}
	}else{
		echo "This company didn't produce this type of energy in this period!";
	}
	?></h3>
	<button type="button" onclick="javascript:window.location.href='index.php'">Back to Homepage</button>
	</center>
</body>
</html>