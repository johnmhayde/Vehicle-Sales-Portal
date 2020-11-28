<?php
// Double check all inputs are full and passwords match before letting user in
if($_SERVER["REQUEST_METHOD"] == "POST") {
  if( $_POST["fname"] != '' && $_POST["lname"] != '' && $_POST["age"] != '' &&
      $_POST["phone_num"] != '' && $_POST["email"] != '' && $_POST["address"] != '' &&
      $_POST["username"] != '' && $_POST["password"] != '' && $_POST["password_confir"] != '' &&
      $_POST["password"] == $_POST["password_confir"]) {
      // Since user info approved, add them to user table
			$conn = mysqli_connect("127.0.0.1", "root", "johnmichael06", "4620_proj");
			//$conn = mysqli_connect("mysql1.cs.clemson.edu", "cpsc4620_1_1ncu", "johnmichael06", "cpsc4620_1_7ma4");
			// check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// Add data to user table
			$sql = "INSERT INTO user VALUES('$_POST[username]', '$_POST[password]', '$_POST[phone_num]', '$_POST[fname]', '$_POST[lname]', '$_POST[age]', '$_POST[email]', '$_POST[address]')";
			$result = $conn->query($sql);
			mysqli_close($conn);
      // Redirect user to home page
      echo "<script> window.location.assign('../homepage.php'); </script>";
  }
}
?>
