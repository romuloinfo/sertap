<!DOCTYPE html>
<html lang="pt-br">
  <?php
    include("funcoes/funcoes.php");
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

  <div class="container">
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h4 class="lead bg-titulo" >
        Clientes Cadastrados
          <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_cadastro"> -->
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">

          <i class="far fa-plus-square"></i> Novo Cliente
          </button>
        </h4>

        <?php
          clientes_cadastrados();
        ?>

      </div>
    </div>

  </div> <!-- container -->

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <!-- <div class="modal-dialog modal-lg" role="document"> -->
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado">Cadastrar uma novo Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="atualizarPagina()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- modal header -->

        <div class="modal-body">
            <form class="">
              <div class="row justify-content-center">
                    <div class="form-group col-md-12">
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente *">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="CPF ou CNPJ">
                    </div>
                    <div class="form-group col-md-12">
                      <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                    </div>
                    <div class="form-group col-md-6">
                      <select id="bairro" name="bairro" class="form-control">
                        <option selected value="">Bairro...</option>
                        <?php
                            buscar_bairros();
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <select id="cidade" name="cidade" class="form-control">
                        <option selected value="">Cidade... *</option>
                        <?php
                            buscar_cidades();
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <!-- <input type="submit" class="btn btn-success btn-block" value="Cadastrar Categoria"> -->
                      <button type="button" class="btn btn-success btn-block" onclick="insereCliente()"> <i class="far fa-address-card"></i> Cadastrar Cliente</button>
                    </div>
              </div> <!--row -->
            </form>
            <div id="resposta" class="form-group col-md-12">

            </div>
        </div> <!-- modal body -->

      </div>    <!-- modal content -->

    </div>    <!-- modal dialog -->
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" onclick="atualizarPagina()" data-dismiss="modal">Fechar</button>
    </div>

  </div>  <!-- modal principal-->
<br>

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
