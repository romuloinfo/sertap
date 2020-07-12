<?php
// banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$base = 'sertap';

$conexao = new mysqli($servidor, $usuario, $senha, $base);
  if($conexao){
    mysqli_set_charset($conexao, "utf8");
  }
  else{
    die("erro na conexão");
  }

?>