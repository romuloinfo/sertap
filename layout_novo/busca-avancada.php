<!DOCTYPE html>
<html lang="pt-br">
<?php
    include("adm/funcoes/funcoes-usuario.php");
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
    <div class="container">
      <div class="row justify-content-center text-justify">   

          <!-- Não apararece em dispositivos menores que MD -->
          <div class="col col-12 col-md-3 mt-1 pr-lg-4 pr-md-4 d-none d-md-block">
            <?php
              include("includes/pesquisa3.php");
            ?>
          </div>
          
          <div class="col col-12 col-md-9">
            <div class="row justify-content-center">
              <div class="col-lg-10">
                  <?php
                    include("includes/pesquisa-avancada.php");
                  ?>
              </div>
              <div class="col col-12 col-md-11 mt-1 pr-lg-4 border">
                  Resultado da pesquisa aqui!
              </div>
              
            </div>
          </div>

        <!-- Aparecer apenas em tablet e celular // d-sm-none Esconde em telas acima de SM-->
        <div class="col col-12 text mt-1 d-md-none">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
        
      </div>   <!-- row -->
    </div> <!-- container -->
  
  
  
  
  
  
  
  
  




      


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
