/* JavaScript AJAX */

function insereContato() {
  var assunto = document.getElementById('assunto').value;
  var nome = document.getElementById('nome').value;
  var email = document.getElementById('email').value;
  var telefone = document.getElementById('telefone').value;
  var mensagem = document.getElementById('mensagem').value;

  var resposta = document.getElementById('resposta');

  var ajax = new XMLHttpRequest();

  // resposta.innerHTML = '<center> <img src="imagens/loading.gif" width="120px"> </center>';
  resposta.innerHTML = '<center> <img src="imagens/loading2.gif" width="120px"> </center>';

  ajax.open(
    'GET',
    'processa.php?assunto=' +
      assunto +
      '&nome=' +
      nome +
      '&email=' +
      email +
      '&telefone=' +
      telefone +
      '&mensagem=' +
      mensagem,
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
