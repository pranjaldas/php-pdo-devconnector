<?php
session_start();
if((isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')){
  header ("Location: dashboard.php");
}
require __DIR__ . '/lib/login-register-library.php';
$app = new DemoLib();
$login_error_message = '';
if (!empty($_POST['submit'])) {

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if ($username == "") {
    $login_error_message = 'Username field is required!';
  } else if ($password == "") {
    $login_error_message = 'Password field is required!';
  } else {
    $user_id = $app->Login($username, $password); // check user login
    if ($user_id > 0) {
      $_SESSION['user_id'] = $user_id; // Set Session
      header("Location: dashboard.php"); // Redirect user to the profile.php
    } else {
      $login_error_message = 'Invalid login details!';
    }
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
      <a href="index.php"><i class="fas fa-code"></i> DevConnector</a>
    </h1>
    <ul>
      <li><a href="profiles.php">Developers</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>
  <section class="container">
    <?php
    if ($login_error_message != "") {
      echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
    }
    ?>
    <h1 class="large text-primary">Sign In</h1>
    <p class="lead"><i class="fas fa-user"></i> Sign into Your Account</p>
    <form class="form" action="login.php" method="post">
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username" required />
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required />
      </div>
      <input type="submit" name="submit" class="btn btn-primary" value="Login" />
    </form>
    <p class="my-1">
      Don't have an account? <a href="register.php">Sign Up</a>
    </p>
  </section>
</body>

</html>