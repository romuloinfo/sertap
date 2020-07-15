<?php
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

