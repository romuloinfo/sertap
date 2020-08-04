<?php

if( isset( $_GET['usuario']) and  isset($_GET['senha']) ){
	$usuario_login = $_GET['usuario'];
	$senha_login = $_GET['senha'];

  sleep(1);
  if( strlen($usuario_login) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso informar o nome do usuário.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }

  elseif( strlen($senha_login) < 1 ){
    print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              É preciso informar a SENHA.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
  }
  else{
    include "includes/conexao.php";
    $senha_login = md5($senha_login);
    $sql = "select * from usuarios where usuario = '$usuario_login' AND senha = '$senha_login'";

    $resultado = $conexao->query($sql);

    if($resultado){
      $result = mysqli_fetch_assoc($resultado);

      if ( isset($result["id"]) ) {
        session_start();
        print $_SESSION["id_login"] = $result["id"];
        print ", ";
        print $_SESSION["senha_login"] = $result["senha"];
        print ", ";
        print $_SESSION["status_login"] = $result["status"];
        print ", ";
        print $_SESSION["usuario_login"] = $result["usuario"];
        print ", ";
        print $_SESSION["nome_login"] = $result["nome"];
        print ", ";
        print $_SESSION["grupo_id_login"] = $result["grupo_id"];

        if ($result["status"] == "0") {
           print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Este usuário está DESATIVADO. Entre em contato com o administrador para solicitar a alteração.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>';
        }
        else {
          // print "Login realizado.";
          header("location:adm/index.php");
			  }
      }
      else {
         print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> USUÁRIO e SENHA não conferem, tente novamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>';
		  }
    }
  }
} //FECHANDO A FUNÇÃO




