<?php 
$type=$_COOKIE['usertype'];
$userID=$_COOKIE['userID'];
$passwd=$_POST['passwd'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant list</title>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
		/*background:url(hotpot.gif);*/
		-moz-background-size:40% 100%;
		background-size:100% 100%;
		background-repeat:no-repeat;

	}
	</style>
	<!-- Latest compiled and minified CSS -->
<script type="text/javascript" src='checkcookie.js'></script>
<script type="text/javascript">
	function zx() {
    var form=document.getElementById("form");
    var keyword=document.getElementById("keyword");
    switch (keyword.value) {
        case "test":
           form.innerHTML="<object type='text/html' data='form1.html'></object>"; break;
        default:
           form.innerHTML="No Restaurant Matched!!!!!"; break;
    }
}
	function zx2() {
    var form1=document.getElementById("form1");
    var keyword1=document.getElementById("keyword1");
    switch (keyword1.value) {
        case "delete":
           form1.innerHTML="Product ID: <input type='text' name='PID' id='PID'><button type='button' onclick='deleteproduct()'>DELETE</button>"; break;
        case "add":
           form1.innerHTML="<table><tr><th></th><th></th></tr><tr><td>ID:</td><td> <input type='text' name='PID' id='PID'></td></tr><tr><td>Name: </td><td><input type='text' name='PName' id='PName'></td></tr><tr><td>Price: </td><td><input type='text' name='PPrice' id='PPrice'></td></tr><tr><td>Description: </td><td><input type='text' name='PDes' id='PDes'></td></tr><tr><td>Discount: </td><td><input type='text' name='PDisc' id='PDisc'></td></tr><tr><td></td><td><button type='button' id='addprod' onclick='addproduct()'>ADD</button></td></tr></table>"; break;
        case "update":
           form1.innerHTML="<table><tr><th></th><th></th></tr><tr><td>Product ID:</td><td> <input type='text' name='PID' id='PID'></td></tr><tr><td>Price:</td><td><input type='text' name='price' id='PPrice'></td></tr><tr><td></td><td><button type='button' onclick='updateproduct()'>UPDATE</button></td></tr></table>"; break;
    }
}

	//ajax for add
	$(document).ready(function(){
			console.log("script loaded...");
			//$('#addprod').click(addproduct);
			//var $PID=$('#PID').val();
			//console.log($PID);
		})
		function addproduct(){
			var $PID=$('#PID').val();
			var $PName=$('#PName').val();
			var $PPrice=$('#PPrice').val();
			var $PDisc=$('#PDisc').val();
			var $PDes=$('#PDes').val();
			console.log($PID);
			console.log($PName);
			console.log($PPrice);
			console.log($PDes);
			console.log($PDisc);
			$.ajax({
				url: 'http://localhost/waimaiwangzhan/post_login_pages/add.php',
				data:{
					PID: $PID,
					PName: $PName,
					PPrice: $PPrice,
					PDisc: $PDisc,
					PDes: $PDes
				},
				type: "POST",
				dataType: "json",
				success: function(data){
					console.log('success!');
					window.location.href="http://localhost/waimaiwangzhan/post_login_pages/welcome.php";
				},
				error: function(data){
					console.log("error!");
					console.log(data);
					//$('#password').val('');
					var response=document.getElementById("response");
					response.innerHTML="<a style='color:red'>Fail to add product</a>";
				}
			});
		}

		//update ajax
		function updateproduct(){
			var $PID=$('#PID').val();
			//var $PName=$('#PName').val();
			var $PPrice=$('#PPrice').val();
			//var $PDisc=$('#PDisc').val();
			//var $PDes=$('#PDes').val();
			console.log($PID);
			//console.log($PName);
			console.log($PPrice);
			//console.log($PDes);
			//console.log($PDisc);
			$.ajax({
				url: 'http://localhost/waimaiwangzhan/post_login_pages/update.php',
				data:{
					PID: $PID,
					//PName: $PName,
					PPrice: $PPrice
					//PDisc: $PDisc,
					//PDes: $PDes
				},
				type: "POST",
				dataType: "json",
				success: function(data){
					console.log('success!');
					window.location.href="http://localhost/waimaiwangzhan/post_login_pages/welcome.php";
				},
				error: function(data){
					console.log("error!");
					console.log(data);
					//$('#password').val('');
					var response=document.getElementById("response");
					response.innerHTML="<a style='color:red'>Fail to update product</a>";
				}
			});
		}
		function deleteproduct(){
			var $PID=$('#PID').val();
			//var $PName=$('#PName').val();
			//var $PPrice=$('#PPrice').val();
			//var $PDisc=$('#PDisc').val();
			//var $PDes=$('#PDes').val();
			console.log($PID);
			//console.log($PName);
			//console.log($PPrice);
			//console.log($PDes);
			//console.log($PDisc);
			$.ajax({
				url: 'http://localhost/waimaiwangzhan/post_login_pages/delete.php',
				data:{
					PID: $PID,
					//PName: $PName,
					//PPrice: $PPrice
					//PDisc: $PDisc,
					//PDes: $PDes
				},
				type: "POST",
				dataType: "json",
				success: function(data){
					console.log('success!');
					window.location.href="http://localhost/waimaiwangzhan/post_login_pages/welcome.php";
				},
				error: function(data){
					console.log("error!");
					console.log(data);
					//$('#password').val('');
					var response=document.getElementById("response");
					response.innerHTML="<a style='color:red'>Fail to delete product!</a>";
				}
			});
		}
		
