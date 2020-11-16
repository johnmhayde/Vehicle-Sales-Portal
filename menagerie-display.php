<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Sample Data</h1>
    <table>
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

  <a href="index.html">Home Page</a>

  </body>
</html>
