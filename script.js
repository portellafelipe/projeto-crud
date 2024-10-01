document.getElementById('adicionarProdutoBtn').addEventListener('click', function() {
    // Cria um novo conjunto de campos de entrada para o produto
    const container = document.getElementById('produtosContainer');
    
    const novoProduto = document.createElement('div');
    novoProduto.classList.add('produtoItem');

    novoProduto.innerHTML = `
        <input type="text" name="cproduto[]" placeholder="Produto" required>
        <input type="date" name="cvalidade[]" required>
        <input type="number" name="cquantidade[]" placeholder="Quantidade" min="1" required>
    `;

    container.appendChild(novoProduto);
});