<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New User Registration</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
  </head>
  <body>

    <?php
    // Initialize variables in form
    $fname = $lname = $age = $phone_num = $email = $address = "";
    $username = $password = $password_confir = "";
    // define error variables
    $fnameErr = $lnameErr = $ageErr = $phone_numErr = $emailErr =
    $addressErr = $usernameErr = $passwordErr = $password_confirErr =
    $matchErr = "";
    // Make sure every box is filled. If box is filled, post data. If not, throw error
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($_POST["fname"])) {
        $fnameErr = "First Name Required";
      } else {
        $fname = $_POST["fname"];
      }
      if(empty($_POST["lname"])) {
        $lnameErr = "Last Name Required";
      } else {
        $lname = $_POST["lname"];
      }
      if(empty($_POST["age"])) {
        $ageErr = "Age Required";
      } else {
        $age = $_POST["age"];
      }
      if(empty($_POST["phone_num"])) {
        $phone_numErr = "Phone Number Required";
      } else {
        $phone_num = $_POST["phone_num"];
      }
      if(empty($_POST["email"])) {
        $emailErr = "Email Required";
      } else {
        $email = $_POST["email"];
      }
      if(empty($_POST["address"])) {
        $addressErr = "Address Required";
      } else {
        $address = $_POST["address"];
      }
      if(empty($_POST["username"])) {
        $usernameErr = "Username Required";
      } else {
        $username = $_POST["username"];
      }
      if(empty($_POST["password"])) {
        $passwordErr = "Password Required";
      } else {
        $password = $_POST["password"];
      }
      if(empty($_POST["password_confir"])) {
        $password_confirErr = "Password Confirmation Required";
      } else {
        $password_confir = $_POST["password_confir"];
      }
      // Check that passwords match, if they do not, do not save them
      if($_POST["password"] != $_POST["password_confir"]) {
        $matchErr = "Passwords do not match";
        $_POST["password"] = "";
        $_POST["password_confir"] = "";
      }
    }
    ?>
    <!-- Table to get user input. PHP calls return error if posted without
    filling all boxes and keep correct info in table so user does not have
    to re-enter everything on post with incorrect info. -->
    <h1>New User Registration</h1>
    <form action="php/add_new_user.php" method="post">
      <label for="fname">First Name:</label><br>
      <input type="text" name="fname" value="<?php echo $fname;?>">
      <span class="error">* <?php echo $fnameErr;?></span><br>
      <label for="lname">Last Name:</label><br>
      <input type="text" name="lname" value="<?php echo $lname;?>">
      <span class="error">* <?php echo $lnameErr;?></span><br>
      <label for="age">Age:</label><br>
      <input type="text" name="age" value="<?php echo $age;?>">
      <span class="error">* <?php echo $ageErr;?></span><br>
      <label for="phone_num">Phone Number:</label><br>
      <input type="text" name="phone_num" value="<?php echo $phone_num;?>">
      <span class="error">* <?php echo $phone_numErr;?></span><br>
      <label for="email">Email Address:</label><br>
      <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span><br>
      <label for="address">Address:</label><br>
      <input type="text" name="address" value="<?php echo $address;?>">
      <span class="error">* <?php echo $addressErr;?></span><br>
      <label for="username">Username:</label><br>
      <input type="text" name="username" value="<?php echo $username;?>">
      <span class="error">* <?php echo $usernameErr;?></span><br>
      <label for="password">Password:</label><br>
      <input type="text" name="password" value="<?php echo $password;?>">
      <span class="error">* <?php echo $passwordErr;?></span><br>
      <label for="password_confir">Confirm Password:</label><br>
      <input type="text" name="password_confir" value="<?php echo $password_confir;?>">
      <span class="error">* <?php echo $password_confirErr;?></span><br>
      <span class="error"><?php echo $matchErr;?></span><br>
      <input type="submit" value="Submit"><br><br>
    </form>
    <a href="index.html">Home Page</a>

  </body>
</html>
