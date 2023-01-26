<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet/>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">

<?php
include_once 'connection.php';

if (isset($_POST['Submit'])) {
    if (
        isset($_POST['nome']) ||
        isset($_POST['email']) ||
        isset($_POST['cidade']) ||
        isset($_POST['idade'])
    ) {
        if (isset($_POST['nome']) && $_POST['nome'] != ''):
            $nome = filter_input(
                INPUT_POST,
                'nome',
                FILTER_SANITIZE_SPECIAL_CHARS
            );
        endif;

        if (isset($_POST['email']) && $_POST['email'] != '') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }
        $cidade = filter_input(
            INPUT_POST,
            'cidade',
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $idade = filter_input(
            INPUT_POST,
            'idade',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

    $stmt = $conn->prepare(
        'INSERT INTO users(nome, email, cidade, idade)VALUES(:nome, :email, :cidade, :idade'
    );
    $conn->exec('set names utf8mb4');
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);

    $stmt->execute();

    echo "<div class=\"alert alert-success\">Usuário Cadastrado Com Sucesso!!!</div>";

    header('Location: http://localhost/testes_php_2023/index.php');
}