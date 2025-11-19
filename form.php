<?php
// form.php - Recebe o POST do formulário e envia um e-mail
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

// Configurações
$para = 'morais120506@gmail.com'; // seu e-mail de destino
$assunto = 'Contato pelo site';

// Sanitização e validação
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$celular = isset($_POST['celular']) ? trim($_POST['celular']) : '';
$mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

if (empty($nome) || empty($email) || empty($mensagem)) {
    header('Location: index.html?status=error#formulario');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.html?status=invalid_email#formulario');
    exit;
}

// Prepara o corpo do e-mail
$body = "Você recebeu uma nova mensagem do formulário de contato:\n\n";
$body .= "Nome: " . strip_tags($nome) . "\n";
$body .= "E-mail: " . strip_tags($email) . "\n";
$body .= "Celular: " . strip_tags($celular) . "\n\n";
$body .= "Mensagem:\n" . strip_tags($mensagem) . "\n";

// Cabeçalhos
$headers = "From: " . strip_tags($nome) . " <" . $email . ">\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envia o e-mail
$sent = mail($para, $assunto, $body, $headers);

if ($sent) {
    header('Location: index.html?status=success#formulario');
    exit;
} else {
    header('Location: index.html?status=error#formulario');
    exit;
}
?>