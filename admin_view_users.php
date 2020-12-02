<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Search Users</title>
		<link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <h1>Admin Search Users</h1>
		<h3>To search for a user, enter their information and click "Search""</h3>
		<h4>There are 3 ways to search:</h4>
		<h4>- Enter their username</h4>
		<h4>- Enter their first and last name</h4>
		<h4>- Enter their last name</h4>

		<form method="post">
      <label for="make">Username:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="model">First Name:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="color">Last Name:</label><br>
      <input type="text" name="query[]" value=""><br><br>
      <input type="submit" value="Search"><br><br>
    </form>

		<?php
		// Initialize array to read data into from form
		$array = array();
		// if POST, read data into array
		if(isset($_POST['query'])) {
			foreach($_POST['query'] as $value) {
				array_push($array, $value);
				//echo "accepted: " . $value . "<br>"; // debug
			}
			// Create sql query
			$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
			//$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// search for user with username or first and last name
			$sql = "SELECT * FROM user WHERE username = '$array[0]' OR (first_name = '$array[1]' AND last_name = '$array[2]') OR last_name = '$array[2]';";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table class='center'>
					<tr>
						<th>Username</th>
						<th>Password</th>
						<th>Phone Number</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Age</th>
						<th>Email</th>
						<th>Address</th>
					</tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["username"]. "</td><td>" . $row["password"] . "</td><td>"
					. $row["phone_num"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td>
					<td>" . $row["age"]. "</td><td>" . $row["email"] . "</td><td>" . $row["address"] . "</td></tr>";
				}
			}
			// if no users were found
			else {
				echo "ERROR: Your search wielded no results. Please check your information and try again.<br>";
			}
			mysqli_close($conn);
		}
		?>

	</table>

		<br>
		<a href="admin_homepage.html">Admin Homepage</a>
  </body>
</html>
