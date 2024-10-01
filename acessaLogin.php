<?php
include("conecta.php"); // Arquivo de conexão

$email = $_POST['email'];
$senha = $_POST['senha'];

// Usando prepared statement para evitar SQL injection
$stmt = $conexao->prepare("SELECT * FROM login WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Debug: Exibir senha informada e hash armazenado
    // echo "Senha informada: " . $senha . "<br>";
    // echo "Hash armazenado: " . $row['senha'] . "<br>";

    // Verifica a senha informada
    if (password_verify($senha, $row['senha'])) {
        session_start();
        $_SESSION['ID_Pessoa'] = $row['id'];
        $_SESSION['nome'] = $row['usuario']; // Corrigido para 'usuario'

        header("Location: teste.html");
        exit();
    } else {
        echo "Senha inválida.";
    }
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();
$conexao->close();
?>
