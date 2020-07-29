<?php

// Cadastrar Bairro
if ( isset($_GET['nome_bairro']) and isset($_GET['cidade']) ){
// if ( isset($_GET['nome_bairro']) ){
  $nome_bairro = $_GET['nome_bairro'];
  $cidade = $_GET['cidade'];

  sleep(1);
  if( strlen($nome_bairro) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o nome do Bairro.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif($cidade ==0){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso escolher a cidade que este Bairro está localizado.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao = 'ok')";
      $sql = "INSERT INTO bairros (nome_bairro, id_cidade) VALUES ('$nome_bairro','$cidade')";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao='$categoria_cadastrar')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Bairro Cadastrado com Sucesso! <a href="cadastro-bairro.php" class="alert-link"> Voltar para Tela de Bairros Cadastrados.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }
  }
}


// Cadastrar Categoria
if ( isset($_GET['categoria_cadastrar']) ){
  $categoria_cadastrar = $_GET['categoria_cadastrar'];

  sleep(1);
  if( strlen($categoria_cadastrar) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso inserir o nome da Categoria que deseja Cadastrar.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao = 'ok')";
      $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, '$categoria_cadastrar')";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao='$categoria_cadastrar')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Categoria Cadastrada com Sucesso! <a href="cadastro-categoria.php" class="alert-link"> Voltar para Tela de CATEGORIAS.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }
  }
}

// Cadastrar CIDADE
if ( isset($_GET['id_cidade']) and isset($_GET['nome_cidade']) and isset($_GET['estado']) ){
  $id_cidade = $_GET['id_cidade'];
  $nome_cidade = $_GET['nome_cidade'];
  $estado = $_GET['estado'];

  sleep(1);
  if( strlen($id_cidade) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o Código (ID) da Cidade.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($nome_cidade) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o nome da Cidade.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif($estado == 0){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso escolher o ESTADO desta CIDADE.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao = 'ok')";
      $sql = "INSERT INTO cidades (uf_id, id, descricao) VALUES ('$estado','$id_cidade','$nome_cidade')";
      // $sql = "INSERT INTO categorias (id, descricao) VALUES (NULL, descricao='$categoria_cadastrar')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Cidade Cadastrada com Sucesso! <a href="cadastro-cidade.php" class="alert-link"> Voltar para Tela GERENCIAR CIDADES.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }else{
        print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Verifique o Código (ID) da Cidade. Possivelmente já existe outra cidade cadastrada com este código.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
  }
}