<?php

include_once './connection1.php';

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

    if ($stmt->rowCount() > 0) {
        echo '<div class="alert alert-success">Usuário cadastrado com sucesso></div>';
    } else {
        echo '<div class="alert alert-danger">Erro  ao acessar o banco de dados</div>';
    }
}