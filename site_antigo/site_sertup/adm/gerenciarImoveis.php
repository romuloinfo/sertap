<?php
include("superior.php");
$obj = new Imovel();
include("superior_body.php");
$lista = $obj->selecionarTodos();

?>

    <div class="col8 inf_gerenciar margin_top20 paddingH10 paddingV10">
        Gerenciar Cadastro de Imóveis
    </div>
    <div class="col8 bg_quadro paddingH10 paddingV10" >
        <div class="scol8 paddingH10 paddingV10" id="pesquisar">
            <a class="ajax" href="forms/imovel.php"><img src="imagens/bt_novo.jpg"></a><br>
        </div>
        <br>
        <div  id="grid_view">


<table align="center" class="display" id="imovel" width="100%">
     <thead>
    <tr class="table_resultados_topo">
        <th>Código</th>
        <th>Descrição</th>
        <th>Status Site</th>
        <th>Contrato</th>
        <th>Fotos</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
     </thead>
      <tbody>
      </tbody>
      <tfoot>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>          
      </tfoot>      
</table>

        </div>
    </div>
    <div class="col8" >
        <div class="float_right margin_right_10"><a href="index.php"><img src="imagens/voltar.jpg"></a></div>
    </div>

<?php
include("inferior.php");
?>
