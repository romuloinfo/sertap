<?php

//buscar BAIRROS para colocar no select
function buscar_bairros(){
    include "../includes/conexao.php";
    $sql = "SELECT b.id_bairro, b.nome_bairro, c.descricao as nome_cidade
            FROM cidades c
            INNER JOIN bairros b
            on b.id_cidade = c.id
            ORDER BY c.descricao, b.nome_bairro ";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $r){
      $id = $r['id_bairro'];
      $descricao = $r['nome_bairro']." - (".$r['nome_cidade'].")";
      print "<option value='$id'>$descricao</option>";
    }
  }
}

//buscar categorias para colocar no select
function buscar_categorias(){
    include "../includes/conexao.php";
    $sql = "SELECT id, descricao FROM categorias ORDER BY id";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $categoria){
      $id = $categoria['id'];
      $descricao = $categoria['descricao'];
      print "<option value='$id'>$descricao</option>";
    }
  }
}


//buscar cidades para colocar no select
function buscar_cidades(){
    include "../includes/conexao.php";
        $sql = "SELECT id, descricao FROM cidades ORDER BY descricao";
        $resultado = $conexao->query($sql);

    if($resultado){
        $result = array();
        while( $linha = mysqli_fetch_assoc($resultado) ){
            $result[] = $linha;
        }
        foreach ($result as $cidades){
            $id = $cidades['id'];
            $descricao = $cidades['descricao'];
            print "<option value='$id'>$descricao</option>";
        }
    }
}

//buscar estados para colocar no select
function buscar_estados(){
    include "../includes/conexao.php";
    $sql = "SELECT id, sigla FROM uf ORDER BY sigla";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    foreach ($result as $resultado){
      $id = $resultado['id'];
      $sigla = $resultado['sigla'];
      print "<option value='$id'>$sigla</option>";
    }
  }
}

//===================================================================================

