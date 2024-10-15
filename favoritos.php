<?php
include "gravaEstoque.php";
$sql = "SELECT * FROM ESTOQUE";

$result = mysqli_query($conexao, $sql);


if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['quantidade'] == 0) {
        echo "Produto: " . $row['id'] . " está com estoque zerado.<br>";
    } else {
        echo "Produto: " . $row['id'] . " possui estoque.<br>";
    }
}
mysqli_close($conexao);
?>
