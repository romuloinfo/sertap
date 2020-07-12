<?php
session_start();
include('classes.php');
new Conexao();
$seguranca=new Seguranca();
$seguranca->verificaAutenticacao();
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SISTEMA IMOBILIÁRIO</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />

		<style type="text/css" title="currentStyle">
			@import "css/demo_page.css";
			@import "css/demo_table.css";
                        @import "css/TableTools.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
                <script type="text/javascript" src="js/TableTools.js"></script>
                <script type="text/javascript" src="js/ZeroClipboard.js"></script>
                <script type="text/javascript" src="js/js.js"></script>
</head>




            
         