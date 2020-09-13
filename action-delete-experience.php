<?php
require __DIR__ . '/lib/dashboard-library.php';
$app = new Experience();
if(isset($_GET['experience_id'])) {
    echo $_GET['experience_id'];
    $app->deleteExperiences($_GET['experience_id']);
    header("Location:dashboard.php");
}
?>