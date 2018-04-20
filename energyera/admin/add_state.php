<?php
require_once('db_setup.php');
$sql = "USE jqi8;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$name = $_POST['name'];
$pop = $_POST['population'];
$gdp = $_POST['gdp'];
$sql = "INSERT INTO State values (\"$name\", $pop, \"$gdp\");";


#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>

<?php
$conn->close();
?>
<button onclick="javascript:window.location.href='index.html'">Back</button>