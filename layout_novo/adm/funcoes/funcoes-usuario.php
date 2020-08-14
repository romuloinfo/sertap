<?php

//buscar BAIRROS para colocar no select
function buscar_bairros(){
    include "includes/conexao.php";
    $sql = "SELECT b.id_bairro, b.nome_bairro, c.descricao as nome_cidade
            FROM cidades c
            INNER JOIN bairros b
            on b.id_cidade = c.id
            ORDER BY c.descricao, b.nome_bairro ";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $r){
      $id = $r['id_bairro'];
      $descricao = $r['nome_bairro']." - (".$r['nome_cidade'].")";
      print "<option value='$id'>$descricao</option>";
    }
  }
}

//buscar categorias para colocar no select
function buscar_categorias(){
    include "includes/conexao.php";
    $sql = "SELECT id, descricao FROM categorias ORDER BY id";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $categoria){
      $id = $categoria['id'];
      $descricao = $categoria['descricao'];
      print "<option value='$id'>$descricao</option>";
    }
  }
}

//buscar cidades para colocar no select
function buscar_cidades(){
    include "includes/conexao.php";
        $sql = "SELECT id, descricao FROM cidades ORDER BY descricao";
        $resultado = $conexao->query($sql);

    if($resultado){
        $result = array();
        while( $linha = mysqli_fetch_assoc($resultado) ){
            $result[] = $linha;
        }
        foreach ($result as $cidades){
            $id = $cidades['id'];
            $descricao = $cidades['descricao'];
            print "<option value='$id'>$descricao</option>";
        }
    }
}


?>