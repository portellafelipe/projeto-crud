<?php
$produto = $_POST['cproduto'];
$validade =$_POST['cvalidade'];
$quantidade =$_POST['cquantidade'];

include "conecta.php";
$sql = "INSERT INTO ESTOQUE (produto, dt_validade, quantidade) VALUES";
$sql = $sql."('$produto','$validade','$quantidade')";
echo $sql;

$rs = mysqli_query($conexao,sql);
if (!$rs)
{
  echo $sql;
  echo 'problemas na gravação';
  echo '<meta http-equiv="refresh" content="10;URL=index.php"/>';
  return;
}
mysqli_close($conexao);
echo '<br> gravação executada com sucesso';  
?>
