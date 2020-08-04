<!DOCTYPE html>
<html lang="pt-br">
  <?php
    if( isset($_GET['id_usuario']) ){
      include("funcoes/funcoes.php");
      $id = $_GET['id_usuario'];
      $nome = $_GET['nome_usuario'];
      $usuario = $_GET['usuario'];
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
        // if( isset($_GET['id_usuario']) ){
        //   $result = usuario_cadastrado($_GET['id_usuario']);
        //   foreach ($result as $resultado){
        //     $id = $resultado['id'];
        //     $nome = $resultado['nome'];
        //     $senha = $resultado['senha'];
        //     $status = $resultado['status'];
        //     $usuario = $resultado['usuario'];
        //     $grupo_id = $resultado['grupo_id'];
        //   }

        ?>
        <div class="col-md-8 col-lg-7">
          <h4 class="lead bg-titulo">Deseja alterar os dados do Usuário <?php print $nome?></h4>
        </div>
        <div class="col-md-8 col-lg-7">
            <form class="form-row justify-content-center">
              <input type="hidden" name="id_alterar" id="id_alterar" value="<?php print $id; ?>">
              <div class="form-group col-md-12">
                <label class="text-secondary" for="nome">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php print $nome; ?>" placeholder="Nome completo*" required>
              </div>
              <div class="form-group col-md-12">
                <!-- <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                  <option selected value="">Tipo de Usuário...*</option>
                  <option value="admin">Administrador</option>
                  <option value="sertap">Sertap</option>
                </select> -->
                <label class="text-secondary" for="tipo_usuario">Nome do Usuário (Login)</label>
                <input type="text" class="form-control" id="tipo_usuario" name="tipo_usuario" value="<?php print $usuario; ?>" placeholder="Nome do usuário*" required>
              </div>
              <div class="form-group col-md-12">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha *">
              </div>
              <div class="form-group col-md-12">
                <select id="grupo_id" name="grupo_id" class="form-control">
                  <option selected value="">Grupo do Usuário...*</option>
                  <option value="1">Gerente Administrativo</option>
                  <option value="2">Secretário </option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <select id="status" name="status" class="form-control">
                  <option selected value="">Status...*</option>
                  <option value="1">Ativo</option>
                  <option value="0">Desativo </option>
                </select>
              </div>


              <div class="form-group col-md-6">
                <!-- <input type="submit" class="btn btn-success btn-block" value="Alterar"> -->
                <button type="button" class="btn btn-success btn-block" onclick="alteraUsuario()"> <i class="fas fa-user-shield"></i> Alterar Usuário</button>
              </div>
              <div class="form-group col-md-6">
                <a href="cadastro-usuario.php" class="btn btn-outline-success btn-block"> <i class="fas fa-ban"></i> Cancelar</a>
              </div>
            </form>
        </div>
        <div id="resposta" class="col-md-8 col-lg-7">

        </div>

        <?php
          // }
        ?>

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
