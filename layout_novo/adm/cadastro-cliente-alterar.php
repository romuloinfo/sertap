<!DOCTYPE html>
<html lang="pt-br">
  <?php
    if( isset($_GET['id_cliente']) ){
      include("funcoes/funcoes.php");
      $id = $_GET['id_cliente'];
    }
  ?>
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../imagens/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!-- CSS próprio -->
    <link rel="stylesheet" href="../css/estilo.css">

    <!--Ícones  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Ajax -->
    <script src="../js/ajax-imoveis.js"></script>

    <title>SERTAP IMÓVEIS</title>
  </head>
  <body>
     <div class="bg-sertap-adm">
      <?php
      include("../includes/menu-adm.php");
      ?>
    </div>
    <!-- <div style="margin-top:70px;"></div> -->

  <div class="container">
    <br> <br>
    <div class="row justify-content-center">
      <?php
        if( isset($_GET['id_cliente']) ){
          $result = cliente_cadastrado($_GET['id_cliente']);
          foreach ($result as $resultado){
            $id = $resultado['id'];
            $nome = $resultado['nome'];
            $cpf_cnpj = $resultado['cpf_cnpj'];
            $endereco = $resultado['endereco'];
            $email = $resultado['email'];
            $telefone = $resultado['telefone'];
            $celular = $resultado['celular'];
            $id_cidade = $resultado['id_cidade'];
            $nome_cidade = $resultado['cidade'];
            $id_bairro = $resultado['bairro'];
          }

        ?>
        <div class="col-md-10 col-lg-8">
          <h4 class="lead bg-titulo">Deseja alterar os dados deste cliente?</h4>
        </div>
        <div class="col-md-10 col-lg-8">
            <form action="" method="GET" class="form-row justify-content-center">
              <input type="hidden" name="id_alterar" id="id_alterar" value="<?php print $id; ?>">
              <div class="form-group col-md-12">
                <label class="text-secondary" for="nome_cliente_alterar">Nome</label>
                <input type="text" class="form-control" id="nome_cliente_alterar" name="nome_cliente_alterar" value="<?php print $nome; ?>" placeholder="Nome *" required>
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular_alterar" value="<?php print $celular; ?>" placeholder="Celular">
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone_alterar" value="<?php print $telefone; ?>" placeholder="Telefone">
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email_alterar" value="<?php print $email; ?>" placeholder="E-mail">
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="cpf_cnpj">CPF ou CNPJ</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj_alterar" value="<?php print $cpf_cnpj; ?>" placeholder="CPF ou CNPJ">
              </div>
              <div class="form-group col-md-12">
                <label class="text-secondary" for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco_alterar" value="<?php print $endereco; ?>" placeholder="Endereço">
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="bairro">Bairro</label>
                <select id="bairro" name="bairro_alterar" class="form-control">
                  <option selected value="<?php print $id_bairro;?>">Bairro...</option>
                  <?php
                      buscar_bairros();
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="text-secondary" for="cidade">Cidade</label>
                <select id="cidade" name="cidade_alterar" class="form-control">
                  <option selected value="<?php print $id_cidade; ?>"><?php print $nome_cidade; ?></option>
                  <?php
                      buscar_cidades();
                  ?>
                </select>
              </div>

              <div class="form-group col-md-12">
                <input type="submit" class="btn btn-success btn-block" value="Alterar">
              </div>
              <div class="form-group col-md-12">
                <a href="cadastro-cliente.php" class="btn btn-outline-success btn-block">Cancelar</a>
              </div>
            </form>
        </div>
        <?php } ?>
        <div class="col-md-10">
          <?php
            if ( isset($_GET['nome_cliente_alterar']) ){
              $id_alterar = $_GET['id_alterar'];
              $nome = $_GET['nome_cliente_alterar'];
              $cpf_cnpj = $_GET['cpf_cnpj_alterar'];
              $endereco = $_GET['endereco_alterar'];
              $email = $_GET['email_alterar'];
              $telefone = $_GET['telefone_alterar'];
              $celular = $_GET['celular_alterar'];
              $cidade = $_GET['cidade_alterar'];
              $bairro = $_GET['bairro_alterar'];

              include "../includes/conexao.php";
              $sql = " UPDATE clientes
              SET nome='$nome',
              cpf_cnpj='$cpf_cnpj',
              endereco='$endereco',
              email='$email',
              telefone='$telefone',
              celular='$celular',
              id_cidade='$cidade',
              bairro='$bairro'
              WHERE (id='$id_alterar')";

              if ($query = $conexao->query($sql) ){
                print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Cliente ALTERADO com Sucesso! <a href="cadastro-cliente.php" class="alert-link"> Voltar para Tela GERENCIAR CLIENTES.</a>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';
              }
              else{
                print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          Falha ao alterar os dados, favor tentar novamente. <a href="cadastro-cliente.php" class="alert-link"> Voltar para Tela GERENCIAR CLIENTES.</a>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';
              }
            }

          ?>
        </div>

    </div>   <!-- row -->
 </div> <!-- container -->
<br> <br> <br>

    <?php include("../includes/footer-adm.php"); ?>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
