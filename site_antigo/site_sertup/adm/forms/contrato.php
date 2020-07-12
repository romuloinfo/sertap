<?php
include 'superior.php';
$contrato = new Contrato();

if(isset($_POST['enviar'])){
    $contrato->getForm($_POST);
    if ($contrato->salvar()== true){
        echo "<script>alert('CADASTRO REALIZADO COM SUCESSO.')</script>";
        echo "<script>window.location='../gerenciarContratos.php'</script>";
    }else{
        echo "<script>alert('NÃO FOI POSSÍVEL REALIZAR CADASTRO, VERIFIQUE SE TODOS OS DADOS ESTÃO CORRETOS.')</script>";
        echo "<script>window.location='../gerenciarContratos.php'</script>";
    }
}
if(isset($_GET['id'])){    
    $contrato->selecionarPorId($_GET['id']);
}
?>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarContratos.php"><img src="../imagens/voltar.jpg"></a></div>
    </div>
    <h2>Inserir/Alterar Cadastro de Categoria</h2>
    Campos com <em>*</em> são Obrigatórios<br><br>
<form name='Form' id="formID"  method='POST' action='contrato.php'>
    <input type='hidden' name='id' value='<?php echo $contrato->getId()?>'>
    <input type='hidden' name='enviar' value='true'>
    <fieldset>
        <legend>Descrição do Contrato</legend>
            <div class="campo">
                <label>*Nº Contrato:</label>
                <input type='text' name='id_contrato' class="validate[required]" value="<?php echo $contrato->getContrato()?>" size="20" >
            </div>        
            <div class="campo">
                <label>*Cliente:</label>
                <input type='text' name='cliente'  class="validate[required]" id="posts_cliente" value="<?php echo $contrato->getCliente()->getNome()?>" size="70" >
            </div>
                <p>
                <input type='hidden' name='id_cliente' class="validate[required]" value="<?php echo $contrato->getCliente()->getId()?>" id="posts_cliente_id">
                </p>        
            <div class="campo">
                <label>*Imóvel:</label>
                <input type='text' name='imovel' id="posts_imovel" class="validate[required]"  value="<?php echo $contrato->getImovel()->getDescricao()?>" size="70" >
            </div> 
                <p>
                <input type='hidden' name='id_imovel' class="validate[required]" value="<?php echo $contrato->getImovel()->getId()?>" id="posts_imovel_id">
                </p>                 
            <div class="campo">
                <label>*Data Início:</label>
                <input type='text' name='data_inicio' class="validate[required]" onKeyPress="SetMask(this,'00/00/0000')" value="<?php echo $contrato->getData_inicio()?>" size="20" >
            </div>
            <div class="campo">
                <label>*Data Fim:</label>
                <input type='text' name='data_fim' class="validate[required]" onKeyPress="SetMask(this,'00/00/0000')" value="<?php echo $contrato->getData_fim()?>" size="20" >
            </div>        
            <div class="campo">
            <label>*Status:</label>
            <select name='status'>
                <option <?php if( $contrato->getStatus() == 1) echo " SELECTED "?> value="1">ATIVADO</option>
                <option <?php if( $contrato->getStatus() == 2) echo " SELECTED "?> value="2">FINALIZADO</option>                
                <option <?php if( $contrato->getStatus() == 3) echo " SELECTED "?> value="3">CANCELADO</option>                
            </select>
            </div>        
            <div class="campo">
            <label>*Tipo:</label>
            <select name='acao'>
                <option <?php if( $contrato->getAcao() == 2) echo " SELECTED "?> value="2">ALUGUEL</option>
                <option <?php if( $contrato->getAcao() == 1) echo " SELECTED "?> value="1">VENDA</option>                
            </select>
            </div>                
    </fieldset>
       
    <button type='submit' name='botao' class="botao">Enviar</button>
    

</form>
    <div class="col8" >
        <div class="float_right margin_right_10 margin_botton10"><a href="../gerenciarContratos.php"><img src="../imagens/voltar.jpg"></a></div>
    </div>    
<?php
include '../inferior.php';
?>