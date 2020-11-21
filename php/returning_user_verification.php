<?php
// Double check all inputs are full and passwords match before letting user in
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if( $_POST["username"] != '' && $_POST["password"] != '') {
      // Since user info approved, add them to user table
			$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// verify user input with data stored in table
			$sql = "SELECT username, password FROM user WHERE username = '$_POST[username]'";
			$result = $conn->query($sql);
			// check to see if user is in system
			if(mysqli_num_rows($result) > 0) {
				// verify their password
				while($row = $result->fetch_assoc()) {
					if($row["password"] == $_POST["password"]) {
						// Redirect user to home page
						echo "<script> window.location.assign('../homepage.php'); </script>";
					}
					// password not correct
					else {
						echo "<h3>Password is incorrect, try again.</h3>";
						sleep(3);
						echo "<script> window.location.assign('../login.php'); </script>";
					}
				}
			}
			else {
				// did not find user
				echo "<h3>Could not find username in system, try again.</h3>";
				sleep(3);
				echo "<script> window.location.assign('../login.php'); </script>";
			}
			mysqli_close($conn);
      // // Redirect user to home page
      // echo "<script> window.location.assign('../homepage.php'); </script>";
  }
}
?>
