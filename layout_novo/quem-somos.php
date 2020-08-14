<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imagens/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
    <!-- Bootstrap CSS -->

    <title>SERTAP IMÓVEIS</title>


  </head>
  <body>
    <div class="bg-sertap">
      <?php
      include("includes/menu.php");
      ?>
    </div>
    <!-- <div style="margin-top:50px;"></div> -->

    <div class="container">

      <div class="row justify-content-center text-justify">   

        <!-- Não apararece em dispositivos menores que MD -->
        <div class="col col-12 col-md-3 text mt-1 pr-lg-4 pr-md-4 d-none d-md-block">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
        
        <div class="col col-12 col-md-9">
          <div class="row justify-content-center">
            <div class="col-lg-10">
            <br> <h4 class="text-center">Quem Somos</h4>
              <p>
                Precisando de uma solução ou querendo investir no mercado imobiliário na região de Janaúba-MG ou na Serra Geral, conte com a <b>SERTAP IMÓVEIS</b>, máxima transparência e atenção de corretora especializada.
              </p>
              <p>
                Somos especializados na <b>compra</b>, <b>venda</b> e <b>aluguel</b> de imóveis na região, onde prestamos toda assessoria necessária à realização de uma transação segura e tranquila, com acompanhamento jurídico e operacional de qualidade.
              </p>
              <p>
                Reconhecidos pela ética profissional e transparência no mercado imobiliário, oferecemos a nossos clientes um atendimento personalizado, resultando em segurança e satisfação a todos os negócios realizados.
              </p>
              <p>
                Possuímos profissionais capacitados e diferenciados para uma total eficiência e garantia nas intermediações imobiliárias. Entre em <a class="link-geral"; href="contato.php">contato</a>, teremos o prazer em ajudá-lo a realizar o sonho de adquirir a casa própria.
              </p>
            </div>
          </div>
        </div>

        <!-- Aparecer apenas em tablet e celular // d-sm-none Esconde em telas acima de SM-->
        <div class="col col-12 col-md-2 text mt-1 d-md-none" id="resposta">
          <?php
            include("includes/pesquisa3.php");
          ?>
        </div>
      
      </div> <!-- row -->
    </div> <!-- container -->
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
