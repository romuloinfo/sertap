<?php
include 'adm/classes.php';
new Conexao();

$categoria = new Categoria();
$listaCaregoria = $categoria->selecionarTodos();
$imovel = new Imovel();
$listaCidades = $imovel->selecionarCidades();
?>
<html>
    <head>
        <title>SERTAP IMÓVEIS</title>
<meta name="keywords" content="Imobiliária, Imobiliária em Janaúba, Compra, Venda,  Aluguel,Casa,Imóveis,Fazenda,Sertap Imóveis,Sertap,Sertap Imobiliária,Janaúba" />
<meta name="robots" content="ALL" />

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/colorbox.css" type="text/css" media="screen" />
    
		<style type="text/css" title="currentStyle">
			@import "adm/css/demo_page.css";
			@import "adm/css/demo_table.css";
                        @import "adm/css/TableTools.css";
		</style>
		<script type="text/javascript" src="js/jquery.js"></script>    
                
                                       
                <script type="text/javascript" language="javascript" src="adm/js/jquery.dataTables.js"></script>
                
                <script type="text/javascript" src="js/easypaginate.js"></script>        
                <script type="text/javascript" src="js/jquery.colorbox.js"></script>  
                <script type="text/javascript" src="js/js.js"></script>  
        
        <script>
    $(window).load(function() {
        $(".ajax").colorbox();      
    });        
      jQuery(function($){ 
  $('ul#items').easyPaginate();
  });
        </script>
    </head>
    <body>
      <div id="tudo">  
        <div id="pagina">
            <div id="cabecalho"><img src="imagens/cab2.jpg"> </div>
            <div id="pesquisa">
                    <div class="width_260 margin_left_20 margin_top_80">
                    <div class="width_260 padding_5">
                        
                        <form name="form_busca" method="POST" action="busca.php">
                            <ul>
                                <li>
                                    <label class="width_80" >Categoria</label>
                                    <select name="categoria">
                                    <?php
                                    foreach ($listaCaregoria as $value){
                                        echo "<option value='".$value->getId()."'>".substr($value->getDescricao(),0,17)."</option>";
                                    }
                                    ?>
                                    </select>                                    
                                </li>
                                <li>                                    
                                    <label class="width_80">Interesse</label>
                                    <input type="radio" name="interesse" value="1" onclick="busca_interesse(this)" checked>Venda<input type="radio" onclick="busca_interesse(this)" name="interesse" value="0">Locação
                                </li>
                                <li>
                                    <label class="width_80">Região</label>
                                        <select name="cidade">
                                          <?php
                                          foreach ($listaCidades as $value){
                                              echo "<option value='".$value->getId()."'>". substr($value->getDescricao(),0,17)."</option>";
                                          }
                                          ?>
                                          </select>                                      
                                </li>
                                <br><br>
                                
                                <li>
                                    <input type="submit" name="enviar" value="Buscar">
                                </li>
                            </ul>

                           

                        </form>
                        
                    </div>                        
                    </div>
                
            </div>
            <div id="conteudo">
                <div id="menu">
                    <div id="lista_menu" class="float_lef">
                        <ul>
                            <li><a href="index.php">Página Inicial</a></li>
                            <li><a href="empresa.php">Empresa</a></li>
                            <li><a href="busca.php?tipo=0">Consulta - Locação</a></li>
                            <li><a href="busca.php?tipo=1">Consulta - Venda</a></li>
                            <li><a href="documentos.php">Documentos - Venda</a></li>
                            <li><a href="localizacao.php">Localização</a></li>
                            <li><a href="contato.php">Fale Conosco</a></li>


                        </ul>                        
                    </div>




                </div>
                <div id="destaque">                
