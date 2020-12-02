<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Edit User Information Page</title>
  </head>
  <body>
		<?php
		// Initialize variables in form
		$fname = $lname = $age = $phone_num = $email = $address = "";
		$username = $password = $password_confir = "";
		?>
		<h2>Admin Edit User Information Page</h2>
		<h4>Note: you cannot change username</h4>
    <form method="post" action="php/admin_update_user_info.php">
			<label for="fname">Username:</label><br>
      <input type="text" name="username" value="<?php echo $username;?>"><br>
			<h4>Enter new user information below:</h4>
      <label for="fname">First Name:</label><br>
      <input type="text" name="fname" value="<?php echo $fname;?>"><br>
      <label for="lname">Last Name:</label><br>
      <input type="text" name="lname" value="<?php echo $lname;?>"><br>
      <label for="age">Age:</label><br>
      <input type="text" name="age" value="<?php echo $age;?>"><br>
      <label for="phone_num">Phone Number:</label><br>
      <input type="text" name="phone_num" value="<?php echo $phone_num;?>"><br>
      <label for="email">Email Address:</label><br>
      <input type="text" name="email" value="<?php echo $email;?>"><br>
      <label for="address">Address:</label><br>
      <input type="text" name="address" value="<?php echo $address;?>"><br>
      <label for="password">Password:</label><br>
      <input type="text" name="password" value="<?php echo $password;?>"><br>
      <label for="password_confir">Confirm Password:</label><br>
      <input type="text" name="password_confir" value="<?php echo $password_confir;?>"><br><br>
      <input type="submit" value="Submit"><br><br>
    </form>

		<br><br>
		<a href="index.html">Log Out</a>
  </body>
</html>
