<?php
require __DIR__ . '/lib/dashboard-library.php';
$app = new Experience();
if(isset($_GET['education_id'])) {
    echo $_GET['education_id'];
    $app->deleteEducation($_GET['education_id']);
    header("Location:dashboard.php");
}
?>