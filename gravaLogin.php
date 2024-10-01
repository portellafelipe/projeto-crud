<?php
// Conecta com a base de dados
include "conecta.php"; // Arquivo de conexão

// Obtém os dados do formulário
$usuario = $_POST['cusuario'];
$email = $_POST['cemail'];
$senha = password_hash($_POST['csenha'], PASSWORD_DEFAULT); // Cria o hash da senha

// Usando prepared statement para evitar SQL injection
$stmt = $conexao->prepare("INSERT INTO LOGIN (usuario, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $usuario, $email, $senha);

if (!$stmt->execute()) {
    // Redireciona em caso de erro
    header("Location: login.php?msg=Erro ao criar a conta.");
    exit();
}

// Fecha a conexão
$stmt->close();
$conexao->close();

// Redireciona com mensagem de sucesso
header("Location: index.php?msg=Conta criada com sucesso!");
exit();
?>
