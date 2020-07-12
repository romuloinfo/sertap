
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AUTENTICAÇÃO DE USUÁRIO</title>
<link href="adm/css/login-box.css" rel="stylesheet" type="text/css" />
</head>
<body>

<form name="autenticar" action="adm.php" method="POST">
    <input type="hidden" name="autenticar" value="Enviar"/>
    <div id="pagina">
        <div id="login-box">
            <H2>Login</H2>
            Prezado usuário, por favor, informe seu usuário e senha cadastrados no sistema.<br />
            <div id="login-box-name" style="margin-top:20px;">Usuário:</div><div id="login-box-field" style="margin-top:20px;"><input name="usuario" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
            <div id="login-box-name">Password:</div><div id="login-box-field"><input name="senha" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
            <div id="login-box-name">Código:</div><div id="login-box-field-codigo"><input name="code" type="text" class="form-codigo" title="CÃ³digo" value="" maxlength="2048" /></div>
            <div id="login-box-image"><img id="siimage" align="center" style="padding-right: 5px; border: 0" src="securimage/securimage_show.php?sid=<?php echo md5(time()) ?>" /></div></br>
            <div ><input type="image" src="login-btn.png" name="btnEnviar"  style="margin-left:90px;" /></div>
            
        </div>
    </div>
</form>
</body>
</html>
<?php

if(isset($_POST['autenticar'])){

  include("securimage/securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);
  if($valid == true) {
                include("adm/classes.php");
                new Conexao();

                $seguranca = new Seguranca();
                if(!($seguranca->autenticar($_POST['usuario'],$_POST['senha']))){
                        echo "<script>alert('UsuÃ¡rio ou senha informado incorretamente.')</script>";
                }
  } else {
      echo "<script>alert('Desculpe,cÃ³digo informado invÃ¡lido.')</script>";
  }
}
?>