<?php
// banco de dados local
// $servidor = 'localhost';
// $usuario = 'root';
// $senha = '';
// $base = 'sertap';

// Banco de Dados online
$servidor = 'www.nortecnet.com.br/db';
$usuario = 'sertapimoveis';
$senha = 'hZb3WUswdGRYxE88';
$base = 'sertapimoveis';

$conexao = new mysqli($servidor, $usuario, $senha, $base);
  if($conexao){
    mysqli_set_charset($conexao, "utf8");
  }
  else{
    die("erro na conexão");
  }

?>