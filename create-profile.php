<?php
session_start();
if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '')) {
  header("Location: login.php");
}
require __DIR__ . '/lib/profile-library.php';
$app = new Profile();
if (!empty($_POST['submit'])) {
  $user_id = $_SESSION['user_id'];
  $profile_id = $app->createProfile($user_id, $_POST['status'], $_POST['company'],$_POST['website'], $_POST['location'], $_POST['skills'], $_POST['githubusername'], $_POST['bio'], $_POST['twitter'],$_POST['facebook'],$_POST['youtube'],$_POST['linkedin'],$_POST['instagram']);
  if ($profile_id != null) {
    header("Location: dashboard.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
    />

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
          <a href="dashboard.php" title="Dashboard"
            ><i class="fas fa-user"></i>
            <span class="hide-sm">Dashboard</span></a
          >
        </li>
        <li>
          <a href="login.php" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="hide-sm">Logout</span></a
          >
        </li>
      </ul>
    </nav>
    <section class="container">
      <h1 class="large text-primary">
        Create Your Profile
      </h1>
      <p class="lead">
        <i class="fas fa-user"></i> Let's get some information to make your
        profile stand out
      </p>
      <small>* = required field</small>
      <form class="form" method="post" action="create-profile.php">
        <div class="form-group">
          <select name="status" required>
            <option value="">* Select Professional Status</option>
            <option value="Developer">Developer</option>
            <option value="Junior Developer">Junior Developer</option>
            <option value="Senior Developer">Senior Developer</option>
            <option value="Manager">Manager</option>
            <option value="Student or Learning">Student or Learning</option>
            <option value="Instructor">Instructor or Teacher</option>
            <option value="Intern">Intern</option>
            <option value="Other">Other</option>
          </select>
          <small class="form-text"
            >Give us an idea of where you are at in your career</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="Company" name="company" required/>
          <small class="form-text"
            >Could be your own company or one you work for</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="Website" name="website" required/>
          <small class="form-text"
            >Could be your own or a company website</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="Location" name="location" required/>
          <small class="form-text"
            >City & state suggested (eg. Boston, MA)</small
          >
        </div>
        <div class="form-group">
          <input type="text" placeholder="* Skills" name="skills" required/>
          <small class="form-text"
            >Please use comma separated values (eg.
            HTML,CSS,JavaScript,PHP)</small
          >
        </div>
        <div class="form-group">
          <input
            type="text"
            placeholder="Github Username"
            name="githubusername"
          />
          <small class="form-text"
            >If you want your latest repos and a Github link, include your
            username</small
          >
        </div>
        <div class="form-group">
          <textarea placeholder="A short bio of yourself" name="bio" required></textarea>
          <small class="form-text">Tell us a little about yourself</small>
        </div>

        <div class="my-2">
          <button type="button" class="btn btn-light">
            Add Social Network Links
          </button>
          <span>Optional</span>
        </div>

        <div class="form-group social-input">
          <i class="fab fa-twitter fa-2x"></i>
          <input type="text" placeholder="Twitter URL" name="twitter" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-facebook fa-2x"></i>
          <input type="text" placeholder="Facebook URL" name="facebook" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-youtube fa-2x"></i>
          <input type="text" placeholder="YouTube URL" name="youtube" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-linkedin fa-2x"></i>
          <input type="text" placeholder="Linkedin URL" name="linkedin" />
        </div>

        <div class="form-group social-input">
          <i class="fab fa-instagram fa-2x"></i>
          <input type="text" placeholder="Instagram URL" name="instagram" />
        </div>
        <input type="submit" name="submit" class="btn btn-primary my-1" />
        <a class="btn btn-light my-1" href="dashboard.html">Go Back</a>
      </form>
    </section>
  </body>
</html>
