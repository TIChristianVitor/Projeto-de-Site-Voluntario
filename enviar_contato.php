<!-- Utilização do PHP 7.4 -->
<?php

require_once('bd.php');

if (isset($_POST['nome'], $_POST['email'], $_POST['mensagem'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $pdo->prepare("INSERT INTO contatos (nome,email,mensagem) VALUES (?,?,?)");
    $stmt->execute([$nome,$email,$mensagem]);

    echo "Mensagem Enviada!";
} else {
    http_response_code(500);
}