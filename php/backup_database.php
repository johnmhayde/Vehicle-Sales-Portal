<?php
// Connect to database
$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
//$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
// check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// user backup section

// Pull info from user table
$sql = "SELECT * FROM user;";
$result = $conn->query($sql);
// Create array to hold user data
$userArr = array();
// Loop through user table and copy to array
while($row = $result->fetch_assoc()) {
	$userArr[] = $row;
}
// Open output file
$userFile = fopen('../table_backups/user_data.json', 'w');
// Write userArr to output file
fwrite($userFile, json_encode($userArr));
// Close file
fclose($userFile);
// allow download of user file
echo "<a href='../table_backups/user_data.json' download>Download user JSON file</a><br><br>";

// vehicle backup section

// Pull info from vehicle table
$sql = "SELECT * FROM vehicle;";
$result = $conn->query($sql);
// Create array to hold user data
$vehicleArr = array();
// Loop through user table and copy to array
while($row = $result->fetch_assoc()) {
	$vehicleArr[] = $row;
}
// Open output file
$vehicleFile = fopen('../table_backups/vehicle_data.json', 'w');
// Write vehicleArr to output file
fwrite($vehicleFile, json_encode($vehicleArr));
// Close file
fclose($vehicleFile);
// allow download of vehicle file
echo "<a href='../table_backups/vehicle_data.json' download>Download vehicle JSON file</a><br><br>";

// Admin backup section

// Pull info from admin table
$sql = "SELECT * FROM admin;";
$result = $conn->query($sql);
// Create array to hold admin data
$adminArr = array();
// Loop through user table and copy to array
while($row = $result->fetch_assoc()) {
	$adminArr[] = $row;
}
// Open output file
$adminFile = fopen('../table_backups/admin_data.json', 'w');
// Write adminArr to output file
fwrite($adminFile, json_encode($adminArr));
// Close file
fclose($adminFile);
// allow download of admin file
echo "<a href='../table_backups/admin_data.json' download>Download admin JSON file</a><br><br>";

// Give user route back to homepage
echo "<a href='../admin_homepage.html'>Admin Homepage</a>";

// Close SQL connection
mysqli_close($conn);
?>
