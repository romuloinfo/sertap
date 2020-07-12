<?php
include("superior.php");
$obj = new Aplicacao();
include("superior_body.php");
$lista = $obj->selecionarTodos();
$grupo = new Grupo();
if(isset($_GET['id'])){
$grupo->selecionarPorId($_GET['id']);
?>

    <div class="col8 inf_gerenciar margin_top20 paddingH10 paddingV10">
        Grupo : <?php echo $grupo->getDescricao(); ?>
    </div>
    <div class="col8 bg_quadro paddingH10 paddingV10" >
        
        <br>
        <div  id="grid_view">


<table align="center" class="display" id="tabela" width="100%">
     <thead>
    <tr class="table_resultados_topo">
        <th>Descrição</th>
        <th>Visualizar</th>
        <th>Adicionar</th>
        <th>Editar</th>
        <th>Deletar</th>

    </tr>
     </thead>
      <tbody>
	<?php

	foreach ($lista as $value )
	{
	?>
     <tr class="table_resultados">
        <td><?php echo $value->getDescricao();?></td>
        <th><input type="checkbox" name="visualizar"  <?php echo $value->verificaPermissao($grupo->getId(),"r");?>    onclick="adicionarPermissao(this,'r','<?php echo $value->getid()?>','<?php echo $grupo->getid()?>')"></th>
        <th><input type="checkbox" name="adicionar"   <?php echo $value->verificaPermissao($grupo->getId(),"c");?> onclick="adicionarPermissao(this,'c','<?php echo $value->getid()?>','<?php echo $grupo->getid()?>')"></th>
        <th><input type="checkbox" name="editar"      <?php echo $value->verificaPermissao($grupo->getId(),"u");?> onclick="adicionarPermissao(this,'u','<?php echo $value->getid()?>','<?php echo $grupo->getid()?>')"></th>
        <th><input type="checkbox" name="deletar"     <?php echo $value->verificaPermissao($grupo->getId(),"d");?> onclick="adicionarPermissao(this,'d','<?php echo $value->getid()?>','<?php echo $grupo->getid()?>')"></th>
	</tr>

    <?php
       }
    ?>
      </tbody>
</table>

        </div>
    </div>
    <div class="col8" >
        <div class="float_right margin_right_10"><a href="index.php"><img src="imagens/voltar.jpg"></a></div>
    </div>
      <div id="txtHint">
      </div>
<?php
}
include("inferior.php");
?>
