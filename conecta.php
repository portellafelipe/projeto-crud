<?php
//realiza a conexão com o mysql
$conexao = mysqli_connect("localhost","root","");
//identifica a base de dados
$bancodedados = "bd_login";
//conecta mysql e base de dados
$bd = mysqli_select_db($conexao,$bancodedados);
if (mysqli_connect_errno()){
    printf("Falha na conexão: %s \n",mysqli_connect_error());
    die();
}
?>