<?php
session_start();
if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
  header("Location: login.php");
}
require __DIR__ . '/lib/dashboard-library.php';
$app = new Experience();
$user = $app->UserDetails($_SESSION['user_id']); // get user details
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
      <li><a href="posts.php">Posts</a></li>
      <li>
        |
        <a href="dashboard.php" title="Dashboard"><i class="fas fa-user"></i>
          <span class="hide-sm">Dashboard</span></a>
      </li>
      <li>
        <a href="action-logout.php" title="Logout" onclick="return logoutConfirm()">
          <i class="fas fa-sign-out-alt"></i>
          <span class="hide-sm">Logout</span></a>
      </li>
    </ul>
  </nav>
  <section class="container">
    <h1 class="large text-primary">
      Dashboard
    </h1>
    <p class="lead"><i class="fas fa-user"></i> Welcome <?php echo $user->name ?></p>
    <div class="dash-buttons">
      <a href="edit-profile.php" class="btn btn-light"><i class="fas fa-user-circle text-primary"></i> Edit Profile</a>
      <a href="add-experience.php" class="btn btn-light"><i class="fab fa-black-tie text-primary"></i> Add Experience</a>
      <a href="add-education.php" class="btn btn-light"><i class="fas fa-graduation-cap text-primary"></i> Add Education</a>
    </div>

    <h2 class="my-2">Experience Credentials</h2>

    <table class="table">
      <thead>
        <tr>
          <th>Company</th>
          <th class="hide-sm">Title</th>
          <th class="hide-sm">Years</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $data = $app->readExperiences($_SESSION['user_id']);
        foreach ($data as $key => $value) {
          echo '<tr>'
            . '<td>' .$value["company"] . '</td>' .
            '<td>' .$value["job_title"] . '</td>' .
            '<td>' .$value['start_date'] . " - " . $value['end_date'] . '</td>' .
            '<td>' .'<a href="action-delete-experience.php?experience_id='.$value['experience_id'].'">'.'<button name="delete" class="btn btn-danger" onclick="return deleteConfirm()">' . "Delete" . '</button>' . '</a>' . '</td>' .
            '</tr>';
        }
        ?>
      </tbody>
    </table>

    <h2 class="my-2">Education Credentials</h2>
    <table class="table">
      <thead>
        <tr>
          <th>School</th>
          <th class="hide-sm">Degree</th>
          <th class="hide-sm">Years</th>
          <th>
        </tr>
      </thead>
      <tbody>
      <?php
        $data = $app->readEducation($_SESSION['user_id']);
        foreach ($data as $key => $value) {
          echo '<tr>'
            . '<td>' . $value["school"] . '</td>' .
            '<td>' . $value["digree"] . '</td>' .
            '<td>' . $value['start_date'] . " - " . $value['end_date'] . '</td>' .
            '<td>' . '<a href="action-delete-education.php?education_id=' . $value['education_id'] . '">' . '<button name="delete" class="btn btn-danger" onclick="return deleteConfirm()">' . "Delete" . '</button>' . '</a>' . '</td>' .
            '</tr>';
        }
        ?>
      </tbody>
    </table>

    <div class="my-2">
      <button class="btn btn-danger">
        <i class="fas fa-user-minus"></i>

        Delete My Account
      </button>
    </div>
  </section>

</body>

</html>
<script>
  function deleteConfirm() {
    var x = "Are you sure?";
    if (confirm(x)) {
      return true;
    } else {
      return false;
    }
  }

  function logoutConfirm() {
    var x = "Are you sure want to logout?";
    if (confirm(x)) {
      return true;
    } else {
      return false;
    }
  }
</script>