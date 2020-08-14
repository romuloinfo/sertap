<!DOCTYPE html>
<html lang="pt-br">
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
    <link rel="stylesheet" href="css/estilo-imagem.css">

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

    <p class="text-center" style="margin:1px">
        <span class="lead" style="color:#0a2516"><i class="fas fa-house-damage"></i> Encontre seu Imóvel <i class="fas fa-house-damage"></i></span>
      </p>
      <!-- <span style="color:#0a2516">Encontre seu Imóvel</span> -->
    <?php
      include("includes/pesquisa.php");
      include("includes/carousel.php");
    ?>
    <br>
    <div class="row">
        <!-- <div class="col-  .col-sm-	.col-md-	.col-lg-	.col-xl-"></div> -->
        <div class="col-12">
          <p class="lead">
            Imóveis em destaque para <span style="color:#0B3B17"><strong>Venda</strong></span>
          </p>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
          <div class="card">
              <img class="img-fluid" src="imagens_publicas/1.jpg" alt="Imagem de capa do card">
                <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Casa</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>120.000,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/2.png" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>LOTE 360 M²</b></span><br/>
                  <span style="color:#585858">Indisponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>70.000,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/3.png" alt="Imagem de capa do card">
                <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Lote 360 m²</b></span><br/>
                  <span style="color:#585858">Vendido</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>80.000,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/4.png" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>ÁREA 16 HECTARES</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>0,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

    </div>

      <br><br>
    <div class="row">
        <!-- <div class="col-  .col-sm-	.col-md-	.col-lg-	.col-xl-"></div> -->
        <div class="col-12">
          <p class="lead">
            Imóveis em destaque para <span style="color:#0B3B17"><strong>Locação</strong></span>
          </p>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/6.jpg" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Casa</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>900,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/7.jpg" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Casa</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>850,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/8.jpg" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Apartamento</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>1050,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-6" style="padding:3px;">
           <div class="card">
              <img class="card-img-top" src="imagens_publicas/9.jpg" alt="Imagem de capa do card">
              <p class="card-text text-center" style="margin:0px;">
                  <span class="lead"><b>Casa na Barragem</b></span><br/>
                  <span style="color:#585858">Disponível</span><br/>
                  <span style="font-size:15pt; color:#0B3B17"><b>1.700,00</b></span>
                </p>
                <p class="text-right" style="font-size:10pt; margin:3px;">
                <a style="color:#585858;"href="detalhes.php">+ Detalhes</a></p>
          </div>
        </div>

    </div>

    </div>
    <!-- container -->
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
