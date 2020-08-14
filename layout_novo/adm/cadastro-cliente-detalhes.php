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
          <h4 class="lead bg-titulo">Detalhes do cliente</h4>
        </div>
        <div class="col-md-10 col-lg-8">
                <label class="text-secondary">Nome: <?php print $nome; ?></label>
               <br> <label class="text-secondary" >Celular: <?php print $celular; ?></label>
               <br> <label class="text-secondary" >Telefone: <?php print $telefone; ?></label>
               <br> <label class="text-secondary" >E-mail: <?php print $email; ?></label>
               <br> <label class="text-secondary" >CPF ou CNPJ: <?php print $cpf_cnpj; ?></label>
               <br> <label class="text-secondary" >Endereço: <?php print $endereco; ?></label>
               <br> <label class="text-secondary" >Cidade: <?php print $nome_cidade; ?></label>
                <a href="cadastro-cliente.php" class="btn btn-success btn-block"><i class="far fa-arrow-alt-circle-left"></i> Voltar</a>
                <a href="cadastro-cliente-alterar.php?id_cliente=<?php print $id;?>" class="btn btn-outline-success btn-block"><i class="far fa-edit"></i> Editar</a>
                <!-- <a href='cadastro-cliente-alterar.php?id_cliente=$id'> -->
        </div>
        <?php } ?>
  

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
