<?php

//buscar categorias para colocar no select
function buscar_categorias(){
    include "../includes/conexao.php";
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
    include "../includes/conexao.php";
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

//buscar estados para colocar no select
function buscar_estados(){
    include "../includes/conexao.php";
    $sql = "SELECT id, sigla FROM uf ORDER BY sigla";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $resultado){
      $id = $resultado['id'];
      $sigla = $resultado['sigla'];
      print "<option value='$id'>$sigla</option>";
    }
  }
}



// mostrar Categorias Cadastradas na tabela
function categorias_cadastradas(){
    include "../includes/conexao.php";
    $sql = "SELECT id, descricao FROM categorias ORDER BY id";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Id</th>
        <th scope='col'>Categoria</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $categoria){
      $id = $categoria['id'];
      $descricao = $categoria['descricao'];

      print "<tr>
        <td scope='row'>$id</td>
        <td>$descricao</td>

        <td class='text-center'> <a href='cadastro-categoria-alterar.php?id=$id&descricao=$descricao'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-categoria-excluir.php?id=$id&descricao=$descricao'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

  //mostrar bairros cadastrados na tabela
  function bairros_cadastrados(){
    include "../includes/conexao.php";
    $sql = "SELECT id_bairro, nome_bairro, id_cidade FROM bairros ORDER BY id_bairro";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Id Bairro</th>
        <th scope='col'>Nome Bairro</th>
        <th scope='col'>Cidade</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id_bairro = $resultado['id_bairro'];
      $nome_bairro = $resultado['nome_bairro'];
      $id_cidade = $resultado['id_cidade'];

      print "<tr>
        <td scope='row'>$id_bairro</td>
        <td>$nome_bairro</td>
        <td>$id_cidade</td>

        <td class='text-center'> <a href='cadastro-bairro-alterar.php?id_bairro=$id_bairro&nome_bairro=$nome_bairro&id_cidade=$id_cidade'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-bairro-excluir.php?id_bairro=$id_bairro&nome_bairro=$nome_bairro'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

  //mostrar cidades cadastradas na tabela
function cidades_cadastradas(){
    include "../includes/conexao.php";
    $sql = "SELECT uf_id, id, descricao FROM cidades ORDER BY descricao";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Id Estado</th>
        <th scope='col'>Id Cidade</th>
        <th scope='col'>Cidade</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id_uf = $resultado['uf_id'];
      $id_cidade = $resultado['id'];
      $descricao = $resultado['descricao'];

      print "<tr>
        <td scope='row'>$id_uf</td>
        <td>$id_cidade</td>
        <td>$descricao</td>

        <td class='text-center'> <a href='cadastro-cidade-alterar.php?id_cidade=$id_cidade'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-cidade-excluir.php?id_cidade=$id_cidade&nome_cidade=$descricao'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }








?>