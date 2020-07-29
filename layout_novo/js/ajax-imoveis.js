/* JavaScript AJAX */

function atualizarPagina() {
  document.location.reload(true);
  // window.location.reload(1);

  // setTimeout(function() {
  //   window.location.reload(1);
  // }, 3000);
}

function insereCategoria() {
  var categoria_cadastrar = document.getElementById('categoria_cadastrar').value;

  var resposta = document.getElementById('resposta');

  var ajax = new XMLHttpRequest();

  // resposta.innerHTML = '<center> <img src="imagens/loading.gif" width="120px"> </center>';
  resposta.innerHTML = '<center> <img src="../imagens/loading2.gif" width="120px"> </center>';

  ajax.open('GET', 'processa_cadastros.php?categoria_cadastrar=' + categoria_cadastrar, true);

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        document.getElementById('categoria_cadastrar').value = '';
        resposta.innerHTML = ajax.responseText;
      } else {
        resposta.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}

//INSERIR BAIRRO
function insereBairro() {
  var nome_bairro = document.getElementById('nome_bairro').value;
  var cidade = document.getElementById('cidade').value;
  // console.log(nome_bairro, cidade);
  var resposta = document.getElementById('resposta');

  var ajax = new XMLHttpRequest();

  // resposta.innerHTML = '<center> <img src="imagens/loading.gif" width="120px"> </center>';
  resposta.innerHTML = '<center> <img src="../imagens/loading2.gif" width="120px"> </center>';

  ajax.open('GET', 'processa_cadastros.php?nome_bairro=' + nome_bairro + '&cidade=' + cidade, true);

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        // document.getElementById('categoria_cadastrar').value = '';
        resposta.innerHTML = ajax.responseText;
      } else {
        resposta.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}

// INSERIR CIDADE
function insereCidade() {
  var id_cidade = document.getElementById('id_cidade').value;
  var nome_cidade = document.getElementById('nome_cidade').value;
  var estado = document.getElementById('estado').value;
  // console.log(nome_bairro, cidade);
  var resposta = document.getElementById('resposta');

  var ajax = new XMLHttpRequest();

  // resposta.innerHTML = '<center> <img src="imagens/loading.gif" width="120px"> </center>';
  resposta.innerHTML = '<center> <img src="../imagens/loading2.gif" width="120px"> </center>';

  ajax.open(
    'GET',
    'processa_cadastros.php?id_cidade=' + id_cidade + '&nome_cidade=' + nome_cidade + '&estado=' + estado,
    true
  );

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        // document.getElementById('categoria_cadastrar').value = '';
        resposta.innerHTML = ajax.responseText;
      } else {
        resposta.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}

//INSERIR IMÓVEL
function insereImovel() {
  var titulo = document.getElementById('titulo').value;
  var pre_descricao = document.getElementById('pre_descricao').value;
  var valor = document.getElementById('valor').value;
  var descricao = document.getElementById('descricao').value;
  var tipo = document.getElementById('tipo').value;
  var categoria = document.getElementById('categoria').value;
  var cidade = document.getElementById('cidade').value;
  var bairro = document.getElementById('bairro').value;
  var endereco = document.getElementById('endereco').value;
  var status_site = document.getElementById('status_site').value;
  var acao = document.getElementById('acao').value;
  var quarto = document.getElementById('quarto').value;
  var suite = document.getElementById('suite').value;
  var banheiro = document.getElementById('banheiro').value;
  var garagem = document.getElementById('garagem').value;
  var tamanho_imovel = document.getElementById('tamanho_imovel').value;
  var tamanho_imovel_descricao = document.getElementById('tamanho_imovel_descricao').value;
  var tamanho_terreno = document.getElementById('tamanho_terreno').value;
  var tamanho_terreno_descricao = document.getElementById('tamanho_terreno_descricao').value;
  var area_servico = document.getElementById('area_servico').value;
  var destaque = document.getElementById('destaque').value;

  var resposta = document.getElementById('resposta');

  var ajax = new XMLHttpRequest();

  // resposta.innerHTML = '<center> <img src="imagens/loading.gif" width="120px"> </center>';
  resposta.innerHTML = '<center> <img src="../imagens/loading2.gif" width="120px"> </center>';

  ajax.open(
    'GET',
    'processa_cadastro_imovel.php?titulo=' +
      titulo +
      '&pre_descricao=' +
      pre_descricao +
      '&valor=' +
      valor +
      '&descricao=' +
      descricao +
      '&tipo=' +
      tipo +
      '&categoria=' +
      categoria +
      '&cidade=' +
      cidade +
      '&bairro=' +
      bairro +
      '&endereco=' +
      endereco +
      '&status_site=' +
      status_site +
      '&acao=' +
      acao +
      '&quarto=' +
      quarto +
      '&suite=' +
      suite +
      '&banheiro=' +
      banheiro +
      '&garagem=' +
      garagem +
      '&tamanho_imovel=' +
      tamanho_imovel +
      '&tamanho_imovel_descricao=' +
      tamanho_imovel_descricao +
      '&tamanho_terreno=' +
      tamanho_terreno +
      '&tamanho_terreno_descricao=' +
      tamanho_terreno_descricao +
      '&area_servico=' +
      area_servico +
      '&destaque=' +
      destaque,
    true
  );

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        resposta.innerHTML = ajax.responseText;
        // document.getElementById('assunto').value = '';
        // document.getElementById('nome').value = '';
        // document.getElementById('email').value = '';
        // document.getElementById('telefone').value = '';
        // document.getElementById('mensagem').value = '';
      } else {
        resposta.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}

/*
function buscaDados() {
  var nome = document.getElementById('buscanome').value;
  var result = document.getElementById('dados');

  var ajax = new XMLHttpRequest();

  result.innerHTML = '<img src="loading.gif" width="100px">';

  ajax.open('GET', 'processa.php?buscanome=' + nome, true);

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        result.innerHTML = ajax.responseText;
      } else {
        result.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}
*/

/*
function deletaUsuario(id) {
  var result = document.getElementById('dados');

  var ajax = new XMLHttpRequest();

  result.innerHTML = '<img src="loading.gif" width="100px">';

  ajax.open('GET', 'processa.php?deleta=' + id, true);

  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        result.innerHTML = ajax.responseText;
      } else {
        result.innerHTML = 'Houve um erro na conexão AJAX: ' + ajax.statusText;
      }
    }
  };

  ajax.send(null);
}
*/
