<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE jqi8;";
if ($conn->query($sql) === TRUE) {

} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$select = $_POST['select'];
$where = $_POST['where'];
$groupby = $_POST['groupby'];
$having = $_POST['having'];

$sql = "SELECT $select FROM Produce ";

if (!empty($where))
{
    $sql .= "WHERE $where "; 
}

if (!empty($groupby))
{
    $sql .= "GROUP BY $groupby ";
}

if (!empty($having))
{
    $sql .= "HAVING $having ";
}

$sql .= ";";

$result = $conn->query($sql);

if ($result === FALSE)
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($result->num_rows > 0) {
?>
      <table class="table table-striped">
      <tr>
         <th>Year</th>
         <th>Amount</th>
         <th>Rname</th>
         <th>Cname</th>
         <th>Etype</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['Year']?></td>
          <td><?php echo $row['Amount']?></td>
          <td><?php echo $row['Rname']?></td>
          <td><?php echo $row['Cname'] ?></td>
          <td><?php echo $row['Etype']?></td>
      </tr>

<?php
}
} else {
    echo "No results found";
}

?>

</table>

<?php
$conn->close();
?>
<center><button onclick="javascript:window.location.href='index.html'">Back</button></center>
</body>
</html>