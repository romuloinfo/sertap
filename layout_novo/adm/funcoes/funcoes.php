<?php

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



function buscar_estados(){
    include "../includes/conexao.php";
    $sql = "SELECT id, descricao FROM uf ORDER BY descricao";
    $resultado = $conexao->query($sql);
    
    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $estado){
      $id = $estado['id']; 
      $estado = $categoria['descricao']; 
      print "<option value='$id'>$descricao</option>";
    }
  }
}





?>