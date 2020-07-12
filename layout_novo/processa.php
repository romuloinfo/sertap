<?php

if(
  // isset($_GET['assunto']) and
  isset($_GET['nome']) and
  isset($_GET['email']) and
  isset($_GET['telefone']) and
  isset($_GET['mensagem'])
){
	$assunto = $_GET['assunto'];
	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$telefone = $_GET['telefone'];
	$mensagem = $_GET['mensagem'];

  sleep(1);
  if( strlen($nome) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso inserir um nome.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( empty($email)  and empty($telefone) ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso inserir pelo menos um contato (E-mail ou Telefone).
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  elseif( empty($mensagem) ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              Você não digitou a mensagem.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
    include_once "includes/conexao.php";
    $sql = "INSERT INTO contato (assunto, nome, email, telefone, mensagem)
    VALUES ('$assunto', '$nome', '$email', '$telefone', '$mensagem')";

    if ($query = $conexao->query($sql) ){

      print '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Mensagem Enviada com Sucesso! Em breve entraremos em contato.
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


