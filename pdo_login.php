<?php
session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'testing';
$message = '';
try {
    $connect = new PDO(
        "mysql:host=$host; dbname=$database",
        $username,
        $password
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['login'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $message =
                '<div class="alert alert-danger" role="alert">All fields are required</div>';
        } else {
            $query =
                'SELECT * FROM users WHERE username = :username AND password = :password';
            $statement = $connect->prepare($query);
            $statement->execute([
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            ]);
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION['username'] = $_POST['username'];
                header('location:login_success.php');
            } else {
                '<div class="alert alert-danger" role="alert">All fields are required</div>';
                $message = '<div>Wrong Data</div>';
                header('location:login_error.php');
            }
        }
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | PHP Login Script using PDO</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <br />
    <div class="container" style="width:500px;">
        <?php if (isset($message)) {
            echo '<label class="text-danger">' . $message . '</label>';
        } ?>
        <h3 align="">PHP Login Script using PDO</h3><br />
        <form method="post">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder=" Digite seu Username" />
            <br />
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder=" Digite seu Password" />
            <br />
            <input type="submit" name="login" class="btn btn-info" value="Login" /><br><br>
            <li><a href="cadastrar.php">Cadastrar Usuário</a></li>
        </form>
    </div>
    <br />
</body>

</html>