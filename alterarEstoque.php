<?php
include 'conecta.php';

$id = $_POST['id_estoque'];
$produto = $_POST['produto'];
$quantidade = $_POST["quantidade"];

$sql = "UPDATE estoque SET produto = ? WHERE id_estoque = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $produto, $id);

if ($stmt->execute()) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar dados: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
