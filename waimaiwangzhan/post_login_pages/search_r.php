<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src='checkcookie.js'></script>
	<?php
$userID=$_COOKIE['userID'];
$str=$_POST['str'];
//$PName=$_POST['PName'];
//$PPrice=$_POST['PPrice'];
//$PDes=$_POST['PDes'];
//$PDisc=$_POST['PDisc'];
require_once('db_setup.php');
$sql='use xzh116;';
$conn->query($sql);
//$data=array("userID"=>$userID);
//echo $PID;
//echo $PName;
//echo $PPrice;
//echo $PDes;
//echo $PDisc;
$sql="select Rname,address,UserID from Users where Usertype='Restaurant' and Rname like '%$str%';";
$result=$conn->query($sql);
?>
	<title></title>
</head>
<body>
	<form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br>
<center>
	<h1 style="WIDTH: 200px; color: #FF4500">Welcome! <?php echo $userID;?></h1>
	<form method="POST" name="search" action='search_r.php'>
		Any keyword: <input type="text" name="str" id="str">
		<input type="submit" value="Search"><br>
	</form>
<?php 
	if ($result->num_rows>0){
		?>
			<h2>We found some restaurant for you:</h2>
	<table class="table table-striped">
		<tr>
			<th>Restaurant Name</th>
			<th>Location</th>
			<th>Owner</th>
		</tr>
		<?php
	while($row = $result->fetch_assoc()){
	?>
		<tr>
			<td><?php echo $row['Rname'];?></td>
			<td><?php echo $row['address'];?></td>
			<td><?php echo $U=$row['UserID'];?></td>
			
		</tr>
		<?php } ?>
	</table>
	<form method="POST" action="product_r.php">
		Select a restaurant: <select name='restaurant'>
		<?php 
			$sql="select Rname from Users where Usertype='Restaurant' and Rname like '%$str%';";
			$result=$conn->query($sql);
			while($row = $result->fetch_assoc()){
		?>
			<option value="<?php echo $row['Rname'] ?>"><?php echo $row['Rname'] ?></option>
	<?php
		} ?>
	</select>
	<input type="Submit" value="Submit">
</form>
		<?php
	}
	else {
		?>
		<br>
			<h2 style="color:red">No Restaurant Matched! Please search again!</h2>
		<?php
	}
?>
</center>
</body>
</html>