<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet/>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">

<?php
include_once 'connection1.php';

if (isset($_POST['login'])) {
    if (isset($_POST['username']) && ($_POST['username'] = !null)) {
        $username = filter_input(
            INPUT_POST,
            'username',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    if (isset($_POST['password']) && ($_POST['password'] = !null)) {
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    $stmt = $conn->prepare(
        'INSERT INTO users (username, password)VALUES (:username, :password)'
    );
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    // $stmt->execute([
    //     'username' => $username,
    //     'password' => $password,
    // ]);

    if ($stmt->rowCount() > 0) {
        echo '<div class="alert alert-success">Usuário cadastrado com sucesso</div>';
    } else {
        echo '<div class="alert alert-danger">Erro  ao acessar o banco de dados</div>';
    }
}