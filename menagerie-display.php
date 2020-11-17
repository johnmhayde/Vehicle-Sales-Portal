<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
		<link rel="stylesheet" href="/css/stylesheet.css">
  </head>
  <body>
    <h1>Sample Data</h1>
    <table class="center">
      <tr>
        <th>Name</th>
        <th>Owner</th>
        <th>species</th>
        <th>Sex</th>
        <th>Birth</th>
        <th>Death</th>
      </tr>

<?php
$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "menagerie");
// for production server
// $conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, owner, species, sex, birth, death FROM pet";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["owner"] . "</td><td>"
. $row["species"]. "</td><td>" . $row["sex"]. "</td><td>" . $row["birth"]. "</td>
<td>" . $row["death"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
	<br></br>
  <a href="index.html">Home Page</a>

  </body>
</html>
