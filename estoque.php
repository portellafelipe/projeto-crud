<?php
// Inicia a sessão
session_start();
var_dump($_SESSION);
require 'conecta.php'; 

// Verifica se o usuário está logado
if (!isset($_SESSION['ID_Pessoa']) || empty($_SESSION['ID_Pessoa'])) {
    header('Location: login.php');
    exit();
}

// Define o ID do usuário a partir da sessão
$usuario_id = $_SESSION['ID_Pessoa'];

// Verifica se o formulário de adicionar produto foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cproduto'], $_POST['cquantidade'], $_POST['cvalidade'])) {
    $produto = $_POST['cproduto'];
    $validade = $_POST['cvalidade'];
    $quantidade = $_POST['cquantidade'];

    // Insere o produto no banco de dados
    $stmt = $conexao->prepare("INSERT INTO estoque (ID_Pessoa, produto, quantidade, dt_validade) VALUES (?, ?, ?, ?)");

    // Verifique se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die('Erro ao preparar a consulta: ' . $conexao->error);
    }

    // Corrige os tipos de dados no bind_param
    $stmt->bind_param("isis", $usuario_id, $produto, $quantidade, $validade);

    if (!$stmt->execute()) {
        die('Erro ao executar a consulta: ' . $stmt->error);
    }

    // Redireciona para a própria página após a inserção
    header('Location: estoque.php');
    exit();
}

// Recupera os produtos do usuário logado
$stmt = $conexao->prepare("SELECT * FROM estoque WHERE ID_Pessoa = ?");
if ($stmt === false) {
    die('Erro ao preparar a consulta: ' . $conexao->error);
}
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$produtos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Dispensa</title>
    <link rel="stylesheet" href="estiloEstoque.css">
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <nav class="barra_navegacao">
            <div class="container">
                <div class="logo">
                    <img src="logo.png" alt="Logo Smart Stock" class="logo-img">
                    <h1><a href="index.php">Smart Stock</a></h1>
                </div>
                <ul class="navegar_links">
                    <li><a href="index.php">INÍCIO</a></li>
                    <li><a href="#sobre">SOBRE</a></li>
                    <li><a href="#funcionamento">FUNCIONAMENTO</a></li>
                    <li><a href="estoque.php">GERENCIAR DISPENSA</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Formulário para adicionar produtos ao estoque -->
    <h1>Adicionar Produtos ao Estoque</h1>
    
    <form id="produtoForm" action="estoque.php" method="post">
        <div id="produtosContainer">
            <div class="produtoItem">
                <input type="text" name="cproduto" placeholder="Produto" required>
                <input type="date" name="cvalidade" required>
                <input type="number" name="cquantidade" placeholder="Quantidade" required>
            </div>
        </div>
        <input type="submit" value="Enviar Produtos">
    </form>

    <!-- Seção para exibir os produtos do usuário -->
    <section id="estoqueUsuario">
        <h2>Produtos no Estoque</h2>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Validade</th>
                    <th>Quantidade</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['produto']); ?></td>
                        <td><?php echo htmlspecialchars($produto['dt_validade']); ?></td>
                        <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                        <td>
                            <form action="atualizar_produto.php" method="post">
                                <input type="hidden" name="produto_id" value="<?php echo $produto['id']; ?>">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <script src="script.js"></script>
</body>
</html>
