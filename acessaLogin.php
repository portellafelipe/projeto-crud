<?php
session_start(); // Inicia a sessão

include("conecta.php"); // Arquivo de conexão

// Verifica se os dados foram enviados via POST
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Usando prepared statement para evitar SQL injection
    $stmt = $conexao->prepare("SELECT * FROM login WHERE email = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verifica a senha informada
            if (password_verify($senha, $row['senha'])) {
                // Login bem-sucedido
                $_SESSION['ID_Pessoa'] = $row['ID_Pessoa'];
                $_SESSION['nome'] = $row['usuario'];

                header("Location: clone.php");
                exit();
            } else {
                // Senha inválida
                $_SESSION['error'] = "Senha inválida.";
            }
        } else {
            // Usuário não encontrado
            $_SESSION['error'] = "Email não encontrado.";
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Erro ao preparar a consulta.";
    }
} else {
    $_SESSION['error'] = "Por favor, preencha todos os campos.";
}

$conexao->close();

// Redireciona de volta para a página de login para mostrar a mensagem de erro
header("Location: login.php");
exit();
?>
