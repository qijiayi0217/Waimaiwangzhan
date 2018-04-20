<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
	<h2>Welcome, Admin!</h2>
	<form method="POST" action="modifydb.php">
		Type: <select name="type">
				<option value='Insert'>Insert</option>
				<option value='Update'>Update</option>
				<option value='Delete'>Delete</option>
				<option value='Select'>Select</option>
			</select><br>
		SQL sentence (no double quotation marks, you can use single quotation marks instead)<input type="text" name="sql"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>