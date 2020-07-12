<?php
include("superior.php");
$obj = new Imagem();
include("superior_body.php");
    if(isset($_GET['excluir']) and isset($_GET['id']) ){
                unlink('../img_pub'.$obj->getImagem());
                unlink('../img_pub'.$obj->getImagem_thub());
    }
$lista = $obj->selecionarTodos($_GET['id']);

?>

    <div class="col8 inf_gerenciar margin_top20 paddingH10 paddingV10">
        Gerenciar Cadastro de Fotos
    </div>
    <div class="col8 bg_quadro paddingH10 paddingV10" >
        <div class="scol8 paddingH10 paddingV10" id="pesquisar">
            <a class="ajax" href="forms/galeria.php?id=<?php echo $_GET['id'];?>"><img src="imagens/bt_novo.jpg"></a><br>
        </div>
        <br>
        <div  id="grid_view">


<table align="center" class="display" id="tabela" width="100%">
     <thead>
    <tr class="table_resultados_topo">

        <th>Foto</th>
        <th width="50%">Principal</th>
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
         
         <td><img width="100px" src="../img_pub/<?php echo $value->getImagem_thub() ?>"></a></td>
         <td><?php if($value->getPadrao()=="1") echo "PRINCIPAL"?></td>
         <td><a  href="forms/imagem.php?id=<?php echo $_GET['id'];?>&foto=<?php echo $value->getId()?>"><img src="imagens/editar.png" class="image"  border="0" title="Editar"></a></td>
         <td><a  href="javascript:excluirRegistro('excluir_foto.php?excluir=true&id=<?php echo $_GET['id'];?>&foto=<?php echo $value->getId();?>')"><img src="imagens/excluir.png" class="image"  border="0" title="Excluir"></a></td>
         
	</tr>
    <?php
       }
    ?>
      </tbody>
</table>

        </div>
    </div>
    <div class="col8" >
        <div class="float_right margin_right_10"><a href="gerenciarImoveis.php"><img src="imagens/voltar.jpg"></a></div>
    </div>

<?php
include("inferior.php");
?>
