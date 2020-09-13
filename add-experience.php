<?php
session_start();
require __DIR__.'/lib/experience-library.php';
$app = new Experience();
$add_experience_error_message = '';
if (!empty($_POST['submit'])) {
  if ($_POST['title'] == "") {
    $add_experience_error_message = 'job title field is required!';
  } else if ($_POST['company'] == "") {
    $add_experience_error_message = 'company field is required!';
  } else if ($_POST['location'] == "") {
    $add_experience_error_message = 'location field is required!';
  } else if ($_POST['from'] == "") {
    $add_experience_error_message = 'from date field is required!';
  } else {
    $user_id=$_SESSION['user_id'];
    $experience_id=$app->addExperience($user_id,$_POST['title'],$_POST['company'],$_POST['location'],$_POST['from'],$_POST['to'],$_POST['description'],$_POST['current']);
    if($experience_id!=null){
      header ("Location: dashboard.php");
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
      <a href="index.html"><i class="fas fa-code"></i> DevConnector</a>
    </h1>
    <ul>
      <li><a href="profiles.html">Developers</a></li>
      <li><a href="posts.html">Posts</a></li>
      <li>
        |
        <a href="dashboard.html" title="Dashboard"><i class="fas fa-user"></i>
          <span class="hide-sm">Dashboard</span></a>
      </li>
      <li>
        <a href="login.html" title="Logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="hide-sm">Logout</span></a>
      </li>
    </ul>
  </nav>
  <section class="container">
    <h1 class="large text-primary">
      Add An Experience
    </h1>
    <p class="lead">
      <i class="fas fa-code-branch"></i> Add any developer/programming
      positions that you have had in the past
    </p>
    <small>* = required field</small>
    <?php
    if ($add_experience_error_message != "") {
      echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $add_experience_error_message . '</div>';
    }
    ?>
    <form class="form" method="post" action="add-experience.php">
      <div class="form-group">
        <input type="text" placeholder="* Job Title" name="title"/>
      </div>
      <div class="form-group">
        <input type="text" placeholder="* Company" name="company"/>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Location" name="location" />
      </div>
      <div class="form-group">
        <h4>From Date</h4>
        <input type="date" name="from" placeholder="From Date"/>
      </div>
      <div class="form-group">
          <p><input type="checkbox" name="current" value="Yes" /> Current Job</p>
        </div>
      <div class="form-group">
        <h4>To Date</h4>
        <input type="date" name="to" placeholder="To date"/>
      </div>
      <div class="form-group">
        <textarea name="description" cols="30" rows="5" placeholder="Job Description" ></textarea>
      </div>
      <input type="submit" name="submit" class="btn btn-primary my-1" />
      <a class="btn btn-light my-1" href="dashboard.php">Go Back</a>
    </form>
  </section>
</body>

</html>