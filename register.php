<?php

session_start();
require __DIR__.'/lib/login-register-library.php';
$app = new DemoLib();
$register_error_message = '';

if (!empty($_POST['submit'])) {
  if ($_POST['name'] == "") {
    $register_error_message = 'Name field is required!';
  } else if ($_POST['email'] == "") {
    $register_error_message = 'Email field is required!';
  } else if ($_POST['password'] == "") {
    $register_error_message = 'Password field is required!';
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $register_error_message = 'Invalid email address!';
  } else if ($app->isEmail($_POST['email'])) {
    $register_error_message = 'Email is already in use!';
  } else if ($app->isUsername($_POST['username'])) {
    $register_error_message = 'Username is already in use!';
  } else {
    $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
    // set session and redirect user to the profile page
    $_SESSION['user_id'] = $user_id;
    header("Location: profile.php");
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/style.css" />
  <title>Welcome To The Developer Connector</title>
</head>

<body>
  <nav class="navbar bg-dark">
    <h1>
      <a href="index.html"><i class="fas fa-code"></i> DevConnector</a>
    </h1>
    <ul>
      <li><a href="profiles.php">Developers</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>
  <section class="container">
    <h1 class="large text-primary">Sign Up</h1>
    <p class="lead"><i class="fas fa-user"></i> Create Your Account</p>
    <?php
    if ($register_error_message != "") {
      echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
    }
    ?>
    <form class="form" method="post" action="register.php">
      <div class="form-group">
        <input type="text" placeholder="Name" name="name" required  />
      </div>
      <div class="form-group">
        <input type="email" placeholder="Email Address" name="email" required/>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Username" name="username" required />
      </div>
      <div class="form-group">
        <input type="password" placeholder="Password" name="password" minLength="6" />
      </div>

      <input name="submit" type="submit" class="btn btn-primary" value="Register" />
    </form>
    <p class="my-1">
      Already have an account? <a href="login.php">Sign In</a>
    </p>
  </section>
</body>

</html>