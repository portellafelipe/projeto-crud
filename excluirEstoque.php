<?php
include 'conecta.php';

$id = $_POST['id_estoque'];

// Preparando a consulta SQL
$sql = "DELETE FROM estoque WHERE id_estoque = ?";
$stmt = $conexao->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Mensagem de sucesso
        echo "<h1>Registro excluído com sucesso!</h1>";
        echo "<p>Redirecionando em 3 segundos...</p>";

        // Redirecionar após 5 segundos
        header("refresh:3;url=estoque.php"); // Altere para a página que você deseja
        exit();
    } else {
        echo "Erro ao excluir registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
