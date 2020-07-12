<?php
session_start();
include("../classes.php");
new Conexao();

if(isset($_GET['buscaCidade'])){
    buscarCidade($_GET['uf']);
}
if(isset($_GET['buscaBairro'])){
    buscarBairro($_GET['cidade']);
}
if(isset($_GET['buscaCidadeCobranca'])){
    buscarCidadeCobranca($_GET['uf']);
}
if(isset($_GET['buscaBairroCobranca'])){
    buscarBairroCobranca($_GET['cidade']);
}

if(isset($_GET['retornaSessao'])){
    if(isset($_SESSION['valortotal'])){
    echo number_format($_SESSION['valortotal'],2,',','.');
    }else{
        echo "0,00";
    }
}
if(isset($_GET['descontoDevolucao'])){
    if(isset($_SESSION['valortotal'])){  
        
         echo number_format($_SESSION['valortotal'] - str_replace(',','.',str_replace('.','',str_replace('R$','',$_GET['descontoDevolucao']))) ,2,',','.');
    }else{
        echo "0,00";
    }
}

if(isset($_GET['somaDesconto'])){
    if(isset($_SESSION['lista'])){
        $_SESSION['lista'][$_GET['pos']]['desconto'] = $_GET['valor'];
        //$_SESSION['lista'][$_GET['pos']]['total'] = ($_SESSION['lista'][$_GET['pos']]['total'] +$_SESSION['lista'][$_GET['pos']]['acrescimo'] - $_GET['valor']);
    }
    mostrarItens("");
}

if(isset($_GET['somaAcrescimo'])){
    if(isset($_SESSION['lista'])){               
        $_SESSION['lista'][$_GET['pos']]['acrescimo'] = $_GET['valor'];
      //  $_SESSION['lista'][$_GET['pos']]['total'] = ($_SESSION['lista'][$_GET['pos']]['total'] - $_SESSION['lista'][$_GET['pos']]['desconto'] + $_GET['valor']);
    }
    mostrarItens("");
}
if(isset($_GET['permissao'])){
    permissao($_GET['acao'],$_GET['valor'],$_GET['aplicacao'],$_GET['grupo']);
}

if(isset($_GET['adicionaItem'])){
    adicionaItem($_GET['estoque'], $_GET['plano'],$_GET['qt'],$_GET['diarias'],$_GET['data_entrega'],$_GET['previsao_entrega']);
}

if(isset($_GET['adicionaItem2'])){
    adicionaItem2($_GET['estoque'], $_GET['plano'],$_GET['qt'],$_GET['diarias']);
}

function adicionaItem2($est,$pla,$qt,$dia){
    echo "2";
}

if(isset($_GET['associarProduto'])){
    associarProduto($_GET['estoque'], $_GET['produto'],$_GET['qt']);
}
if(isset($_GET['removerAssociacao'])){
    removerAssociacao($_GET['estoque'], $_GET['produto']);
}

if(isset($_GET['alterarValor'])){
    alterarValor($_GET['valor'], $_GET['estoque'],$_GET['plano']);
}
if(isset($_GET['alteraQtProduto'])){
    alterarQtProduto($_GET['produto'], $_GET['estoque'],$_GET['qt']);
}

if(isset($_GET['removerItem'])){
    $pos = $_GET['produto'];
    unset($_SESSION['lista'][$pos]);
    sort($_SESSION['lista']);
    mostrarItens("");
}

if(isset($_GET['recalcular'])){
    $data_entregue = $_GET['data'];
    $hora_entregue = $_GET['hora'];
    $locacao = new Locacao();
    $locacao->selecionarPorId($_GET['locacao']);
    echo json_encode(valorDevolucao($locacao,$data_entregue,$hora_entregue));
}



function associarProduto($est,$prod,$qt){
$item = new Item_estoque();
$item->inserir($est,$prod,$qt);
mostraAssociacao($est);
}

function removerAssociacao($est,$prod){
$item = new Item_estoque();
$item->excluir($est,$prod);
mostraAssociacao($est);
}

