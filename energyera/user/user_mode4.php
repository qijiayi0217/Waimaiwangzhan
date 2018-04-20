<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<?php 
	require_once('db_setup.php');
	$sql="use jqi8";
	$conn->query($sql);
	$amount=$_POST['amount'];
	$Etype=$_POST['etype'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$sql="select distinct m.Location,sum(Amount) as amount from Company m,Consume n where m.Cname=n.Cname group by m.Location having sum(Amount)>'$amount';";
	$result=$conn->query($sql);	
	?>
	<title></title>
</head>
<body style="background:#FFFFCC">
	<center>
	<h3>Energy Type: <?php echo $Etype; ?></h3>
	<h3>From <?php echo $start; ?> to <?php echo $end; ?></h3>
	<?php
	if ($result->num_rows>0){ 
		?><table class="table table-striped">
			<tr>
					<th>State</th>
					<th>Amount</th>
			</tr>
			<?php
		while ($row=$result->fetch_assoc()){
			?>
			<tr>
					<td><?php echo $row['Location']; ?></td>
					<td><?php echo $row['amount']; ?></td>
			</tr>
		<?php
		}?>
			</table>
		<?php
	}else{
		echo "<h3>No such kind of State!</h3>";
	}
	?>
	<button type="button" onclick="javascript:window.location.href='index.php'">Back to Homepage</button>
	</center>
</body>
</html>