<?php

if(
  isset($_GET['id_categoria_alterar']) and
  isset($_GET['descricao'])
){

	$id_categoria_alterar = $_GET['id_categoria_alterar'];
	$descriao = $_GET['descriao'];
	
  sleep(1);
  if( strlen($descriao) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              O nome da CATEGORIA não poder estar vazio.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( strlen($id_categoria_alterar) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Não foi selecionada nenhuma categoria. 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
    include_once "../includes/conexao.php";
    
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


