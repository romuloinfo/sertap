<!DOCTYPE html>
<html lang="pt-br">
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

    <?php
      // include("pesquisa.php");
      // include("carousel.php");
    ?>
    <br>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h4 class="lead">Faça uma busca de imóveis personalizada</h4>
    <form id="form_contato">
      <div class="form-row">
        <div class="form-group col-md-6">
          <!-- <label for="assunto">Assunto</label> -->
          <select id="assunto" name="assunto" class="form-control">
            <option selected value="Não informado">Assunto...</option>
            <option value="Agendar Visita a um imóvel">Agendar Visita a um imóvel</option>
            <option value="Interessado em Comprar um imóvel">Interessado em Comprar um imóvel</option>
            <option value="Interessado em Vender um imóvel">Interessado em Vender um imóvel</option>
            <option value="Interessado em Alugar um imóvel">Interessado em Alugar um imóvel</option>
            <option value="Interessado em Alugar ou Vender o meu imóvel">Interessado em Alugar ou Vender o meu imóvel</option>
            <option value="Outro">Outro</option>
          </select>
         </div>
        <div class="form-group col-md-6">
          <!-- <label for="inputPassword4">Senha</label> -->
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <!-- <label for="inputEmail4">Email</label> -->
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <!-- <label for="inputPassword4">Senha</label> -->
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone (DDD) 9 9999-9999">
        </div>
      </div>

     <button type="button" class="btn btn-success btn-block" onclick="insereContato()">Enviar</button>
    </form>
    <br>
    <div id="resposta">

    </div>
  </div>
</div>

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
