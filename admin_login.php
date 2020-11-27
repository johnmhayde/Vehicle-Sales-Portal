<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
  </head>
  <body>

    <?php
    // Initialize variables in form
    $username = $password = "";
    // define error variables
    $usernameErr = $passwordErr = "";
    // Make sure every box is filled. If box is filled, post data. If not, throw error
    if($_SERVER["REQUEST_METHOD"] == "POST") {
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
    }
    ?>
    <!-- Table to get user input. PHP calls return error if posted without
    filling all boxes and keep correct info in table so user does not have
    to re-enter everything on post with incorrect info. -->
    <h1>Admin Login</h1>
    <form action="php/admin_verification.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" name="username" value="<?php echo $username;?>">
      <span class="error">* <?php echo $usernameErr;?></span><br>
      <label for="password">Password:</label><br>
      <input type="text" name="password" value="<?php echo $password;?>">
      <span class="error">* <?php echo $passwordErr;?></span><br><br>
      <input type="submit" value="Submit"><br><br>
    </form>
    <a href="index.html">Home Page</a>

  </body>
</html>
