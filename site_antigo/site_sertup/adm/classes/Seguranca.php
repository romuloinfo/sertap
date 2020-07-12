<?php
class Seguranca{


 function __construct()
 {
    //$this->gravaPagina();
 }

 public function gravaPagina(){
     $sql = "INSERT INTO  aplicacoes_paginas(pagina,descricao,id_aplicacao)VALUES ('".$this->getPagina()."',  '',  '1')";

     mysql_query($sql);
 }
        
 
	public function verificaPasta(){
            $texto= getcwd();
            $path = explode("sertapimoveis",$texto);
            if (empty($path[1])){
                return '';
            }else{
                return '../';
            }
	}

function geraTimestamp($data) {
    $partes = explode('/', $data);
    return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}
        
        
function encrypt($str)
{    
   if  ($str != "0"){
  for($i=0; $i<6;$i++)
  {
    $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
  }

   }

  return $str;
}

//function to decrypt the string

function decrypt($str){
    $str = $this->antiInjection($str);
   if  ($str != "0"){
  for($i=0; $i<6;$i++)
  {
    $str = base64_decode(strrev($str)); //apply base64 first and then reverse the string}
  }
   }
  return $str;
}
/*
function encrypt($conteudo)
 {
        $chave = ord("href.location");
 	$str = '';
	$total = strlen($conteudo);
	for($i=0;$i!=$total;$i++)
	{
//Pega cada caractere do conteudo, transforma em ascii e soma o valor da chave,retornando uma outra string
	$int_str = ord(substr($conteudo,$i,1));
	$str.=chr($int_str+$chave);
	}
	return $str;
 }
  function decrypt($conteudo)
 {
              $chave = ord("href.location");
 	$str = '';
	$total = strlen($conteudo);
	for($i=0;$i!=$total;$i++)
	{
// Faz o sentido inverso , subtraido o valor da chave para obter o conteudo
	$int_str = ord(substr($conteudo,$i,1));
	$str.=chr($int_str-$chave);
	}
	return $str;
 }

*/
function verificaAutenticacao(){		
        if( !((isset($_SESSION['logado']) == 'SIM') AND (isset($_SESSION['usuario'])) AND (isset($_SESSION['grupo'])) )){
           // header("Location:/locacao/");
            echo "<script>window.location='/locacao/'</script>";
            exit;
        }else{
            return true;
        }
    }
  
  public  function antiInjection($str){
        # Remove palavras suspeitas de injection.
//        $str = preg_replace(sql_regcase("/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $str);
        $str = trim($str);
        # Remove espaï¿½os vazios.
        $str = strip_tags($str);
        # Remove tags HTML e PHP.
        $str = addslashes($str);
        # Adiciona barras invertidas ï¿½ uma string.
        return $str;
}

    public function  autenticar($usuario,$senha){        
        $usuario = $this->antiInjection($usuario);
        $senha = md5($this->antiInjection($senha));
        $user = new Usuario();
        $user->selecionarPorUserSenhaAtivo($usuario,$senha);
        $usuario = $user->getUsuario();
        if (!empty ($usuario)){
           $this->gravaSessoes($user->getGrupo()->getDescricao(),$user->getGrupo()->getId(),$user->getUsuario(),$user->getId(),$user->getNome());
           echo "<script>window.location='adm/'</script>";           
        }else{
            return false;
        }
        return false;
    }

  private  function gravaSessoes($nome_grupo,$grupo,$usuario,$id,$nome){
             //setcookie("ck_authorized", "true", 0, "/");
            $_SESSION['id']         = $id;
            $_SESSION['usuario']    = $usuario;
            $_SESSION['nome']       = $nome;
            $_SESSION['grupo']      = $grupo;
            $_SESSION['logado']     = "SIM";
            $_SESSION['nome_grupo'] = $nome_grupo;
    }


