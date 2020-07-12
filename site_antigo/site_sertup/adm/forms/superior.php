<?php
session_start();
include('../classes.php');
date_default_timezone_set('America/Sao_Paulo');
new Conexao();
$seguranca=new Seguranca();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SISTEMA IMOBILIÁRIO</title>
    <link href="css/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="../css/reset.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />

    <link href="css/form.css" rel="stylesheet" type="text/css" />
    <link href="css/colorbox.css" rel="stylesheet" type="text/css" />
    
    <link href="css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    <link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="js/jquery.colorbox.js"></script>
    <script type="text/javascript" src="js/jquery.price_format.1.5.js"></script>
    
    
    <script type="text/javascript" src="js/js.js"></script>


</head>
<body>


    <div id="tudo">

        <div id="cab">
            <a href="../index.php"><img src="../imagens/cab_r1_c1.jpg"/></a>
                <p>Nome:<?php echo $_SESSION['nome'];?></br>
                Usuário:<?php echo $_SESSION['usuario'] ?> - <?php echo $_SESSION['nome_grupo'] ?>
                </p>
        </div>
        <div id="conteudo">




