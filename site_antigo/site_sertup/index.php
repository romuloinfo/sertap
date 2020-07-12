<?php
include 'superior.php';


$listaAluguel = $imovel->selecionarPorTipoIndex(0);
$listaVenda = $imovel->selecionarPorTipoIndex(1);


?>

                    <div class="titulo_destaque">Imóveis em destaque à &nbsp;</div><div class="titulo_destaque_color">Venda</div>
                    <div id="destaque_venda">
                        
                        <?php
                        foreach ($listaVenda as $venda){
                        ?>    
                        <div class="imovel">
                            <div>
                                <a href="detalhes.php?id=<?php echo $venda->getId()?>" title="<?php echo $venda->getTitulo()?>"><img src="img_pub/<?php echo $venda->getFoto()->getImagem_thub()?>"> </a>
                            </div>
                            <div>
                                <p class="titulo"><?php echo $venda->getTitulo()?></p>
                                <p class="descricao"><b><?php echo $venda->mostraAcao()?></b></p>
                                <p class="valor"><?php echo number_format($venda->getValor(),2,',','.')?></p>
                                <p class="detalhes"><a href="detalhes.php?id=<?php echo $venda->getId()?>">+ detalhes</a></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>                        
                    </div>
                    <div class="todos_imoveis"><a href="#">Veja todos os imóveis</a></div>
                    
                    <div class="titulo_destaque">Imóveis em destaque para &nbsp;</div><div class="titulo_destaque_color">Locação</div>



                    <div id="destaque_venda">
                        <?php
                        foreach ($listaAluguel as $aluguel){
                        ?>                         
                        <div class="imovel">
                            <div>
                                <a href="detalhes.php?id=<?php echo $aluguel->getId()?>" title="<?php echo $aluguel->getTitulo()?>"><img src="img_pub/<?php echo $aluguel->getFoto()->getImagem_thub()?>"> </a>
                            </div>
                            <div>
                                <p class="titulo"><?php echo $aluguel->getTitulo()?></p>

                                <p class="descricao"><b><?php echo $aluguel->mostraAcao()?></b></p>
                                <p class="valor"><?php echo number_format($aluguel->getValor(),2,',','.')?></p>
                                <p class="detalhes"><a href="detalhes.php?id=<?php echo $aluguel->getId()?>">+ detalhes</a></p>
                            </div>
                        </div>                        

                        <?php
                        }
                        ?>                        
                        
                    </div>                    
                    <div class="todos_imoveis"><a href="#">Veja todos os imóveis</a></div>


<?php
include 'inferior.php';
?>