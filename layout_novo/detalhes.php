<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <!--Ícones  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>SERTUP IMÓVEIS</title>
  </head>
  <body>
     <?php
      include("menu.php");
    ?>
    <div style="margin-top:70px;"></div>

    <div class="container">

      <?php
        include("pesquisa.php");
        // include("carousel.php");
      ?>
      <br>
      <div class="row">
          <!-- <div class="col-  .col-sm-	.col-md-	.col-lg-	.col-xl-"></div> -->
        <div class="col-md-6">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="imagens_publicas/11.jpg" alt="Primeiro Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="imagens_publicas/12.jpg" alt="Segundo Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="imagens_publicas/13.jpg" alt="Terceiro Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="imagens_publicas/14.jpg" alt="Terceiro Slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
        </div>

        <div class="col-md-6">
          <span class="lead"><b>APARTAMENTOS PARA ALUGAR</b></span> <br><br>
          <p class="valor text-center">
            Valor de Locação <br>
            <span class="lead"><b>R$ 750,00</b></span>
          </p>
          <br>
          3 QUARTOS SENDO 1 SUITE <br>

          1 SALA CONJUGADA COM COZINHA <br>
          1 BANHEIRO <br>
          ÁREA DE SERVIÇO <br>
          VARANDA <br>
          1 VAGA NA GARAGEM <br>
          INTERFONE <br>
          CÂMERAS DE SEGURANÇA NO PRÉDIO <br>
          PORTÃO ELETRÔNICO <br>
          ACESSO DE MONITORAMENTO PELO CELULAR <br>
          EXCELENTE OPORTUNIDADE EXCLUSIVA NA SERTAP IMÓVEIS! <br>

          <i class="fas fa-map-marker-alt"></i> Localização:  <br><br>
          Whatsapp <br>
          <i class="fab fa-whatsapp"></i> (38) 9 8831-0162 <br><br>
          Ligue agora <br>
          <i class="fas fa-phone-square"></i> (38) 9 9149-1964 <br>
          <i class="fas fa-phone-square"></i> (38) 9 9154-0000<br/>
        </div>

      </div><!-- row -->
    </div><!-- container -->
<br>

       <footer class="bg-dark">
      <div class="row justify-content-center">

        <div class="col-sm-5 text-center">
         <p style="color:#FFF" class="">
           <span class="lead">Redes Sociais</span><br/>
           <i class="fab fa-facebook"></i> <a style="color:#FFF;"href="#">Facebook</a> <br/>
           <i class="fab fa-instagram"></i> <a style="color:#FFF;"href="#">Instagram</a>
          </p>
        </div>

        <div class="col-sm-5 text-center">
         <p style="color:#FFF" class="">
           <span class="lead">Contatos</span><br/>
           <i class="fas fa-phone-square"></i> (38) 9 9149-1964
           <br><i class="fas fa-phone-square"></i> (38) 9 9154-0000<br/>
           <i class="fas fa-envelope"></i> sertapimoveis@hotmail.com
          </p>
        </div>

        <div class="col-sm-10 text-center">
         <p style="color:#FFF" class="small">
           Copyright 2017 imobiliária - <b>SERTAP IMÓVEIS</b> Janaúba. Todos os direitos reservados.<br/>
           <i class="fas fa-map-marker-alt"></i> Avenida Marechal Deodoro da Fonseca, 314 - centro-Janaúba/MG Janaúba/MG - CEP: 39.440-000<br/>
          </p>
        </div>

      </div>

    </footer>
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
