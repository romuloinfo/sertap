<!DOCTYPE html>
<html lang="pt-br">
  <?php
    if( isset($_GET['descricao']) ){
      $id = $_GET['id'];
      $descricao = $_GET['descricao'];
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
        if( isset($_GET['descricao']) ){
        ?>
        <div class="col-md-10">
          <h4 class="lead bg-titulo">Deseja alterar esta categoria?</h4>
        </div>
        <div class="col-md-10">
            <form action="" method="GET" class="form-row justify-content-center">
              <div class="form-group col-md-8">
                <!-- <label for="inputPassword4">Senha</label> -->
                <input type="text" class="form-control" id="categoria_alterar" name="categoria_alterar" value="<?php if (isset($_GET['descricao'])) print $descricao; ?>" 
                    placeholder="Nome da categoria" required>
                <input type="hidden" name="id_alterar" id="id_alterar" value="<?php print $id; ?>">
              </div>
              <div class="form-group col-md-8">
                <input type="submit" class="btn btn-success btn-block" value="Alterar">
              </div>
              <div class="form-group col-md-8">
                <a href="cadastro-categoria.php" class="btn btn-outline-success btn-block">Cancelar</a>
              </div>
            </form>
        </div>
        <?php } ?>
        <div class="col-md-10">
          <?php
            // $id = $_GET['id'];
            if ( isset($_GET['categoria_alterar']) ){
              $categoria_alterar = $_GET['categoria_alterar'];
              $id_alterar = $_GET['id_alterar'];
              
              include "../includes/conexao.php";
              $sql = " UPDATE categorias SET descricao='$categoria_alterar' WHERE (id='$id_alterar')";
              
              if ($query = $conexao->query($sql) ){
                print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Categoria ALTERADA com Sucesso! <a href="cadastro-categoria.php" class="alert-link"> Voltar para Tela de CATEGORIAS.</a>
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
