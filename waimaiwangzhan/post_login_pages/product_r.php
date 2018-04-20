<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src='checkcookie.js'></script>
</head>
<body>
	<form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br>
<center>	<h4>You have selected <?php $restaurant=$_POST['restaurant'];
		echo $restaurant;
		setcookie("restaurant","$restaurant",time()+180,'/');
	?></h4>
	<?php
		require_once('db_setup.php');
		$sql='use xzh116;';
		$conn->query($sql);
		$sql="select UserID as UI from Users where Rname='$restaurant';";
		$result=$conn->query($sql);
		//echo $result;
		if ($result->num_rows >0){
		while ($row=$result->fetch_assoc()){
		$Owner= $row['UI'];}}
		//echo $Owner;
		$sql="select p.PID,p.PName,p.PPrice,p.PDisc from Users u,Prod p,RProduct r where u.UserID=r.UID and r.PID=p.PID and u.Rname='$restaurant' and u.UserID='$Owner';";
		$result1=$conn->query($sql);
	?>
	<form method="POST" action="pay_new.php">
<table class="table table-striped">
		<tr>
		<th>ProductID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Category</th>
		<th>Quantity</th>
	</tr>
	<?php if ($result1->num_rows >0){
			while ($row=$result1->fetch_assoc()){
		?>
	
	<tr>
		<td><?php echo $row['PID'];$pp=$row['PID'];?></td>
		<td><?php echo $row['PName'];?></td>
		<td><?php echo $row['PPrice'];?></td>
		<td><?php echo $row['PDisc'];?></td>
		<td><?php 
			$sql1="select CateName from PCate where PID='$pp';";
			$result3=$conn->query($sql1);
		//echo $result;
			if ($result3->num_rows >0){
				while ($row2=$result3->fetch_assoc()){
					echo $row2['CateName'];
					echo ' | ';
					}
				}

		?></td>
		<td><select name="<?php echo $row['PID']?>"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option></select></td>
	</tr>
	<?php } ?>
	</table>
	<input type="submit" value="Order">
</form>
<?php }
	else{
		?> <h2>There is no product in this restaurant this time...</h2><?php
	}
 ?>
</center>
<br>
</body>
</html>
