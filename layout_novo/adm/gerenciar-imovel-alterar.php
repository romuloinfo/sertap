<!DOCTYPE html>
<html lang="pt-br">
  <?php
    if( isset($_GET['id_imovel']) ){
      include("funcoes/funcoes.php");
      $id = $_GET['id_imovel'];
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

    <?php
      if( isset($_GET['id_imovel']) ){
        $result = imovel_cadastrado($_GET['id_imovel']);
        foreach ($result as $resultado){
           $id = $resultado['id'];
           $descricao = $resultado['descricao'];
           $pre_descricao = $resultado['pre_descricao'];
           $titulo = $resultado['titulo'];
           $valor = $resultado['valor'];
           
           $id_categoria = $resultado['id_categoria'];
           $nome_categoria = $resultado['nome_categoria'];
           $destaque = $resultado['destaque'];
           $tipo = $resultado['tipo'];
           $status_site = $resultado['status_site'];
           
           $id_cidade = $resultado['id_cidade'];
           $nome_cidade = $resultado['nome_cidade'];
           $endereco = $resultado['endereco'];
           
           if (isset ($resultado['nome_bairro'])) {
              $bairro = $resultado['bairro'];
              $nome_bairro = $resultado['nome_bairro'];
           }else{
              $bairro = "";
              $nome_bairro = "";
           }
           $quartos = $resultado['quartos'];
           $banheiros = $resultado['banheiros'];
           $garagem = $resultado['garagem'];
           $tamanho_imovel = $resultado['tamanho_imovel'];
           $tamanho_imovel_descricao = $resultado['tamanho_imovel_descricao'];
           $tamanho_terreno = $resultado['tamanho_terreno'];
           $tamanho_terreno_descricao = $resultado['tamanho_terreno_descricao'];
           $area_servico = $resultado['area_servico'];
           $suites = $resultado['suites'];
           $acao = $resultado['acao'];
           
        }
    ?>
    <br>
   <form id="form_contato">
   
   <input type="hidden" name="id_imovel_alterar" id="id_imovel_alterar" value="<?php print $id; ?>">
   
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h4 class="lead bg-titulo">Alterar Imóvel</h4>
        <div class="form-row">

            <div class="form-group col-md-12">
              <label class="text-secondary" for="">Título</label>
              <input required type="text" class="form-control" value="<?php print $titulo; ?>" id="titulo" name="titulo" placeholder="Título *">
            </div>

            <div class="form-group col-md-12">
              <label class="text-secondary" for="">Pré Descrição</label>
              <input type="text" class="form-control" value="<?php print $pre_descricao; ?>" id="pre_descricao" name="pre_descricao" placeholder="Pré Descrição">
            </div>

            <div class="form-group col-md-6">
            <label class="text-secondary" for="">Valor</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend2">R$</span>
                </div>
                <input required type="number" class="form-control" value="<?php print $valor; ?>" id="valor" name="valor" placeholder="Valor *" aria-describedby="inputGroupPrepend2">
              </div>
            </div>

        </div>   <!-- formrow -->
        <div class="form-row">

            <div class="form-group col-md-12">
              <label class="text-secondary" for="">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao" rows="2" placeholder="Descrição"><?php print $descricao;?></textarea>
            </div>

            <div class="form-group col-md-6">
              <label class="text-secondary" for="">Tipo</label>
              <select required id="tipo" name="tipo" class="form-control">
                <?php qual_tipo($tipo)?>
                <option value="0">Aluguel</option>
                <option value="1">Venda</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label class="text-secondary" for="">Categoria</label>
              <select required id="categoria" name="categoria" class="form-control">
                <option selected value="<?php print $id_categoria;?>"><?php print $nome_categoria;?></option>
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
              <label class="text-secondary" for="">Cidade</label>
              <select required id="cidade" name="cidade" class="form-control">
                <option selected value="<?php print $id_cidade;?>"><?php print $nome_cidade?></option>
                 <?php
                    buscar_cidades();
                 ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label class="text-secondary" for="">Bairro</label>
              <select id="bairro" name="bairro" class="form-control">
                <option selected value="<?php print $bairro?>"><?php print $nome_bairro?></option>
                 <?php
                    buscar_bairros();
                 ?>
              </select>
            </div>

            <div class="form-group col-md-12">
              <label class="text-secondary" for="">Endereço</label>
              <input type="text" class="form-control" value="<?php print $endereco; ?>" id="endereco" name="endereco" placeholder="Endereço">
            </div>

        </div>          <!-- formrow -->

        <h4 class="lead bg-titulo">Detalhes</h4>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Status no Site</label>
            <select required id="status_site" name="status_site" class="form-control">
              <?php qual_status_site($status_site)?>
              <!-- <option selected value="">Status no Site... *</option> -->
              <option value="1">Ativado</option>
              <option value="0">Desativado</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Status no Contrato</label>
            <select required id="acao" name="acao" class="form-control">
              <?php qual_status_contrato($acao)?>
              <!-- <option selected value="">Status no Contrato... *</option> -->
              <option value="0">Disponível</option>
              <option value="1">Alugado</option>
              <option value="2">Vendido</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Quartos</label>
            <select id="quarto" name="quarto" class="form-control">
              <option selected value="<?php print $quartos?>"><?php print $quartos?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="4">5</option>
              <option value="5 ou mais">6 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Suítes</label>
            <select id="suite" name="suite" class="form-control">
              <option selected value="<?php print $suites?>"><?php print $suites?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5 ou mais">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Banheiros</label>
            <select id="banheiro" name="banheiro" class="form-control">
              <option selected value="<?php print $banheiros?>"><?php print $banheiros?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5 ou mais">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Garagem</label>
            <select id="garagem" name="garagem" class="form-control">
              <option selected value="<?php print $garagem?>"><?php print $garagem?></option>
              <option value="0">Não</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5 ou mais">5 ou mais</option>
            </select>
          </div>

          <div class="form-group col-md-4 col-8">
            <label class="text-secondary" for="">Tamanho do Imóvel</label>
            <input type="number" class="form-control" value="<?php print $tamanho_imovel; ?>" id="tamanho_imovel" name="tamanho_imovel" placeholder="Tamanho do Imóvel (só número)">
          </div>
          <div class="form-group col-md-2 col-4">
            <label class="text-secondary" for=""></label>
            <select id="tamanho_imovel_descricao" name="tamanho_imovel_descricao" class="form-control">
              <option selected value="<?php print $tamanho_imovel_descricao?>"><?php print $tamanho_imovel_descricao?></option>
              <option value="m²">m²</option>
              <option value="Hectare">hectare</option>
              <option value="Alqueire">Alqueire</option>
            </select>
          </div>

          <div class="form-group col-md-4 col-8">
            <label class="text-secondary" for="">Tamanho do Terreno</label>
            <input type="number" class="form-control" value="<?php print $tamanho_terreno; ?>" id="tamanho_terreno" name="tamanho_terreno" placeholder="Tamanho do Terreno (só número)">
          </div>

          <div class="form-group col-md-2 col-4">
            <label class="text-secondary" for=""></label>
            <select id="tamanho_terreno_descricao" name="tamanho_terreno_descricao" class="form-control">
              <option selected value="<?php print $tamanho_terreno_descricao?>"><?php print $tamanho_terreno_descricao?></option>
              <option value="m²">m²</option>
              <option value="Hectare">hectare</option>
              <option value="Alqueire">Alqueire</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Área de Serviço</label>
            <select id="area_servico" name="area_servico" class="form-control">
              <?php qual_area_servico($area_servico)?>
              <!-- <option selected value="">Área de Serviço...</option> -->
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="text-secondary" for="">Destaque no Site</label>
            <select id="destaque" name="destaque" class="form-control">
              <?php qual_destaque_site($destaque)?>
              <!-- <option selected value="0">Destaque no Site...</option> -->
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>

          <div class="form-group col-md-12">
            <input type="submit" class="btn btn-success btn-block" value="Alterar">
          </div>
          <div class="form-group col-md-12">
            <a href="gerenciar-imovel.php" class="btn btn-outline-success btn-block">Cancelar</a>
          </div>
        </div>    <!-- formrow -->
        <!-- <button type="button" class="btn btn-success btn-block" onclick="insereImovel()"> <i class="fas fa-map-marked-alt"></i> Alterar Imóvel</button> -->
      <br>
     </div>
    </div>
  </form>
      <div id="resposta">

      </div>
  <?php }?>

  <div class="row justify-content-center">
  <div class="col-md-10">
          <?php
            if ( isset($_GET['id_imovel_alterar']) ){
              $id_alterar = $_GET['id_imovel_alterar'];
              $descricao = $_GET['descricao'];
              $pre_descricao = $_GET['pre_descricao'];
              $titulo = $_GET['titulo'];
              $valor = $_GET['valor'];
              $categoria = $_GET['categoria'];
              $destaque = $_GET['destaque'];
              $tipo = $_GET['tipo'];
              $status_site = $_GET['status_site'];
              $cidade = $_GET['cidade'];
              $endereco = $_GET['endereco'];
              $bairro = $_GET['bairro'];
              $quarto = $_GET['quarto'];
              $banheiro = $_GET['banheiro'];
              $garagem = $_GET['garagem'];
              $tamanho_imovel = $_GET['tamanho_imovel'];
              $tamanho_imovel_descricao = $_GET['tamanho_imovel_descricao'];
              $tamanho_terreno = $_GET['tamanho_terreno'];
              $tamanho_terreno_descricao = $_GET['tamanho_terreno_descricao'];
              $area_servico = $_GET['area_servico'];
              $suite = $_GET['suite'];
              $acao = $_GET['acao'];

              

              include "../includes/conexao.php";
              $sql = " UPDATE imoveis
              SET descricao='$descricao',
              pre_descricao='$pre_descricao',
              titulo='$titulo',
              valor='$valor',
              id_categoria='$categoria',
              destaque='$destaque',
              tipo='$tipo',
              status_site='$status_site',
              id_cidade='$cidade',
              endereco='$endereco',
              bairro='$bairro',
              quartos='$quarto',
              banheiros='$banheiro',
              garagem='$garagem',
              tamanho_imovel='$tamanho_imovel',
              tamanho_imovel_descricao='$tamanho_imovel_descricao',
              tamanho_terreno='$tamanho_terreno',
              tamanho_terreno_descricao='$tamanho_terreno_descricao',
              area_servico='$area_servico',
              suites='$suite',
              acao='$acao'
              WHERE (id='$id_alterar')";

              // if (true ){
                if ($query = $conexao->query($sql) ){
                print '<br><br><div class="alert alert-success alert-dismissible fade show" role="alert">
                          Imóvel ALTERADO com Sucesso! <a href="gerenciar-imovel.php" class="alert-link"> Voltar para Tela GERENCIAR IMÓVEIS.</a>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';
              }
              else{
                print '<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                          Falha ao alterar os dados, favor tentar novamente. <a href="gerenciar-imovel.php" class="alert-link"> Voltar para Tela GERENCIAR IMÓVEIS.</a>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';
              }
            }

          ?>
        </div>
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
