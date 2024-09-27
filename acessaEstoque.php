<?php
include "gravaEstoque.php";
$txtConteudo = filter_input_array(INPUT_GET,FILTER_DEFAULT)
$sql = "SELECT * FROM ESTOQUE";
$rs = mysqli_query($conexao,$sql);
$total_registros = mysqli_num_rows($rs);
$verestoque = $conn -> prepare($sql);
$verestoque->blind_param("s",$ID_Pessoa);
$verestoque->execute();
$result = $verestoque->get_result();
$estoque = $result -> fetch_assoc();
?>
