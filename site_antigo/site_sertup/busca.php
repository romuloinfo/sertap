<?php
include 'superior.php';
if(isset($_POST['enviar'])){    
  $lista = $imovel->selecionarBusca($_POST['interesse'],$_POST['categoria'],$_POST['cidade']); 
  
  if($_POST['interesse'] == 2){
    $titulo = "IMÓVEIS PARA LOCAÇÃO";
  }else{
      $titulo = "IMÓVEIS PARA VENDA";
  }
}else{
  $titulo = "IMÓVEIS PARA LOCAÇÃO/VENDA";  
  $lista = $imovel->selecionarTodos();  
}


?>
<br>
<h1><?php echo $titulo ?></h1>
<br>

<table align="center" class="display" id="tabela" width="100%">
     <thead>
    <tr class="table_resultados_topo">
        <th>Foto</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Cidade</th>
        <th>Valor</th>
        <th>Tipo</th>
        <th>Status</th>

    </tr>
     </thead>
      <tbody>
	<?php

	foreach ($lista as $value )
	{
	?>
     <tr class="table_resultados">
         <td><a target="blank" href="detalhes.php?id=<?php echo $value->getId()?>"><img width="100px" src="img_pub/<?php echo $value->getFoto()->getImagem_thub()?>"</a></td>
        <td> <?php echo $value->getDescricao();?></td>
        <td> <?php echo $value->getCategoria()->getDescricao();?></td>
        <td> <?php echo $value->getCidade()->getDescricao();?></td>
        <td>R$ <?php echo number_format($value->getValor(),2,',','.');?></td>
         <td><?php echo $value->mostraTipo();?></td>
         <td><?php echo $value->mostraAcao();?></td>
	</tr>

    <?php
       }
    ?>
      </tbody>
      <tfoot>
    <tr >
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

    </tr>          
      </tfoot>
</table>

<?php

include 'inferior.php';
?>