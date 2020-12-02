<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vehicle Search Page</title>
	<link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <h1>Vehicle Search Page</h1>
		<h3>To search for a vehicle, enter any specific information you wish to search for, and click "submit"</h3>
		<h4>- If you do not know color, mileage, year, or price, simply search by just make, or by make and model!</h4>
		<h4>- For mileage and price, enter the maximum you wish to search for</h4>
		<h4>- For year, enter the minimum you wish to search for</h4>
		<h4>- If no vehicles match your search, the vehicles with corresponding make and model will be listed</h4>

		<form method="post">
      <label for="make">Make:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="model">Model:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="color">Color:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="mileage">Mileage:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="year">Year:</label><br>
      <input type="text" name="query[]" value=""><br>
      <label for="price">Price:</label><br>
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
			// find count, if only 1, search for just make
			$counter = 0;
			foreach($array as $value){
				if($value != "") {
					$counter += 1;
				}
			}
			//handle for just searching make
			if ($counter == 1) {
				// Create sql query for just make
				$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
				//$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
				// check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				// Add data to user table
				$sql = "SELECT * FROM vehicle WHERE make = '$array[0]'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo "<table class='center'>
						<tr>
							<th>VIN</th>
							<th>Color</th>
							<th>Make</th>
							<th>Model</th>
							<th>Mileage</th>
							<th>Year</th>
							<th>Price</th>
						</tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["vin"]. "</td><td>" . $row["color"] . "</td><td>"
						. $row["make"]. "</td><td>" . $row["model"]. "</td><td>" . $row["mileage"]. "</td>
						<td>" . $row["year"]. "</td><td>" . $row["price"] . "</td></tr>";
					}
				}
				mysqli_close($conn);
			}
			else {
				// Create sql query for each value not left blank
				$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
				//$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
				// check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				// search for all fields
				$sql = "SELECT * FROM vehicle WHERE make = '$array[0]' AND model = '$array[1]' AND color = '$array[2]' AND mileage < '$array[3]' AND year > '$array[4]' AND price < '$array[5]';";
				$result = $conn->query($sql);
				if ($result && $result->num_rows > 0) {
					echo "<table class='center'>
						<tr>
							<th>VIN</th>
							<th>Color</th>
							<th>Make</th>
							<th>Model</th>
							<th>Mileage</th>
							<th>Year</th>
							<th>Price</th>
						</tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>" . $row["vin"]. "</td><td>" . $row["color"] . "</td><td>"
						. $row["make"]. "</td><td>" . $row["model"]. "</td><td>" . $row["mileage"]. "</td>
						<td>" . $row["year"]. "</td><td>" . $row["price"] . "</td></tr>";
					}
				}
				// couldn't match all fields to any vehicle, search just make and model
				else {
					echo "Showing results for vehicles mathcing the requested make and model in stock.<br><br>";
					$sql = "SELECT * FROM vehicle WHERE make = '$array[0]' AND model = '$array[1]'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo "<table class='center'>
							<tr>
								<th>VIN</th>
								<th>Color</th>
								<th>Make</th>
								<th>Model</th>
								<th>Mileage</th>
								<th>Year</th>
								<th>Price</th>
							</tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>" . $row["vin"]. "</td><td>" . $row["color"] . "</td><td>"
							. $row["make"]. "</td><td>" . $row["model"]. "</td><td>" . $row["mileage"]. "</td>
							<td>" . $row["year"]. "</td><td>" . $row["price"] . "</td></tr>";
						}
						echo "</table>";
					}
				}
				mysqli_close($conn);
			}
		}
		?>

	</table>

		<br>
		<a href="homepage.html">User Homepage</a>
  </body>
</html>
