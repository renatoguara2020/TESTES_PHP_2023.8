<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<?php
//login_success.php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: pdo_login.php');
} else {
    //header('location:pdo_login.php');
    echo '<div class="alert alert-success" role="alert"><h3>Login Success, Welcome - ' .
        $_SESSION['username'] .
        '</h3></div>';
    echo '<br /><br /><a href="logout.php">Logout</a>';
}


?>