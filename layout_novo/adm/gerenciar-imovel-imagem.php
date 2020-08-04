<!DOCTYPE html>
<html lang="pt-br">
  <?php
    if( isset($_GET['id_imovel']) ){
      include("funcoes/funcoes.php");
      $id = $_GET['id_imovel'];
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
    <br>
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_cadastro">
          <i class="far fa-plus-square"></i> Imagens
          </button> -->
          <h4 class="lead bg-titulo">Imagens do imóvel referente ao código:  <strong><?php print $id?></strong>
          </h4>
        </div>

        <div class="row col-md-10 col-lg-8 my-2">
              <div class="col-md-6 my-1">
                <!-- <input type="submit" class="btn btn-success btn-block" value="Alterar"> -->
                <button type="button" class="btn btn-success btn-block"data-toggle="modal" data-target="#modal_cadastro">  <i class="far fa-plus-square"></i> Adiconar Fotos</button>
              </div>
              <div class="col-md-6 my-1">
                <a href="gerenciar-imovel.php" class="btn btn-outline-success btn-block"> <i class="fas fa-ban"></i> Cancelar</a>
              </div>
        </div>

        <div class="col-md-10 col-lg-8">
            <div class="row">
                <?php
                  imovel_imagens($id);
                ?>
            </div>
            <!-- <form class="form-row justify-content-center">
              <input type="hidden" name="id_alterar" id="id_alterar" value="<?php print $id; ?>">

              <div class="form-group col-md-6">
                <button type="button" class="btn btn-success btn-block"data-toggle="modal" data-target="#modal_cadastro">  <i class="far fa-plus-square"></i> Adiconar Fotos</button>
              </div>
              <div class="form-group col-md-6">
                <a href="gerenciar-imovel.php" class="btn btn-outline-success btn-block"> <i class="fas fa-ban"></i> Cancelar</a>
              </div>
            </form> -->
        </div>
        <div id="resposta" class="col-md-8 col-lg-7">

        </div>

        <?php
          // }
        ?>

    </div>   <!-- row -->
 </div> <!-- container -->

<!-- Modal -->
  <div class="modal fade" id="modal_cadastro" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado"><i class="fas fa-camera"></i> Inserir nova Imagem </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="atualizarPagina()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-lg-10">

            <div class="form-row justify-content-center">
              <form class="col-md-12">
                <div class="form-group col-md-12">
                  <label>Escolha uma imagem de cada vez</label>
                  <input type="file" name="imagem" class="">
                </div>
                <div class="form-group col-md-12">
                  <!-- <input type="submit" class="btn btn-success btn-block" value="Cadastrar Categoria"> -->
                  <button type="button" class="btn btn-success btn-block" onclick="insereImagem()"> <i class="fas fa-camera"></i> Cadastrar Imagem</button>
                </div>
              </form>
              <div id="resposta" class="form-group col-md-12">

              </div>
          </div>   <!-- formrow -->
      </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="atualizarPagina()" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

<br> <br>

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
