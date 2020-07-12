<?php
include("superior.php");
$obj = new Usuario();
include("superior_body.php");
$lista = $obj->selecionarTodos();

?>

    <div class="col8 inf_gerenciar margin_top20 paddingH10 paddingV10">
        Gerenciar Cadastro de Usuário
    </div>
    <div class="col8 bg_quadro paddingH10 paddingV10" >
        <div class="scol8 paddingH10 paddingV10" id="pesquisar">
            <a class="ajax" href="forms/usuario.php"><img src="imagens/bt_novo.jpg"></a><br>
        </div>
        <br>
        <div  id="grid_view">


<table align="center" class="display" id="tabela" width="100%">
     <thead>
    <tr class="table_resultados_topo">
        <th>Nome</th>
        <th>Usuário</th>
        <th>Status</th>
        <th>Grupo</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
     </thead>
      <tbody>
	<?php

	foreach ($lista as $value )
	{
	?>
     <tr class="table_resultados">
         <td><?php echo $value->getNome();?></td>
         <td><?php echo $value->getUsuario();?></td>
         <td><?php echo $value->getStatus();?></td>
         <td><?php echo $value->getGrupo()->getDescricao();?></td>
         <td><a  href="forms/usuario.php?id=<?php echo $value->getId();?>"><img src="imagens/editar.png" class="image" border="0" title="Alterar"></a></td>
         <td><a  href="javascript:excluirRegistro('gerenciarUsuarios.php?excluir=true&id=<?php echo $value->getId();?>')"><img src="imagens/excluir.png" class="image" border="0" title="Excluir"></a></td>
	</tr>
    <?php
       }
    ?>
      </tbody>
</table>

        </div>
    </div>
    <div class="col8" >
        <div class="float_right margin_right_10"><a href="index.php"><img src="imagens/voltar.jpg" Voltar</a></div>
    </div>

<?php
include("inferior.php");
?>
