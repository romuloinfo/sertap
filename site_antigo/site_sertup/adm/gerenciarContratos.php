<?php
include("superior.php");
$obj = new Contrato();
include("superior_body.php");

?>

    <div class="col8 inf_gerenciar margin_top20 paddingH10 paddingV10">
        Gerenciar Cadastro de Categorias
    </div>
    <div class="col8 bg_quadro paddingH10 paddingV10" >
        <div class="scol8 paddingH10 paddingV10" id="pesquisar">
            <a class="ajax" href="forms/contrato.php"><img src="imagens/bt_novo.jpg"></a><br>
        </div>
        <br>
        <div  id="grid_view">


<table align="center" class="display" id="contrato" width="100%">
     <thead>
    <tr class="table_resultados_topo">
        <th>Contrato</th>
        <th>Cliente</th>
        <th>Descrição Imóvel</th>
        <th>Data Início</th>
        <th>Data Fim</th>
        <th>Status</th>
        <th>Ação</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
     </thead>
      <tbody>
      </tbody>
      <tfoot>
          
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
