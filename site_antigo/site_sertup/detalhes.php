<?php
include 'superior.php';

$imovel = new Imovel();
$imovel->selecionarPorId($_GET['id']);




?>

<div id="descricao_imovel">
<div id="area_foto">
    <img src="img_pub/<?php echo $imovel->getFoto()->getImagem();?>" width="480"/>
</div>    


<div id="area_detalhe">
    <p><?php echo  $imovel->getTitulo() . " - ". $imovel->getPre_descricao();?></p>
    <div class="tipo"><h1><?php echo $imovel->getCategoria()->getDescricao(); ?></h1></div>
    
    <div id="destaque_valor"><h5  class="margin_left_20 font_size_14"> <?php if($imovel->getTipo()==0) echo "Valor de Locação"; else echo "Valor de Compra";?> </h5><h5 class="margin_left_20 font_size_36">R$ <?php echo number_format($imovel->getValor(),2,',','.') ;?></h5></div>
    <br>
    <div class="tipo"><h1>DESCRIÇÃO COMPLETA</h1></div>
    
    
    <?php
    echo nl2br($imovel->getDescricao());
    ?>
    <br><br>
    <div class="tipo"><h1>LIGUE:</h1></div>
    <div class="telefone"><h5 class="tel"><div class="telefone"><h5 class="tel">Tel.: (38) 9 9149-1964 (38) 9 9154-0000</h5></div></div>
    
    
    
</div>
   
    <br>
<?php
$imagens = new Imagem();
$lista = $imagens->selecionarTodos($_GET['id']);
       echo "<ul id='items'>";
        foreach ($lista as $value){
            echo "<li><a href='img_pub/".$value->getImagem()."' class='ajax'><img src='img_pub/".$value->getImagem_thub()."' width='160px'/></a> </li>";
        }
        echo "</ul>";

?>
</div>

<?php
include 'inferior.php';
?>