</script>
</head>
<body>
	<form><input class="logout" value="log out!" type=button onclick="open1234('userID','passwd','/')"></form><br>
<?php 
if ($type==='Customer'){
?>
	<center>
	<h1 style="WIDTH: 200px; color: #FF4500">Welcome! <?php echo $userID;?></h1>
	<form method="POST" name="search" action='search_r.php'>
		Any keyword: <input type="text" name="str" id="str">
		<input type="submit" value="Search"><br>
	</form>
	<br>
	<button type="button" onclick="javascript:window.location.href='c_orders.php'">Your Orders</button>
<br>
<div id="form">

</div>
	
</center>
<?php } else {
	require_once('db_setup.php');
	$sql='use xzh116;';
	$conn->query($sql);
	$sql="select p.PID,p.PName,p.PPrice,p.PDes,p.PDisc from Users u,Prod p,RProduct r where u.UserID=r.UID and r.PID=p.PID and u.UserID='$userID';";
	$result=$conn->query($sql);
	if ($result->num_rows > 0){
	?>
	<center>
	<h1 style="WIDTH: 200px; color: #FF4500">Welcome! <?php echo $userID; ?></h1>
	<!--
	<form><input value="Delete Product" type=button onclick="javascript:window.location.href='delete.html'"></form>
	<form><input value="Add Product" type=button onclick="javascript:window.location.href='add.html'"></form>
	<form><input value="Update Product" type=button onclick="javascript:window.location.href='update.html'"></form>
-->
	<h2>Your products are listed below:</h2>
	<table class="table table-striped">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Product Description</th>
			<th>Product Discount</th>
		</tr>
	<?php
	while($row = $result->fetch_assoc()){
	?>
		<tr>
			<td><?php echo $row['PID']?></td>
			<td><?php echo $row['PName']?></td>
			<td><?php echo $row['PPrice']?></td>
			<td><?php echo $row['PDes']?></td>
			<td><?php echo $row['PDisc']?></td>
		</tr>
	<?php
}
?>
		
	</table>
	
	<form method="POST" name="search">
		<select id="keyword1">
			<option value="delete">Delete product</option>
			<option value="add">Add product</option>
			<option value="update">Update product</option>
		</select>
		<input type="button" value="Go" onclick="zx2()"><br>
	</form><br>
	<div id="form1">
		
	</div>
	<div id='response'></div>
</center>
	<?php
}else{?>
	<center>
	<h1 style="WIDTH: 200px; color: #FF4500">Welcome! <?php echo $userID; ?></h1>
	<h2>You don't have any product!</h2>
	<form method="POST" name="search">
		<select id="keyword1">
			<option value="add">Add product</option>
		</select>
		<input type="button" value="Go" onclick="zx2()"><br>
	</form><br>
	<div id="form1">
		
	</div>
	<div id="response"></div>
</center>
<?php
}
}
?>
</body>
</html>