function mostraAssociacao($est){
    $estoque = new Estoque();
    $estoque->selecionarPorId($est);
    $produto = new Produto();
    $lista = $produto->selecionarProdutosNaoAssociados();
    if(count($lista) > 0){
    echo "
            <div class='campo3 float_left' >
                <label>*Qtd.</label>
                <input type='text' name='qt' id='qt' value='1' size='1'>
            </div>
            <div class='campo3 float_left margin_left'>
             
             <label>*PRODUTO | Informe o nome do produto</label>
                <select name='produto' id='produto'>";
            
                    foreach ($lista as $value){
                    echo utf8_encode("<option value='".$value->getId()."'>".$value->getDescricao()." - ".$value->getNumero_serie ()."</option>");
                    }
            
            echo "
                </select>
            </div>
            <div class='campo'>
                <label>&nbsp;</label>
                <a href=\"javascript:associarProduto(document.getElementById('produto').value,document.getElementById('qt').value,'".$estoque->getId()."')\"><img src='../imagens/add.png'></a>
            </div>";

}
echo utf8_encode("
                <table width='100%'>
                    <tr bgcolor='#DFDFDF'>

                        <td width='5%'>Qtd.</td>
                        <td width='30%'>Descrição</td>
                        <td width='20%'>Série</td>
                        <td width='10%'>Modelo</td>
                        <td width='10%'>Marca</td>
                        <td width='25%'>&nbsp;</td>

                    </tr>");

                    $i=0;
                    foreach ($estoque->getItens() as $value){
                        echo utf8_encode(    "
                    <tr>

                        <td><input type='text' value='".$value->getQt()."' size='1' onblur=\"alterarQtProdutos(this,'".$value->getProduto()->getId()."','".$estoque->getId()."')\" ></td>
                        <td>".$value->getProduto()->getDescricao()."</td>
                        <td>".$value->getProduto()->getNumero_serie()."</td>
                        <td>".$value->getProduto()->getModelo()."</td>
                        <td>".$value->getProduto()->getMarca()."</td>
                        <td><a href=\"javascript:removerAssociacao('".$value->getProduto()->getId()."','".$estoque->getId()."')\" ><img src='../imagens/remove.png'></td>
                    </tr>   ");
                    }

            echo "</table>";

}

function alterarQtProduto($prod,$est,$qt){
$produto = new Produto();
$produto->selecionarPorId($prod);
$produto->adicionarEstoque($qt);
mostraAssociacao($est);

}
function alterarValor($valor,$estoque,$plano_id){
    $plano = new PlanoValor();
    $plano->getPlano()->setId($plano_id);
    $plano->getEstoque()->setId($estoque);
    $valor = str_replace(',','.',str_replace('.','',str_replace('R$','',$valor)));
    if($plano->selecionarPorPE($plano_id,$estoque)){
        $plano->setValor($valor);
        $plano->atualizar();
    }else{
        $plano->setValor($valor);
        $plano->inserir();
    }

}
function mostrarItens($mensagem){
    if(!empty($mensagem)){
        echo utf8_encode("<div class='erro_locacao'>".$mensagem."</div>");
    }
                echo utf8_encode("
                <table id='pedido'>
                <tr class='titulo_pedido'>
                    <td width='3%' height='25px'>Del.</td>
                    <td width='3%' height='25px'>Qtd.</td>
                    <td width='44%'>Produto</td>
                    <td width='15%'>Valor Unit.</td>
                    <td width='10%'>Acres.</td>
                    <td width='10%'>Desc.</td> 
                    <td width='15%'>Total</td>
                    
                </tr>

                ");    
    if(isset($_SESSION['lista'])){
            $count = count($_SESSION['lista']);
            if($count >0){

            $_SESSION['valortotal'] = 0;
            $cor = "class=linha_cor";
            for($x=0;$x<$count;$x++){
                if($cor == "class=linha_cor"){
                    $cor = "class=linha_sem_cor";
                }else{
                    $cor = "class=linha_cor";
                }
                $_SESSION['valortotal'] = $_SESSION['valortotal'] + ($_SESSION['lista'][$x]['total'] - $_SESSION['lista'][$x]['desconto'] + $_SESSION['lista'][$x]['acrescimo'] );
                echo utf8_encode("<tr $cor>
                    <td><a href=\"javascript:removerItem('".$x."')\"><img src='../imagens/remove.png'></a></td>
                    <td>".$_SESSION['lista'][$x]['qt']."</td>
                    <td>".$_SESSION['lista'][$x]['estoque']."</td>                
                    <td>R$ ".number_format($_SESSION['lista'][$x]['valor'],2,',','.')."</td>
                    <td><input type='text' name='acrescimo' size='3' value='".$_SESSION['lista'][$x]['acrescimo']."' onblur='somaAcrescimo(this,".$x.")' class='moeda'></td> 
                    <td><input type='text' name='desconto' size='3' value='".$_SESSION['lista'][$x]['desconto']."' onblur='somaDesconto(this,".$x.")'  class='moeda'></td>                         
                    <td>R$ ".number_format($_SESSION['lista'][$x]['total'] - $_SESSION['lista'][$x]['desconto'] + $_SESSION['lista'][$x]['acrescimo'] ,2,',','.')."</td>
                    
                </tr>");
                }
                
            }else{
               unset($_SESSION['lista']);
               unset($_SESSION['valortotal']);
            }
            echo " </table>";
    }
}
function adicionaItem($est,$id_plano,$qt,$diarias,$data_entregue,$previsao_entrega){
    $estoque = new Estoque();
    $estoque->selecionarPorId($est);
    $plano = new Plano();
    $planoValor = new PlanoValor();
    //$plano->selecionarPorHoras('24');
    //$valor_dia   = $planoValor->selecionarPorPlanoEstoque($plano->getId(), $estoque->getId());
    $plano->selecionarPorId($id_plano);
    $valor_plano = $planoValor->selecionarPorPlanoEstoque($id_plano, $estoque->getId());
    $valor_proporcional = $valor_plano / ($plano->getQt_horas()/24);
    $horas_diarias = $diarias*24;
    if(($horas_diarias) < $plano->getQt_horas()){
        //echo utf8_encode("");
        mostrarItens("PLANO INCOMPATÍVEL COM A QUANTIDADE DE DIÁRIAS.");
    }else{
        $qt_plano = intval($horas_diarias/$plano->getQt_horas());
        $qt_dia = ($horas_diarias % $plano->getQt_horas())/24;




        $qtEstoque = $estoque->qtDisponiveis();
        $entrou = false;
        if(isset($_SESSION['lista'])){
           $count = count($_SESSION['lista']);
           for($x=0;$x<$count;$x++){
                if($_SESSION['lista'][$x]['id_estoque'] == $estoque->getId()){
                    $entrou = true;
                    if(($estoque->verificaAgendamento($data_entregue, $previsao_entrega) + $qt + $_SESSION['lista'][$x]['qt']) <= $qtEstoque){
                        if(($_SESSION['lista'][$x]['qt'] + $qt) <= $qtEstoque){
                            $_SESSION['lista'][$x]['qt'] = $_SESSION['lista'][$x]['qt'] + $qt;
                            $_SESSION['lista'][$x]['total'] =  $_SESSION['lista'][$x]['valor'] * $_SESSION['lista'][$x]['qt'];
                            $_SESSION['valortotal'] = $_SESSION['valortotal'] + ($qt * $_SESSION['lista'][$x]['valor']) ;
                            mostrarItens("");
                        }else{
                            //echo "Estoque ultrapassado";
                            mostrarItens("ESTOQUE INSUFICIENTE.");
                        }
                    }else{
                        mostrarItens("ESTOQUE INSUFICIENTE NESSE PERÍODO.");
                    }
                }
           }
        }
        if($entrou == false){
            if($qtEstoque >= $qt){//VERIFICA SE A QUANTIDADE DE ESTOQUE É MAIOR
                if(($estoque->verificaAgendamento($data_entregue, $previsao_entrega) + $qt) <= $qtEstoque){
                    if(isset($_SESSION['lista'])){
                        $count = count($_SESSION['lista']);            
                        $_SESSION['lista'][$count]['estoque']     = $estoque->getDescricao();
                        $_SESSION['lista'][$count]['id_estoque']  = $estoque->getId();
                        $_SESSION['lista'][$count]['qt']          = $qt;
                        $_SESSION['lista'][$count]['valor']       = (($valor_plano*$qt_plano)+($valor_proporcional*$qt_dia));
                        $_SESSION['lista'][$count]['total']       = ((($valor_plano*$qt_plano)+($valor_proporcional*$qt_dia))*$qt);
                        $_SESSION['lista'][$count]['plano']       =  $plano->getDescricao();
                        $_SESSION['lista'][$count]['diaria']      = $diarias;
                        $_SESSION['lista'][$count]['desconto']    = 0;
                        $_SESSION['lista'][$count]['acrescimo']   = 0;
                        $_SESSION['valortotal'] = $_SESSION['valortotal'] + $_SESSION['lista'][$count]['total'] ;
                        mostrarItens("");
                    }else{
                        $_SESSION['lista']['0']['estoque']      =  $estoque->getDescricao();
                        $_SESSION['lista']['0']['id_estoque']   =  $estoque->getId();
                        $_SESSION['lista']['0']['qt']           =  $qt;
                        $_SESSION['lista']['0']['plano']        =  $plano->getDescricao();
                        $_SESSION['lista']['0']['diaria']       = $diarias;
                        $_SESSION['lista']['0']['valor']        =  (($valor_plano*$qt_plano)+($valor_proporcional*$qt_dia));
                        $_SESSION['lista']['0']['total']        =  ((($valor_plano*$qt_plano)+($valor_proporcional*$qt_dia))*$qt);
                        $_SESSION['lista']['0']['desconto']     = 0;
                        $_SESSION['lista']['0']['acrescimo']    = 0;
                        $_SESSION['valortotal'] = $_SESSION['lista']['0']['total'];
                        mostrarItens("");
                    }
                }else{
                    mostrarItens("ESTOQUE INSUFICIENTE NESSE PERÍODO.");
                }
            }else{
                //echo "VALOR MAIOR QUE A QUANTIDADE EM ESTOQUE";
                 mostrarItens("ESTOQUE INSUFICIENTE .");
            }
        }
    }
}
function permissao($acao,$valor,$aplicacao,$grupo){
    $seguranca = new Seguranca();
    $sql = "SELECT * FROM aplicacoes_grupos WHERE id_grupo = ".$seguranca->decrypt($grupo)." AND  id_aplicacao = ".$seguranca->decrypt($aplicacao);
    $qt = mysql_num_rows(mysql_query($sql));
    if($qt >0){
        switch ($acao){
            case "c": $sql = "UPDATE  aplicacoes_grupos SET  `insert` =  '$valor' WHERE  `id_grupo` =".$seguranca->decrypt($grupo)." AND  `id_aplicacao` =".$seguranca->decrypt($aplicacao) ;break;
            case "r": $sql = "UPDATE  aplicacoes_grupos SET  `select` =  '$valor' WHERE  `id_grupo` =".$seguranca->decrypt($grupo)." AND  `id_aplicacao` =".$seguranca->decrypt($aplicacao) ;break;
            case "u": $sql = "UPDATE  aplicacoes_grupos SET  `update` =  '$valor' WHERE  `id_grupo` =".$seguranca->decrypt($grupo)." AND  `id_aplicacao` =".$seguranca->decrypt($aplicacao) ;break;
            case "d": $sql = "UPDATE  aplicacoes_grupos SET  `delete` =  '$valor' WHERE  `id_grupo` =".$seguranca->decrypt($grupo)." AND  `id_aplicacao` =".$seguranca->decrypt($aplicacao) ;break;
        }
    }else{
        switch ($acao){
            case "c": $sql = "INSERT INTO `aplicacoes_grupos` (`id_grupo`, `id_aplicacao`, `select`, `insert`, `update`, `delete`) VALUES ('".$seguranca->decrypt($grupo)."','".$seguranca->decrypt($aplicacao)."','0','1','0','0')" ;break;
            case "r": $sql = "INSERT INTO `aplicacoes_grupos` (`id_grupo`, `id_aplicacao`, `select`, `insert`, `update`, `delete`) VALUES ('".$seguranca->decrypt($grupo)."','".$seguranca->decrypt($aplicacao)."','1','0','0','0')" ;break;
            case "u": $sql = "INSERT INTO `aplicacoes_grupos` (`id_grupo`, `id_aplicacao`, `select`, `insert`, `update`, `delete`) VALUES ('".$seguranca->decrypt($grupo)."','".$seguranca->decrypt($aplicacao)."','0','0','1','0')" ;break;
            case "d": $sql = "INSERT INTO `aplicacoes_grupos` (`id_grupo`, `id_aplicacao`, `select`, `insert`, `update`, `delete`) VALUES ('".$seguranca->decrypt($grupo)."','".$seguranca->decrypt($aplicacao)."','0','0','0','1')" ;break;
        }
    }
    mysql_query($sql);
}

function buscarCidade($id){
$cidade = new Cidade();
$lista = $cidade->selecionarPorUf($id);
 echo "<select name='cidade'>";
 echo "<option value='0'>ESCOLHA A CIDADE</option>";
foreach ($lista as $value){
    echo utf8_encode("<option value=".$value->getId().">".$value->getDescricao()."</option>");
}
echo "</select>";
}
function buscarCidadeCobranca($id){
$cidade = new Cidade();
$lista = $cidade->selecionarPorUf($id);
 echo "<select name='cidade_cobranca' >";
 echo "<option value='0'>ESCOLHA A CIDADE</option>";
foreach ($lista as $value){
    echo utf8_encode("<option value=".$value->getId().">".$value->getDescricao()."</option>");
}
echo "</select>";
}

function buscarBairro($id){
$bairro = new Bairro();
$lista = $bairro->selecionarPorCidade($id);
 echo "<select name=bairro>";
foreach ($lista as $value){
    echo utf8_encode("<option value=".$value->getId().">".$value->getDescricao()."</option>");
}
echo "</select>";
}
function buscarBairroCobranca($id){
$bairro = new Bairro();
$lista = $bairro->selecionarPorCidade($id);
 echo "<select name=bairro_cobranca >";
foreach ($lista as $value){
    echo utf8_encode("<option value=".$value->getId().">".$value->getDescricao()."</option>");
}
echo "</select>";
}



function valorDevolucao($locacao,$data,$hora){
$objData = new Data();
$lista = $locacao->selecionarPorLocacaoLocados();
if($locacao->getStatus()==2){    
   //$dias = (int)floor($locacao->geraTimestamp(date("d/m/Y")) - $locacao->geraTimestamp(getData_devolucao()))/(60*60*24);#número de dias que o cliente ficou com os equipamentos
    $dif = $objData->difDataHora($locacao->getData_devolucao()." ".$locacao->getHora_devolucao(), date($data." ".$hora));   
}else{
   //$dias = (int)floor($locacao->geraTimestamp(date("d/m/Y")) - $locacao->geraTimestamp($locacao->getPrevisao_devolucao()))/(60*60*24);#número de dias que o cliente ficou com os equipamentos 
    $dif = $objData->difDataHora($locacao->getPrevisao_devolucao()." ".$locacao->getHora_entrega(), date($data." ".$hora));   
}
$horas = $dif % 24;
$dias =floor($dif / 24);
if($dias < 0){
    $dias = 0;
}

if($horas < 0){
    $horas = 0;
}

$diasContratados = (int)floor($locacao->geraTimestamp($locacao->getPrevisao_devolucao()) - $locacao->geraTimestamp($locacao->getData_entrega()))/(60*60*24);

$locacao->setData_devolucao($data);
$locacao->setHora_devolucao($hora);

//if($dias > $diasContratados){
//    $diferenca = $dias - $diasContratados;
    $total = 0;
    $planoValor = new PlanoValor();
    foreach ($lista as $value){
        $auxDias = $dias;
        if($value->getEstoque()->getCarencia()< $horas){
         $auxDias = $dias +1;
        }
        $valor_plano = $planoValor->selecionarPorPlanoEstoque($locacao->getPlano()->getId(),$value->getEstoque()->getId());
        $total = $total + ($valor_plano * $auxDias);
    }
//}else{
//    $total = 0;
//}

$_SESSION['valortotal'] = $total; 
$response['total'] = number_format($total,2,',','.'); 
$response['dias'] = $dias; 
$response['horas'] = $horas; 
return $response;
//echo number_format($_SESSION['valortotal']);
}
?>
