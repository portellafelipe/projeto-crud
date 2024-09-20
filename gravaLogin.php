<?php
$usuario = $_POST['cusuario'];
$email =$_POST['cemail'];
$senha =$_POST['csenha'];
//conecta com a base de dados
include "conecta.php"; //arquivo vamos criar depois
//comando para inserir na tabela
$sql = "INSERT INTO LOGIN (usuario, email, senha) VALUES ";
$sql = $sql."('$usuario','$email','$senha')";
echo $sql;

$rs = mysqli_query($conexao,$sql);
if (!$rs){
    echo $sql;
    echo 'Problemas na gravação!!';
    echo '<meta http-equiv="refresh" content="10;URL=index.html"/>';
    return;
}
mysqli_close($conexao);
echo '<br>Gravação executada com sucesso';
?>