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
$table = $_POST['tables'];

$sql = "SELECT * FROM $table;";

$result = $conn->query($sql);

if ($result === FALSE)
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($result->num_rows > 0) {
?>
    <?php
    switch ($table)
    {
        case "State":
                ?>
            <table class="table table-striped">
            <tr>
            <th>Name</th>
            <th>Population</th>
            <th>GDP</th>
            </tr>
            <?php
            break;
        case "Company":
            ?>
            <table class="table table-striped">
            <tr>
            <th>Cname</th>
            <th>BranchID</th>
            <th>Location</th>
            </tr>
            <?php
            break;
        case "Resources":
                ?>
                <table class="table table-striped">
                <tr>
                <th>Rname</th>
                <th>Renewable</th>
                </tr>
                <?php
                break;
        case "Energy":
                ?>
            <table class="table table-striped">
            <tr>
            <th>Type</th>
            </tr>
            <?php
            break;
        case "Own":
            ?>
            <table class="table table-striped">
            <tr>
            <th>Amount</th>
            <th>Year</th>
            <th>Sname</th>
            <th>Rname</th>
            </tr>
            <?php
            break;
        case "Consume":
            ?>
            <table class="table table-striped">
            <tr>
            <th>Usage</th>
            <th>Year</th>
            <th>Amount</th>
            <th>Cname</th>
            <th>Etype</th>
            </tr>
            <?php
            break;
        case "Produce":
            ?>
            <table class="table table-striped">
            <tr>
            <th>Aomunt</th>
            <th>Year</th>
            <th>Rname</th>
            <th>Cname</th>
            <th>Etype</th>
            </tr>
            <?php
            break;
    }
    ?>
      
<?php
while($row = $result->fetch_assoc()){
?>
      <?php
    switch ($table)
    {
        case "State":
                ?>
                  <tr>
                  <td><?php echo $row['Name']?></td>
                  <td><?php echo $row['Population']?></td>
                  <td><?php echo $row['GDP']?></td>
              </tr>
            <?php
            break;
        case "Company":
            ?>
                  <tr>
                  <td><?php echo $row['Cname']?></td>
                  <td><?php echo $row['BranchID']?></td>
                  <td><?php echo $row['Location']?></td>
              </tr>
            <?php
            break;
        case "Resources":
                ?>
                      <tr>
                      <td><?php echo $row['Rname']?></td>
                      <td><?php echo $row['Renewable']?></td>
                  </tr>
                <?php
                break;
        case "Energy":
                ?>
                  <tr>
                  <td><?php echo $row['Type']?></td>
              </tr>
            <?php
            break;
        case "Own":
            ?>
            <tr>
            <td><?php echo $row['Amount']?></td>
            <td><?php echo $row['Year']?></td>
            <td><?php echo $row['Sname']?></td>
            <td><?php echo $row['Rname']?></td>
            </tr>
            <?php
            break;
        case "Consume":
            ?>
            <tr>
            <td><?php echo $row['Year']?></td>
            <td><?php echo $row['Amount']?></td>
            <td><?php echo $row['Cname']?></td>
            <td><?php echo $row['Etype']?></td>
            </tr>
            <?php
            break;
        case "Produce":
            ?>
            <tr>
            <td><?php echo $row['Amount']?></td>
            <td><?php echo $row['Year']?></td>
            <td><?php echo $row['Rname']?></td>
            <td><?php echo $row['Cname']?></td>
            <td><?php echo $row['Etype']?></td>
            </tr>
            <?php
            break;
    }
    ?>

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