<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="imagens/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <!-- <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    /> -->

    <!--Ícones  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- CSS próprio -->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/galeria.css">

    <!-- JS próprio -->
    <script src="js/galeria.js"></script>

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

    <div class="row justify-content-md-center">
        <div class="col col-lg-8 text-center">
         <!--Wtricks Header Bar-->
    <div class="wtricks-headerbar">
        <a  href="http://wtricks.com.br" class="wtricks-logo">
            Wtricks • Tutoriais e Dicas do Mundo Digital
        </a>
    </div>
    <!--End of Wtricks Header Bar-->

    <div class="wrap">
        <!--Cabeçalho da página-->
        <div class="page-header">
            <h1>Galeria de Fotos responsiva com CSS e JS</h1>
            <p>
               Modelo simples de galeria de fotos usando apenas CSS e JS. Essa galeria trabalha
                com o modelo mais básico possível. Recomendado para quem quer apenas exibir algumas fotos, sem nenhum outra função mais avançada, ou então, usar como base para criar outro modelo mais complexo.
            </p>
        </div>

        <!-- Principal Section with the gallery code. If you want use only gallery code,
             you can copy all code bellow, with gallery-container.-->
        <section class="container gallery-container">

            <!--Slide-->
            <div class="mySlides fade"> <!-- 01 -->
                <div class="numbertext">01 / 05</div>
                <img class="imgslide" src="http://www.recicloteca.org.br/wp-content/uploads/2015/09/Arara_Azul_G.jpg" alt="Arara Azul"/>
                <div class="text">Arara Azul</div>
            </div>

            <div class="mySlides fade"> <!-- 02 -->
                <div class="numbertext">02 / 05</div>
                <img class="imgslide" src="http://s2.glbimg.com/ErYukI6eUMDIsikMjuZe7-LZgUg=/s.glbimg.com/jo/g1/f/original/2015/01/06/55555.jpg" alt="Arara Canindé"/>
                <div class="text">Arara Canindé</div>
            </div>

            <div class="mySlides fade"> <!-- 03 -->
                <div class="numbertext">03 / 05</div>
                <img class="imgslide" src="http://www.anilhascapri.com.br/novo/wp-content/uploads/2016/07/comprar-papagaio-verdadeiro.jpg" alt="Papagaio Verdadeiro"/>
                <div class="text">Amazona é um género de papagaios da ordem Psittaciformes, característico da América, existindo desde o sul do México até o Caribe e a América do Sul. São conhecidos, popularmente, como papagaios, louros, ajerus, ajurus, jerus e jurus</div>
            </div>

            <div class="mySlides fade"> <!-- 04 -->
                <div class="numbertext">04 / 05</div>
                <img class="imgslide" src="https://i1.wp.com/www.windycityparrot.com/wordpress/wp-content/uploads/31094569_s.jpg?fit=450%2C300&ssl=1" alt="Jandaia"/>
                <div class="text">Jandaia</div>
            </div>

            <div class="mySlides fade"> <!-- 05 -->
                <div class="numbertext">05 / 05</div>
                <img class="imgslide" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Tiriba-de-testa-vermelha.jpg/1200px-Tiriba-de-testa-vermelha.jpg" alt="Jandaia"/>
                <div class="text">Tiriba de testa vermelha</div>
            </div>
            <!--Final Slides-->

            <!--Navigation-->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </section>
        <!--End of galery-->

        
    </div>



        </div>
      </div>
    
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
