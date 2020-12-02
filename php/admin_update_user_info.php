<?php
// Double check all inputs are full and passwords match before letting user in
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if( $_POST["fname"] != '' && $_POST["lname"] != '' && $_POST["age"] != '' &&
      $_POST["phone_num"] != '' && $_POST["email"] != '' && $_POST["address"] != '' &&
      $_POST["username"] != '' && $_POST["password"] != '' && $_POST["password_confir"] != '' &&
      $_POST["password"] == $_POST["password_confir"]) {
      // Since user info approved, add them to user table
			$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
			//$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// Add data to user table
			$sql = "UPDATE user SET password = '$_POST[password]', phone_num = '$_POST[phone_num]', first_name = '$_POST[fname]', last_name = '$_POST[lname]', age = '$_POST[age]', email = '$_POST[email]', address = '$_POST[address]' WHERE username = '$_POST[username]'";
			$result = $conn->query($sql);
			mysqli_close($conn);
      // Redirect user to home page
      echo "<script> window.location.assign('../admin_homepage.html'); </script>";
  }
	else {
	echo "<h3>Form is incorrect, try again</h3>";
	sleep(3);
	echo "<script> window.location.assign('../admin_edit_user.php');</script>";
	}
}
?>
