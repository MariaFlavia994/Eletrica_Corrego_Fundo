<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = strip_tags(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mensagem = trim($_POST['mensagem']);

    
    if (empty($nome) || empty($mensagem) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Por favor, preencha todos os campos corretamente.'); window.location.href='contato.html';</script>";
        exit;
    }

    
    $destinatario = "mariafavia994@gmail.com"; 
    $assunto = "Mensagem do site - Contato";

    $corpo = "Você recebeu uma nova mensagem do site:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    $cabecalho = "From: $email";

   
    if (mail($destinatario, $assunto, $corpo, $cabecalho)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='contato.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar. Tente novamente mais tarde.'); window.location.href='contato.html';</script>";
    }
} else {
    header("Location: contato.html");
    exit;
}
?>
