<?php 
include "gravaLogin.php";
$txtConteudo = filter_input_array(INPUT_GET,FILTER_DEFAULT)
$sql = "SELECT * FROM USUARIO WHERE EMAIL = email and Senha = senha"
$rs = mysqli_query($conexao,$sql);
$ver = $conn -> prepare($sql);
$ver->bind_param("s",$email);
$ver->execute();
$result = $ver->get_result();
$usuario = $result -> fetch_assoc();

if($usuario && password_verify($senha,$usuario['senha'])){
$_SESSION['ID_Pessoa'] = $usuario['ID_Pessoa'];
  header("locatiom:index.php");
  exit;
  $ver = session_destroy();
}
else{
echo "usuario ou senha incorretos";
}
}
?>
