<?php
// Inicia a sessão
session_start();
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
                    <h1><a href="clone.php">Smart Stock</a></h1>
                </div>
                <ul class="navegar_links">
                    <li><a href="clone.php">INÍCIO</a></li>
                    <li><a href="#favoritos">FAVORITOS</a></li>
                    <li><a href="estoque.php">GERENCIAR DISPENSA</a></li>
                    <li>
                    <a href="logout.php">
                    <img src="logoutt.png" alt="Sair" style="width: 25px; height: 25px;">
                    SAIR
                    </a>
                    </li>

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
        <button type="button" id="adicionarProdutoBtn">Adicionar outro produto</button> 
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
                        <form method="POST" action="excluirEstoque.php">
                            <input type="hidden" name="id_estoque" value="<?php echo $produto['id_estoque']; ?>">
                            <button type="submit" title="Excluir">
                                <img src="excluir.png" alt="Excluir" style="width: 20px; height: 20px;">
                                </button>
                        </form>
                        <form method="POST" action="alterarEstoque.php">
                            <input type="hidden" name="id_estoque" value="<?php echo $produto['id_estoque']; ?>">
                            <button type="submit" title="Alterar">
                                <img src="alterar.png" alt="Alterar" style="width: 20px; height: 20px;">
                            </button>
                        </form>
                        <td>
                        <input type="checkbox" id="star-<?php echo $produto['id_estoque']; ?>">
                        <label for="star-<?php echo $produto['id_estoque']; ?>">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                            </svg>
                        </label>
                        </td>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section id="favoritos">
    <h2>Favoritos</h2>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Validade</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui você pode recuperar e exibir os produtos favoritos do banco de dados -->
            <?php foreach ($favoritos as $favorito): ?>
                <tr>
                    <td><?php echo htmlspecialchars($favorito['produto']); ?></td>
                    <td><?php echo htmlspecialchars($favorito['dt_validade']); ?></td>
                    <td><?php echo htmlspecialchars($favorito['quantidade']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>


    <script src="script.js"></script>
</body>
</html>
