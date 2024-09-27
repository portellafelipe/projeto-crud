<?php
$usuario = $_POST['cusuario'];
$email = $_POST['cemail'];
$senha = $_POST['csenha'];

// Conecta com a base de dados
include "conecta.php"; // Arquivo de conexão

// Comando para inserir na tabela
$sql = "INSERT INTO LOGIN (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

$rs = mysqli_query($conexao, $sql);

if (!$rs) {
    // Redireciona em caso de erro
    header("Location: login.php?msg=Erro ao criar a conta.");
    exit();
}

// Fecha a conexão
mysqli_close($conexao);

// Redireciona com mensagem de sucesso
header("Location: index.php?msg=Conta criada com sucesso!");
exit();
?>
