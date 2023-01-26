<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$query = "SELECT * FROM usuarios WHERE usuario='$usuario' and senha='$senha'";

$conn = new PDO('mysql:host=127.0.0.1;dbname=sitepessoal', 'root', '');
$resultado = $conn->query($query);
$logado = $resultado->fetch();
$id_logado = $logado['id'];

if ($logado == null) {
    // Usuário ou senha inválida
    header('Location: usuario-erro.php');
} else {
    session_start();
    $_SESSION['usuario_logado'] = $id_logado;
    // Direciona o usuário para o painel administrativo do sistema
    header('Location: painel.php');
}
die();
?>