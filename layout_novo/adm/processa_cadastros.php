<?php
// alterar USUÁRIO
if ( isset($_GET['id_usuario_alterar']) and isset($_GET['nome_usuario_alterar']) and isset($_GET['senha_usuario_alterar']) and isset($_GET['tipo_usuario']) and isset($_GET['grupo_id']) ){
  $id_alterar = $_GET['id_usuario_alterar'];
  $nome = $_GET['nome_usuario_alterar'];
  $senha_alterar = $_GET['senha_usuario_alterar'];
  $tipo_usuario = $_GET['tipo_usuario'];
  $grupo_id = $_GET['grupo_id'];
  $status = $_GET['status'];

  sleep(1);
  if( strlen($nome) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o Nome do Usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($senha_alterar) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou a SENHA.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($tipo_usuario) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não selecionou o tipo de usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($grupo_id) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não selecionou o grupo do Usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($status) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não informou o STATUS do usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      print "Senha antiga $senha_alterar";
      $senha_alterar = md5($senha_alterar);
      print "Nova senha $senha_alterar";

      // $sql = "INSERT INTO usuarios (senha, status, usuario, nome, grupo_id)
      // VALUES ('$senha','$status','$tipo_usuario','$nome_usuario','$grupo_id')";

      $sql = " UPDATE usuarios
              SET nome='$nome',
              senha='$senha_alterar',
              status='$status',
              usuario='$tipo_usuario',
              grupo_id='$grupo_id'
              WHERE (id='$id_alterar')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Usuário Alterado com Sucesso! <a href="cadastro-usuario.php" class="alert-link"> Voltar para Tela GERENCIAR USUÁRIOS.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }else{
        print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Falha ao alterar usuário, favor tentar novamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
  }
}



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


// Cadastrar CLIENTE
if ( isset($_GET['nome_cliente']) and isset($_GET['endereco']) and isset($_GET['celular']) and isset($_GET['cpf_cnpj']) ){
  $nome_cliente = $_GET['nome_cliente'];
  $celular = $_GET['celular'];
  $email = $_GET['email'];
  $cpf_cnpj = $_GET['cpf_cnpj'];
  $endereco = $_GET['endereco'];
  $bairro = $_GET['bairro'];
  $cidade = $_GET['cidade'];

  sleep(1);
  if( strlen($nome_cliente) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o Nome do Cliente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($cidade) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou a cidade do Cliente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      $sql = "INSERT INTO clientes (nome, celular, email, cpf_cnpj, endereco, bairro, id_cidade)
      VALUES ('$nome_cliente','$celular','$email','$cpf_cnpj','$endereco','$bairro','$cidade')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Cliente Cadastrado com Sucesso! <a href="cadastro-cliente.php" class="alert-link"> Voltar para Tela GERENCIAR CLIENTES.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }else{
        print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Falha ao cadastrar cliente, favor tentar novamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
  }
}

// Cadastrar USUÁRIO
if ( isset($_GET['nome_usuario']) and isset($_GET['senha']) and isset($_GET['tipo_usuario']) and isset($_GET['grupo_id']) ){
  $nome_usuario = $_GET['nome_usuario'];
  $senha_usuario = $_GET['senha'];
  $tipo_usuario = $_GET['tipo_usuario'];
  $grupo_id = $_GET['grupo_id'];
  $status = $_GET['status'];

  sleep(1);
  if( strlen($nome_usuario) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou o Nome do Usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($senha_usuario) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou a SENHA.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($tipo_usuario) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não selecionou o tipo de usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($grupo_id) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não selecionou o grupo do Usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($status) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não informou o STATUS do usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
      include "../includes/conexao.php";
      $senha_usuario = md5($senha_usuario);
      $sql = "INSERT INTO usuarios (senha, status, usuario, nome, grupo_id)
      VALUES ('$senha_usuario','$status','$tipo_usuario','$nome_usuario','$grupo_id')";

      if ($query = $conexao->query($sql) ){
        print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Usuário Cadastrado com Sucesso! <a href="cadastro-usuario.php" class="alert-link"> Voltar para Tela GERENCIAR USUÁRIOS.</a>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';

      }else{
        print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Falha ao cadastrar usuário, favor tentar novamente.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
      }
  }
}
