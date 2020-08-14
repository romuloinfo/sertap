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

    <!-- Se colocar o menu fixo é necessário essa linha
      <div style="margin-top:70px;"></div> -->

    <div class="container">

    <div class="row justify-content-center">    
        <div class="col col-12 col-md-2 text-center mt-1 d-none d-sm-block">
          <?php
            include("includes/pesquisa2.php");
          ?>
        </div>
        <div class="col col-12 col-md-10 text-center mt-1">
          <?php
             include("includes/carousel2.php");
          ?>
        </div>
    </div>      <!-- row -->  

    <!-- visível apenas em celular -->
    <div class="d-block d-sm-none mt-2">
      <p class="text-center" style="margin:1px">
          <span class="lead" style="color:#0a2516"><i class="fas fa-house-damage"></i> Encontre seu Imóvel <i class="fas fa-house-damage"></i></span>
      </p>
      <?php
        include("includes/pesquisa.php");
      ?>
    </div>

    <div class="row justify-content-center">   
        <div class="col-12 mt-3">
          <h2 class="text-center">
            Novos Imóveis
          </h2>
        </div> 

        <div class="col col-12 col-md-2 text mt-1 d-none d-sm-block">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
        
        <div class="col col-12 col-md-10 text-center">
          <div class="row justify-content-center">
          
            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1 sobre">
                <a href="#" class="">
                  <img class="img-fluid p-1" src="imagens_publicas/7.jpg">
                </a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>

            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1 sobre">
                <a href="#" class=""><img class="img-fluid p-1" src="imagens_publicas/11.jpg"></a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>

            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1 sobre">
                <a href="#" class=""><img class="img-fluid p-1" src="imagens_publicas/3.png"></a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>

            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1">
                <a href="#" class=""><img class="img-fluid p-1" src="imagens_publicas/4.png"></a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>

            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1">
                <a href="#" class=""><img class="img-fluid p-1" src="imagens_publicas/1.jpg"></a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>

            <div class="col-md-4 col-sm-6 col-10 shadow-lg mb-1 p-1">
                <a href="#" class=""><img class="img-fluid p-1" src="imagens_publicas/2.png"></a>
                <p class="text-center">
                  <a href="#" class="link-cor-imovel"><span class="lead"><b><i class="fas fa-home"></i> Casa</b></span></a><br/>
                  <span class="text-secondary font-weight-light">Cód. Referência: S201</span><br/>
                  <span class="text-secondary ">Aluguel Disponível</span><br/>
                  <span class="text-secondary font-weight-light">Bairro / Janaúba - Mg</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b><i class="fas fa-comment-dollar"></i> 120.000,00</b></span><br>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
            </div>





          </div>          <!-- row -->
        </div>  <!-- col -->
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
