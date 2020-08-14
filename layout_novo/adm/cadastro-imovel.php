<!DOCTYPE html>
<html lang="pt-br">
  <?php
    include("funcoes/funcoes.php");
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

    <?php
      // include("pesquisa.php");
      // include("carousel.php");
    ?>
    <br>
   <form id="form_contato">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h4 class="lead bg-titulo">Descrição do Imóvel que deseja cadastrar</h4>
        <div class="form-row">

            <div class="form-group col-md-12">
              <!-- <label for="inputPassword4">Senha</label> -->
              <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título *">
            </div>

            <div class="form-group col-md-12">
              <!-- <label for="inputPassword4">Senha</label> -->
              <input type="text" class="form-control" id="pre_descricao" name="pre_descricao" placeholder="Pré Descrição">
            </div>

            <div class="form-group col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2">R$</span>
                </div>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor *" aria-describedby="inputGroupPrepend2">
              </div>
            </div>

        </div>   <!-- formrow -->
        <div class="form-row">

            <div class="form-group col-md-12">
              <!-- <label for="exampleFormControlTextarea1">Exemplo de textarea</label> -->
              <textarea class="form-control" id="descricao" name="descricao" rows="2" placeholder="Descrição"></textarea>
            </div>

            <div class="form-group col-md-6">
              <!-- <label for="assunto">Assunto</label> -->
              <select id="tipo" name="tipo" class="form-control">
                <option selected value="">Tipo... *</option>
                <option value="0">Aluguel</option>
                <option value="1">Venda</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <!-- <label for="assunto">Assunto</label> -->
              <select id="categoria" name="categoria" class="form-control">
                <option selected value="">Categoria... *</option>
                <?php
                  buscar_categorias();
                  ?>
                <!-- <option value="4">Apartamento</option>
                <option value="7">Área</option>
                <option value="1">Casa</option>
                <option value="8">Chácara</option>
                <option value="2">Fazenda</option>
                <option value="5">Lote</option>
                <option value="3">Ponto Comercial</option>
                <option value="9">Pousada</option>
                <option value="6">Salas</option>
                <option value="10">Terreno</option> -->
              </select>
            </div>

          </div>          <!-- formrow -->

          <h4 class="lead bg-titulo">Endereço</h4>

          <div class="form-row">

            <div class="form-group col-md-6">
              <select id="cidade" name="cidade" class="form-control">
                <option selected value="">Cidade... *</option>
                <option value="3290">Janaúba</option>
                 <?php
                    buscar_cidades();
                 ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <select id="bairro" name="bairro" class="form-control">
                <option selected value="">Bairro...</option>
                 <?php
                    buscar_bairros();
                 ?>
              </select>
            </div>

            <div class="form-group col-md-12">
              <!-- <label for="inputEmail4">Email</label> -->
              <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
            </div>

        </div>          <!-- formrow -->

        <h4 class="lead bg-titulo">Detalhes</h4>
        <div class="form-row">

          <div class="form-group col-md-6">
            <select id="status_site" name="status_site" class="form-control">
              <option selected value="">Status no Site... *</option>
              <option value="1">Ativado</option>
              <option value="0">Desativado</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <select id="acao" name="acao" class="form-control">
              <option selected value="">Status no Contrato... *</option>
              <option value="0">Disponível</option>
              <option value="1">Alugado</option>
              <option value="2">Vendido</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <!-- <label for="assunto">Assunto</label> -->
            <select id="quarto" name="quarto" class="form-control">
              <option selected value="">Quartos...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <!-- <label for="assunto">Assunto</label> -->
            <select id="suite" name="suite" class="form-control">
              <option selected value="">Suítes...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <!-- <label for="assunto">Assunto</label> -->
            <select id="banheiro" name="banheiro" class="form-control">
              <option selected value="">Banheiros...</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <!-- <label for="assunto">Assunto</label> -->
            <select id="garagem" name="garagem" class="form-control">
              <option selected value="">Garagem...</option>
              <option value="0">Não</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-4 col-8">
            <input type="number" class="form-control" id="tamanho_imovel" name="tamanho_imovel" placeholder="Tamanho do Imóvel (só número)">
          </div>
          <div class="form-group col-md-2 col-4">
            <select id="tamanho_imovel_descricao" name="tamanho_imovel_descricao" class="form-control">
              <option selected value="m²">m²</option>
              <option value="Hectare">hectare</option>
              <option value="Alqueire">Alqueire</option>
            </select>
          </div>

          <div class="form-group col-md-4 col-8">
            <input type="number" class="form-control" id="tamanho_terreno" name="tamanho_terreno" placeholder="Tamanho do Terreno (só número)">
          </div>

          <div class="form-group col-md-2 col-4">
            <select id="tamanho_terreno_descricao" name="tamanho_terreno_descricao" class="form-control">
              <option selected value="m²">m²</option>
              <option value="Hectare">hectare</option>
              <option value="Alqueire">Alqueire</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <select id="area_servico" name="area_servico" class="form-control">
              <option selected value="">Área de Serviço...</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <select id="destaque" name="destaque" class="form-control">
              <option selected value="0">Destaque no Site...</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>

        </div>    <!-- formrow -->
        <button type="button" class="btn btn-success btn-block" onclick="insereImovel()"> <i class="fas fa-map-marked-alt"></i> Cadastrar Imóvel</button>
      <br>
     </div>
    </div>
  </form>
      <div id="resposta">

      </div>

</div> <!-- container -->
<br>

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
