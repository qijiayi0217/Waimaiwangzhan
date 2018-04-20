<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		require_once('db_setup.php');
		$sql="use 461proj1";
		$conn->query($sql);
		$sql=$_POST['sql'];
		$type=$_POST['type'];
		echo "Your sql sentence: ".$sql;
		if ($type=='Insert'){
			if ($conn->query($sql)){
				echo "<h4 style='color:green'>Insert Successfully!</h4>";
			}else {
				echo "<h4 style='color:red'>Fail to Insert!</h4>";
			}
		}elseif ($type=='Update') {
			if ($conn->query($sql)){
				echo "<h4 style='color:green'>Update Successfully!</h4>";
			}else {
				echo "<h4 style='color:red'>Fail to Update!</h4>";
			}
		}elseif ($type=='Select') {
			$result=$conn->query($sql);
			if ($result->num_rows>0){
				$test=0;
				while ($row=$result->fetch_assoc()){
					foreach ($row as $key => $value) {
						echo $key.": ".$value;
					}
				}
			}else{
				echo "<h4 style='color:red'>Nothing!</h4>";
			}
		}else {
			if ($conn->query($sql)){
				echo "<h4 style='color:green'>Delete Successfully!</h4>";
			}else {
				echo "<h4 style='color:red'>Fail to Delete!</h4>";
			}
		}
	?>
	<button type="button" onclick="javascript:window.location.href='index.php'">Go Back</button>
</body>
</html>