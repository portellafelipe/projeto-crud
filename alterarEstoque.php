<?php
session_start();
require 'conecta.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['ID_Pessoa']) || empty($_SESSION['ID_Pessoa'])) {
    header('Location: login.php');
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_estoque'])) {
    $id = $_POST['id_estoque'];
    
    // Para obter os dados do produto para editar, você pode fazer uma consulta
    $stmt = $conexao->prepare("SELECT * FROM estoque WHERE id_estoque = ? AND ID_Pessoa = ?");
    $stmt->bind_param("ii", $id, $_SESSION['ID_Pessoa']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        die('Produto não encontrado.');
    }
}

// Se o formulário de atualização for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['atualizar'])) {
    $produto = $_POST['cproduto'];
    $validade = $_POST['cvalidade'];
    $quantidade = $_POST['cquantidade'];

    $stmt = $conexao->prepare("UPDATE estoque SET produto = ?, quantidade = ?, dt_validade = ? WHERE id_estoque = ?");
    $stmt->bind_param("sisi", $produto, $quantidade, $validade, $id);

    if ($stmt->execute()) {
        header('Location: estoque.php');
        exit();
    } else {
        die('Erro ao atualizar o produto: ' . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Produto</title>
    <link rel="stylesheet" href="alterar.css">
</head>
<body>
    <h1>Alterar Produto</h1>
    <form method="POST" action="alterarEstoque.php">
        <input type="hidden" name="id_estoque" value="<?php echo $id; ?>">
        <input type="text" name="cproduto" value="<?php echo htmlspecialchars($produto['produto']); ?>">
        <input type="date" name="cvalidade" value="<?php echo htmlspecialchars($produto['dt_validade']); ?>">
        <input type="number" name="cquantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required>
        <input type="submit" name="atualizar" value="Atualizar Produto">
    </form>
</body>
</html>
