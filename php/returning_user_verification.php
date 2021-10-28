<?php
// Double check all inputs are full and passwords match before letting user in
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if( $_POST["username"] != '' && $_POST["password"] != '') {
      // Since user info approved, add them to user table
			$conn = mysqli_connect("127.0.0.1", "root", "password", "db_name");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// Verify user input with data stored in table
			$sql = "SELECT username, password FROM user WHERE username = '$_POST[username]'";
			$result = $conn->query($sql);
			// check to see if user is in system
			if(mysqli_num_rows($result) > 0) {
				// verify their password
				while($row = $result->fetch_assoc()) {
					if($row["password"] == $_POST["password"]) {
						// Correct info, redirect user to home page
						echo "<script> window.location.assign('../homepage.html'); </script>";
					}
					// Password not correct
					else {
						echo "<h3>Password is incorrect, try again.</h3>";
						sleep(3);
						echo "<script> window.location.assign('../user_login.php'); </script>";
					}
				}
			}
			else {
				// Did not find username in system
				echo "<h3>Could not find username in system, try again.</h3>";
				sleep(3);
				echo "<script> window.location.assign('../user_login.php'); </script>";
			}
			mysqli_close($conn);
  }
}
?>