// mostrar Categorias Cadastradas na tabela
function categorias_cadastradas(){
    include "../includes/conexao.php";
    $sql = "SELECT id, descricao FROM categorias ORDER BY id";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Cód.</th>
        <th scope='col'>Categoria</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $categoria){
      $id = $categoria['id'];
      $descricao = $categoria['descricao'];

      print "<tr>
        <td scope='row'>$id</td>
        <td>$descricao</td>

        <td class='text-center'> <a href='cadastro-categoria-alterar.php?id=$id&descricao=$descricao'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-categoria-excluir.php?id=$id&descricao=$descricao'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

  //mostrar bairros cadastrados na tabela
  function bairros_cadastrados(){
    include "../includes/conexao.php";
    $sql = "SELECT b.id_bairro, b.nome_bairro, c.descricao as nome_cidade
            FROM cidades c
            INNER JOIN bairros b
            on b.id_cidade = c.id
            ORDER BY c.descricao, b.nome_bairro ";
    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Cód. Bairro</th>
        <th scope='col'>Nome Bairro</th>
        <th scope='col'>Cidade</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id_bairro = $resultado['id_bairro'];
      $nome_bairro = $resultado['nome_bairro'];
      $nome_cidade = $resultado['nome_cidade'];

      print "<tr>
        <td scope='row'>$id_bairro</td>
        <td>$nome_bairro</td>
        <td>$nome_cidade</td>

        <td class='text-center'> <a href='cadastro-bairro-alterar.php?id_bairro=$id_bairro&nome_bairro=$nome_bairro&id_cidade=$nome_cidade'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-bairro-excluir.php?id_bairro=$id_bairro&nome_bairro=$nome_bairro'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

  //mostrar cidades cadastradas na tabela
function cidades_cadastradas(){
    include "../includes/conexao.php";
    $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
            FROM cidades c
            INNER JOIN uf u ON c.uf_id = u.id
            ORDER BY C.descricao";


    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Estado</th>
        <th scope='col'>Cód. Cidade</th>
        <th scope='col'>Cidade</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id_uf = $resultado['uf_id'];
      $id_cidade = $resultado['id'];
      $descricao = $resultado['descricao'];

      print "<tr>
        <td scope='row'>$id_uf</td>
        <td>$id_cidade</td>
        <td>$descricao</td>

        <td class='text-center'> <a href='cadastro-cidade-alterar.php?id_cidade=$id_cidade&nome_cidade=$descricao'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-cidade-excluir.php?id_cidade=$id_cidade&nome_cidade=$descricao'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

//Buscar detalhes de um único cliente
function cliente_cadastrado($id){
    include "../includes/conexao.php";
    // $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
    //         FROM cidades c
    //         INNER JOIN uf u ON c.uf_id = u.id
    //         ORDER BY C.descricao";

    $sql = "SELECT c.*, cidades.descricao as cidade
            FROM clientes c
            INNER JOIN cidades ON c.id_cidade = cidades.id
            WHERE c.id = $id
            ORDER BY cidade, c.nome";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    return $result;
    }
  }

  //mostrar CLIENTES cadastradas na tabela
function clientes_cadastrados(){
    include "../includes/conexao.php";
    // $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
    //         FROM cidades c
    //         INNER JOIN uf u ON c.uf_id = u.id
    //         ORDER BY C.descricao";

    $sql = "SELECT c.*, cidades.descricao as cidade
            FROM clientes c
            INNER JOIN cidades ON c.id_cidade = cidades.id
            ORDER BY cidade, c.nome";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Cód.</th>
        <th scope='col'>Nome</th>
        <th scope='col'>Endereço</th>
        <th scope='col'>Contato</th>
        <th scope='col'>Cidade</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id = $resultado['id'];
      $nome = $resultado['nome'];
      $endereco = $resultado['endereco'];
      $contato = $resultado['telefone']." / ".$resultado['celular'];
      $cidade = $resultado['cidade'];


      print "<tr>
        <td scope='row'>$id</td>
        <td>$nome</td>
        <td>$endereco</td>
        <td>$contato</td>
        <td>$cidade</td>

        <td class='text-center'> <a href='cadastro-cliente-alterar.php?id_cliente=$id'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-cliente-excluir.php?id_cliente=$id&nome_cliente=$nome'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

//mostrar imoveis cadastrados na tabela
function imoveis_cadastrados(){
    include "../includes/conexao.php";
    // $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
    //         FROM cidades c
    //         INNER JOIN uf u ON c.uf_id = u.id
    //         ORDER BY C.descricao";

    $sql = "SELECT *
            FROM imoveis
            ORDER BY id desc";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Cód.</th>
        <th scope='col'>Descrição</th>
        <th scope='col'>Status_Site</th>
        <th scope='col'>Contrato</th>
        <th scope='col' class='text-center'>Fotos</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id = $resultado['id'];
      $descricao = $resultado['descricao'];
      $status_site = $resultado['status_site'];
      $acao = $resultado['acao'];

      if ($status_site ==1) $status_site = "Ativado";
      elseif ($status_site ==0) $status_site = "Desativado";

      if ($acao == 0) $acao = "Disponível";
      elseif ($acao == 1) $acao = "Alugado";
      elseif ($acao == 2) $acao = "Vendido";

      print "<tr>
        <td scope='row'>$id</td>
        <td>$descricao</td>
        <td>$status_site</td>
        <td>$acao</td>
        <td class='text-center'> <a href='gerenciar-imovel-imagem.php?id_imovel=$id'><i class='fas fa-camera'></i></i> </a> </td>
        <td class='text-center'> <a href='gerenciar-imovel-alterar.php?id_imovel=$id'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'> <a href='gerenciar-imovel-excluir.php?id_imovel=$id'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }

//mostrar imagens do imovel cadastrado na tabela
function imovel_imagens($id){
    include "../includes/conexao.php";
    // $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
    //         FROM cidades c
    //         INNER JOIN uf u ON c.uf_id = u.id
    //         ORDER BY C.descricao";

    $sql = "SELECT *
            FROM imagens
            WHERE id_imovel = $id";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    // print "
    // <table class='table table-hover'>
    // <thead>
    //   <tr>
    //     <th scope='col'>Cód.</th>
    //     <th scope='col'>Imagem</th>
    //     <th scope='col' class='text-center'>Excluir</th>
    //   </tr>
    // </thead>
    // <tbody>";

    //Se não existir nenhuma foto
    if ( !isset($result[0]['id']) ) {
      print "<div class='col-md-12 my-2 alert alert-warning'>
                Este imóvel ainda não possui nenhuma imagem cadastrada.
             </div>";
    }

    foreach ($result as $resultado){
      $id_imagem = $resultado['id'];
      $imagem = $resultado['imagem'];
      print "<div class='col-sm-6 my-1'>
        <div class='card'>
          <img class='card-img-top' src='../img_pub/$imagem' alt='Imagem do imóvel'>
          <div class='card-body'>
            <p class='card-text'>
              <a href='gerenciar-imovel-excluir.php?id_imovel=$id_imagem'><i class='far fa-trash-alt'></i> Exluir</a>
            </p>
          </div>
        </div>
        </div>";

      // print "<tr>
      //   <td scope='row'>$id_imagem</td>
      //   <td class=''>
      //      <img src='../img_pub/$imagem' width='300px'>
      //   </td>
      //   <td class='text-center'>
      //       <a href='gerenciar-imovel-excluir.php?id_imovel=$id'><i class='far fa-trash-alt'></i> </a>
      //   </td>
      // </tr>";
    }
    // print"</tbody> </table>";
    }
  }


//mostrar Mensagens RECEBIDAS
function mensagens(){
    include "../includes/conexao.php";
    // $sql = "SELECT id_usuario ,nome, email, tipo_usuario, foto, status,
		// date_format(data_registro,'%d-%m-%Y') as data_registro_formatada,
		// date_format(data_nasc,'%d-%m-%Y') as data_nasc_formatada
		// FROM usuario WHERE (id_usuario='$id_usuario' AND senha='$senha')";

    $sql = "SELECT id_contato, assunto, nome, email, telefone, mensagem,
            date_format(data_mensagem,'%d-%m-%Y as %h:%i') as data_formatada
            FROM contato
            ORDER BY data_formatada desc";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Nome</th>
        <th scope='col'>Assunto</th>
        <th scope='col'>E-mail / Celular</th>
        <th scope='col'>Mensagem</th>
        <th scope='col'>Data</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id = $resultado['id_contato'];
      $nome = $resultado['nome'];
      $assunto = $resultado['assunto'];
      $email_celular = "Email: ".$resultado['email']."<br>Celular:  ".$resultado['telefone'];
      $mensagem = $resultado['mensagem'];
      $data_mensagem = $resultado['data_formatada'];


      print "<tr>
        <td scope='row'>$nome</td>
        <td>$assunto</td>
        <td>$email_celular</td>
        <td>$mensagem</td>
        <td>$data_mensagem</td>

        <td class='text-center'><a href='mensagem-excluir.php?id_mensagem=$id&nome_cliente_mensagem=$nome'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }



//Buscar detalhes de um único usuário
function usuario_cadastrado($id){
    include "../includes/conexao.php";
    $sql = "SELECT * FROM usuarios WHERE id = $id";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    return $result;
    }
  }




//mostrar USUARIOS cadastradas na tabela
function usuarios_cadastrados(){
    include "../includes/conexao.php";
    // $sql = "SELECT u.sigla as uf_id, c.id, c.descricao
    //         FROM cidades c
    //         INNER JOIN uf u ON c.uf_id = u.id
    //         ORDER BY C.descricao";

    $sql = "SELECT * FROM usuarios";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = array();
      while( $linha = mysqli_fetch_assoc($resultado) ){
        $result[] = $linha;
    }
    print "
    <table class='table table-striped'>
    <thead>
      <tr>
        <th scope='col'>Nome</th>
        <th scope='col'>Usuário</th>
        <th scope='col'>Status</th>
        <th scope='col' class='text-center'>Editar</th>
        <th scope='col' class='text-center'>Excluir</th>
      </tr>
    </thead>
    <tbody>";

    foreach ($result as $resultado){
      $id = $resultado['id'];
      $nome = $resultado['nome'];
      $usuario = $resultado['usuario'];
      $status = $resultado['status'];
      if ($status == 1) $status_nome = "Ativo";
      else $status_nome = "Desativo";

      print "<tr>
        <td scope='row'>$nome</td>
        <td>$usuario</td>
        <td>$status_nome</td>

        <td class='text-center'> <a href='cadastro-usuario-alterar.php?id_usuario=$id&nome_usuario=$nome&usuario=$usuario'><i class='far fa-edit'></i> </a> </td>
        <td class='text-center'><a href='cadastro-usuario-excluir.php?id_usuario=$id&nome_usuario=$nome'><i class='far fa-trash-alt'></i> </a> </td>
      </tr>";
    }
    print"</tbody> </table>";
    }
  }







?>