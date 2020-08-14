<!DOCTYPE html>
<html lang="pt-br">
<?php
    include("adm/funcoes/funcoes-usuario.php");
?>
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="imagens/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!--Ícones  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- <link rel="stylesheet" href="css/estilo-imagem.css"> -->

    <title>SERTAP IMÓVEIS</title>
  </head>
  <body>
    <div class="bg-sertap">
      <?php
      include("includes/menu.php");
      ?>
    </div>   

    <div class="container mt-1">

      <div class="row justify-content-center">    
          <div class="col col-12 col-md-3 text-center mt-1">
            <?php
              include("includes/pesquisa2.php");
            ?>
          </div>
          <div class="col col-12 col-md-9 text-center mt-1">
            <?php
              include("includes/carousel2.php");
            ?>
          </div>
      </div>      <!-- row -->  

    <div class="row justify-content-center">   
        <div class="col-12 mt-3">
          <h2 class="text-center font-weight-light">
            Novos Imóveis
          </h2>
        </div> 

        <!-- Não apararece em dispositivos menores que MD -->
        <div class="col col-12 col-md-3 text mt-1 pr-lg-4 pr-md-4 d-none d-md-block">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
        
        <div class="col col-12 col-md-9 text-center">
          <?php
            include("includes/pesquisa-imoveis-iniciais.php");
          ?>
        </div>

        <!-- Aparecer apenas em tablet e celular // d-sm-none Esconde em telas acima de SM-->
        <div class="col col-12 col-md-2 text mt-1 d-md-none" id="resposta">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
    
    </div>      <!-- row -->  
    

    </div>    <!-- container -->
<br>

    <?php include("includes/footer.php"); ?>


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