 /*  private  function verificaNivel(){
        switch ($_SESSION['nivel']){
            case 0 : return " servidores.id = " . $_SESSION['id'];break;
            case 1 : return " servidores.fck_setor = " . $_SESSION['setor'];break;
            case 2 : return "";break;
        }
      }
  *
  */
  private function getPagina(){
    	$texto= $_SERVER['REQUEST_URI'];
        $path = explode("/",$texto);
        $count = count($path);
        $pagina = $path[--$count];
        $pagina = explode(".php",$pagina);
        return $pagina[0];
      }
      public function verificaPermissao($acao){            
          if($this->verificaAutenticacao()){
            $pagina = $this->getPagina();
            switch($acao){
                case "SELECT" : $sql = "SELECT aplicacoes_grupos.select as result FROM  aplicacoes_grupos INNER JOIN aplicacoes_paginas on aplicacoes_paginas.id_aplicacao = aplicacoes_grupos.id_aplicacao WHERE aplicacoes_grupos.id_grupo = ".$this->decrypt($_SESSION['grupo'])." AND  pagina = '$pagina'" ;BREAK;
                case "INSERT" : $sql = "SELECT aplicacoes_grupos.insert as result FROM  aplicacoes_grupos INNER JOIN aplicacoes_paginas on aplicacoes_paginas.id_aplicacao = aplicacoes_grupos.id_aplicacao WHERE aplicacoes_grupos.id_grupo = ".$this->decrypt($_SESSION['grupo'])." AND  pagina = '$pagina'" ;BREAK;;BREAK;
                case "UPDATE" : $sql = "SELECT aplicacoes_grupos.update as result FROM  aplicacoes_grupos INNER JOIN aplicacoes_paginas on aplicacoes_paginas.id_aplicacao = aplicacoes_grupos.id_aplicacao WHERE aplicacoes_grupos.id_grupo = ".$this->decrypt($_SESSION['grupo'])." AND  pagina = '$pagina'" ;BREAK;;BREAK;
                case "DELETE" : $sql = "SELECT aplicacoes_grupos.delete as result FROM  aplicacoes_grupos INNER JOIN aplicacoes_paginas on aplicacoes_paginas.id_aplicacao = aplicacoes_grupos.id_aplicacao WHERE aplicacoes_grupos.id_grupo = ".$this->decrypt($_SESSION['grupo'])." AND  pagina = '$pagina'" ;BREAK;;BREAK;
            }
            $result = mysql_query($sql);
            $linha =mysql_num_rows($result);
            if($linha ==0){
               include 'acessoNegado.php';
               return false;
            }else{
                 $resultado = mysql_fetch_array($result);
                 if($resultado['result'] == 1){
                    return true;
                 }else{
                    include 'acessoNegado.php';
                    return false;
                 }
            }
          }
      }

/*  public function verificaPermissao($aplicacao=null,$acesso=null){
      if( ! ($aplicacao == null and $acesso == null )){

      switch($acesso){
          case "select" :
          $sql = "SELECT * FROM aplicacoes_grupos  where id_grupo = '". $_SESSION['id_grupo']." and id_aplicacao = '$aplicacao' and select = '1'";
          break;
          case "insert" :
          $sql = "SELECT * FROM aplicacoes_usuarios  where id_usuario = '". $_SESSION['id']." and id_aplicacao = '$aplicacao' and insert = '1'";
          break;
          case "update" :
          $sql = "SELECT * FROM aplicacoes_usuarios  where id_usuario = '". $_SESSION['id']." and id_aplicacao = '$aplicacao' and update = '1'";
          break;
          case "delete" :
          $sql = "SELECT * FROM aplicacoes_usuarios  where id_usuario = '". $_SESSION['id']." and id_aplicacao = '$aplicacao' and delete = '1'";
          break;
          default:
              return false;
      }
          
          $row = mysql_num_rows(mysql_query($sql));
          if($row ==0){
           include 'acessoNegado.php';
           return false;
          }else{
              return true;
          }
      }
     
          return false;
      }
 * 
 */
 public     function getURLRais(){
        $texto= getcwd();
        $path = explode("locacao",$texto);
        if (empty($path[1])){
            $pathrais ='';
        }else{
            $pathrais ='../';
        }
        return $pathrais;
      }


    function dataBR($data){
        if(! empty ($data)){
             $ex = explode("-",$data);
             $ano=$ex[0];
             $mes=$ex[1];
             $dia=$ex[2];
             $data= "$dia/$mes/$ano";
        return $data;
        }else{
        }
    }
    function dataBR2($data){
        if(! empty ($data)){
             $ex = explode("/",$data);
             $ano=$ex[2];
             $mes=$ex[1];
             $dia=$ex[0];
             $data= "$dia-$mes-$ano";
        return $data;
        }else{
        }
    }
function dataISO($data){
        if(!empty ($data)){
	 $ex = explode("/",$data);
	 $ano=$ex[2];
	 $mes=$ex[1];
	 $dia=$ex[0];
         $data= "$ano-$mes-$dia";
	 return $data;
        }
        return "";
    }
function dataISO2($data){
        if(!empty ($data)){
	 $ex = explode("/",$data);
	 $ano=$ex[2];
	 $mes=$ex[1];
	 $dia=$ex[0];
         $data= "$ano-$mes-$dia";
	 return $data;
        }
        return "";
    }
}
?>
