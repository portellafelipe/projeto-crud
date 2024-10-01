<?php
include "conecta.php";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Validação e sanitização dos dados
        $produtos = filter_var_array($_POST['cproduto'], FILTER_SANITIZE_STRING);
        
        // Sanitizar e validar a validade
        $validades = [];
        foreach ($_POST['cvalidade'] as $validade) {
            $validades[] = filter_var($validade, FILTER_VALIDATE_REGEXP, [
                'options' => ['regexp' => '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/']
            ]);
        }
        
        $quantidades = filter_var_array($_POST['cquantidade'], FILTER_SANITIZE_NUMBER_INT);

        // Validação adicional: verificar se a quantidade é positiva
        foreach ($quantidades as $quantidade) {
            if ($quantidade <= 0) {
                throw new Exception("A quantidade deve ser um número positivo.");
            }
        }

        // Preparação do statement e inserção dos dados
        $sql = "INSERT INTO estoque (produto, dt_validade, quantidade) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);

        foreach ($produtos as $index => $produto) {
            $validade = $validades[$index];
            $quantidade = $quantidades[$index];

            if (!$stmt->bind_param("ssi", $produto, $validade, $quantidade)) {
                throw new Exception("Erro ao vincular parâmetros: " . $stmt->error);
            }
            
            if (!$stmt->execute()) {
                echo "Erro ao inserir o produto $produto: " . $stmt->error . "<br>";
            }
        }

        // Consultar e exibir os dados
        $sql = "SELECT * FROM ESTOQUE ORDER BY produto ASC";
        $result = $conexao->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<h2>Lista de Produtos</h2>";
            echo "<table border='1'>
                  <tr>
                    <th>Produto</th>
                    <th>Validade</th>
                    <th>Quantidade</th>
                  </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["produto"] . "</td>";
                echo "<td>" . $row["dt_validade"] . "</td>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum produto encontrado.";
        }

        echo "Gravação executada com sucesso!";
        
    } else {
        throw new Exception("Método HTTP inválido.");
    }

} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Ocorreu um erro: " . $e->getMessage();
}

$conexao->close();
?>
