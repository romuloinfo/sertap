<!DOCTYPE html>
<html lang="pt-br">
<?php
if( isset( $_GET['usuario']) ){
      $usuario_login = $_GET['usuario'];
      $senha_login = $_GET['senha'];

      include "includes/conexao.php";
      $senha_login = md5($senha_login);
      $sql = "select * from usuarios where usuario = '$usuario_login' AND senha = '$senha_login'";

      $resultado = $conexao->query($sql);

      if($resultado){
        $result = mysqli_fetch_assoc($resultado);

        if ( isset($result["id"]) ) {
          session_start();
          $_SESSION["id_login"] = $result["id"];
          $_SESSION["senha_login"] = $result["senha"];
          $_SESSION["status_login"] = $result["status"];
          $_SESSION["usuario_login"] = $result["usuario"];
          $_SESSION["nome_login"] = $result["nome"];
          $_SESSION["grupo_id_login"] = $result["grupo_id"];

          if ($result["status"] == "0") {
            print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Atenção!</strong> Este usuário está DESATIVADO. Entre em contato com o administrador para solicitar a alteração.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
          }
          else {
            // print "Login realizado.";
            header("location:adm/index.php");
          }
        }
        else {
          print '<div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Atenção!</strong> USUÁRIO e SENHA não conferem, tente novamente!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>';
        }
      }

  }

?>
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imagens/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/estilo.css">

    <!--Ícones  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Ajax -->
    <script src="js/ajax.js"></script>

    <title>SERTAP IMÓVEIS</title>


  </head>
  <body>
     <div class="bg-sertap">
      <?php
      include("includes/menu.php");
      ?>
    </div>
    <!-- <div style="margin-top:70px;"></div> -->

  <div class="container">

    <br> <br> <br>
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <form method="get" action="">
          <div class=" background-login border">
            <h4 class="lead">Confirme as suas credenciais</h4>

            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required>
              </div>
              <div class="form-group col-md-12">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
              </div>
            </div>

            <input type="submit" class="btn btn-success btn-block" value="Login">

            <!-- <button type="button" class="btn btn-success btn-block" onclick="login()"> <i class="fas fa-user"></i> Login</button> -->
          <br>
          </div>
        </form>
        <div id="resposta" class="">
          <?php

          ?>
        </div>

    </div>
  </div>  <!-- row -->

</div> <!-- container -->
<br>


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
