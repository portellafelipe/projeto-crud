<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Dispensa</title>
    <link rel="stylesheet" href="estiloEstoque.css">
</head>
<body>
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

    <h1>Adicionar Produtos ao Estoque</h1>
    
    <form id="produtoForm" action="gravaEstoque.php" method="post">
        <div id="produtosContainer">
            <div class="produtoItem">
                <input type="text" name="cproduto[]" placeholder="Produto" required>
                <input type="date" name="cvalidade[]" required>
                <input type="number" name="cquantidade[]" placeholder="Quantidade" min="1" required>
            </div>
        </div>
        
        <button type="button" id="adicionarProdutoBtn">Adicionar Outro Produto</button>
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
                    <th>Ação</th> <!-- Nova coluna para a ação de atualizar -->
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de dados estáticos com o botão de atualizar -->
                <tr>
                    <td>Arroz</td>
                    <td>2024-12-01</td>
                    <td>5</td>
                    <td>
                        <form action="atualizar_produto.php" method="post">
                            <input type="hidden" name="produto_id" value="1"> <!-- ID do produto -->
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Feijão</td>
                    <td>2024-10-15</td>
                    <td>2</td>
                    <td>
                        <form action="atualizar_produto.php" method="post">
                            <input type="hidden" name="produto_id" value="2"> <!-- ID do produto -->
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Óleo</td>
                    <td>2025-01-10</td>
                    <td>3</td>
                    <td>
                        <form action="atualizar_produto.php" method="post">
                            <input type="hidden" name="produto_id" value="3"> <!-- ID do produto -->
                            <button type="submit">Atualizar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <script src="script.js"></script>
</body>
</html>