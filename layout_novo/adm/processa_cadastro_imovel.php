<?php

if(
  isset($_GET['titulo']) and
  isset($_GET['valor']) and
  isset($_GET['tipo']) and
  isset($_GET['categoria']) and
  isset($_GET['cidade'])
){

	$titulo = $_GET['titulo'];
	$pre_descricao = $_GET['pre_descricao'];
	$valor = $_GET['valor'];
	$descricao = $_GET['descricao'];
	$tipo = $_GET['tipo'];
	$categoria = $_GET['categoria'];
	$cidade = $_GET['cidade'];
	$bairro = $_GET['bairro'];
	$endereco = $_GET['endereco'];
	$status_site = $_GET['status_site'];
	$acao = $_GET['acao'];
	$quarto = $_GET['quarto'];
	$suite = $_GET['suite'];
	$banheiro = $_GET['banheiro'];
	$garagem = $_GET['garagem'];
	$tamanho_imovel = $_GET['tamanho_imovel'];
	$tamanho_imovel_descricao = $_GET['tamanho_imovel_descricao'];
	$tamanho_terreno = $_GET['tamanho_terreno'];
	$tamanho_terreno_descricao = $_GET['tamanho_terreno_descricao'];
	$area_servico = $_GET['area_servico'];
  $destaque = $_GET['destaque'];
  $id_uf = "11"; //11 é o código do UF de Minas Gerais


  sleep(1);
  if( strlen($titulo) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso inserir um TÍTULO para o imóvel.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( empty($valor) ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso inserir o PREÇO do imóvel.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($tipo) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso selecionar o TIPO (Aluguel ou Venda) do imóvel. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($categoria) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso selecionar a CATEGORIA do imóvel. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( empty($cidade) ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso selecionar a CIDADE do imóvel. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($status_site) < 1  ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso selecionar STATUS NO SITE do imóvel. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($acao) < 1  ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso selecionar o STATUS NO CONTRATO do imóvel. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
    include_once "../includes/conexao.php";
    $data_mensagem = date('Y-m-d H:i');
    $sql = "INSERT INTO imoveis (titulo, pre_descricao, valor, descricao, tipo, id_categoria, id_cidade, bairro, 
    endereco, status_site, acao, quartos, suites, banheiros, garagem, tamanho_imovel, 
    tamanho_imovel_descricao, tamanho_terreno, tamanho_terreno_descricao, area_servico, destaque, id_uf)
    VALUES ('$titulo', '$pre_descricao', '$valor', '$descricao', '$tipo', '$categoria', '$cidade', '$bairro', 
    '$endereco', '$status_site', '$acao', '$quarto', '$suite', '$banheiro', '$garagem', '$tamanho_imovel',
    '$tamanho_imovel_descricao', '$tamanho_terreno', '$tamanho_terreno_descricao', '$area_servico', '$destaque', '$id_uf')";

    if ($query = $conexao->query($sql) ){

      print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Imóvel Cadastrado com Sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>';
    }
    else{
      print "Erro no SQL";
    }
  }
}
else{
   print '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Um erro ocorreu. Por favor, preencha todos os campos.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>';            
}

